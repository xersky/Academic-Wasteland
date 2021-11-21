package uae.ensate.rentudiant.service;

import lombok.AllArgsConstructor;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;
import uae.ensate.rentudiant.model.ConfirmationToken;
import uae.ensate.rentudiant.model.User;
import uae.ensate.rentudiant.repository.ConfirmationTokenRepository;

import java.time.LocalDateTime;
import java.util.Optional;

@AllArgsConstructor
@Service
public class ConfirmationTokenService {

    public final ConfirmationTokenRepository confirmationTokenRepository;

    public void saveConfirmationToken(ConfirmationToken confirmationToken) {
        confirmationTokenRepository.save(confirmationToken);
    }

    public Optional<ConfirmationToken> getToken(String token) {
        return confirmationTokenRepository.findByToken(token);
    }

    public int setConfirmedAt(String token) {
        return confirmationTokenRepository.updateConfirmedAt(token, LocalDateTime.now());
    }

    public boolean isConfirmed(User user) {
        return confirmationTokenRepository.findByUser(user)
                .map(cToken -> cToken.getConfirmedAt() != null)
                .orElseThrow(() -> new UsernameNotFoundException("Email requested not found."));
    }
}

