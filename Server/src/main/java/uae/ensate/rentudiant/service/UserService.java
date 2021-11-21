package uae.ensate.rentudiant.service;

import lombok.AllArgsConstructor;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;
import uae.ensate.rentudiant.dto.RegistrationDto;
import uae.ensate.rentudiant.mapper.Mapper;
import uae.ensate.rentudiant.model.ConfirmationToken;
import uae.ensate.rentudiant.model.User;
import uae.ensate.rentudiant.repository.UserRepository;

import java.time.LocalDateTime;
import java.util.List;
import java.util.UUID;

@Service
@AllArgsConstructor
public class UserService implements UserDetailsService {

    private final UserRepository userRepository;
    private final ConfirmationTokenService confirmationTokenService;
    private final BCryptPasswordEncoder bCryptPasswordEncoder;

    @Override
    public UserDetails loadUserByUsername(String email)
            throws UsernameNotFoundException {
        return userRepository.findByEmail(email)
                .orElseThrow(() -> new UsernameNotFoundException(
                        String.format("user with email %s not found", email)));
    }

    public String signUpUser(User user) {
        if (userRepository.findByEmail(user.getEmail()).isPresent()
            && confirmationTokenService.isConfirmed(user)) {
            throw new IllegalStateException("Email already taken");
        }

        String encodedPassword = bCryptPasswordEncoder.encode(user.getPassword());

        user.setPassword(encodedPassword);

        userRepository.save(user);

        ConfirmationToken cToken = new ConfirmationToken(
                UUID.randomUUID().toString(),
                LocalDateTime.now(),
                LocalDateTime.now().plusMinutes(30L),
                user
        );

        confirmationTokenService.saveConfirmationToken(cToken);

        return cToken.getToken();
    }

    public boolean loginUser(String username, String password) {
        return userRepository.findByEmail(username)
                .orElseThrow(() -> new IllegalStateException("User not found"))
                .getPassword().equals(password);
    }

    public int enableUser(String email) {
        return userRepository.enableUser(email);
    }

    public User findById(Long id) {
        return userRepository.findById(id)
                .orElseThrow(() -> new IllegalStateException("User not found"));
    }

    public List<User> findAll() {
        return userRepository.findAll();
    }

    public void deleteById(Long id) {
        userRepository.deleteById(id);
    }

    public void update(Long id, RegistrationDto userDto) {
        User modUser = Mapper.mapToUser(userDto);
        User user = findById(id);

        user.setLocked(!modUser.isAccountNonLocked());
        user.setEnabled(modUser.isEnabled());

        userRepository.save(user);
    }
}
