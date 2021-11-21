package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.BadCredentialsException;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.web.bind.annotation.*;
import uae.ensate.rentudiant.dto.AuthRequest;
import uae.ensate.rentudiant.dto.AuthResponse;
import uae.ensate.rentudiant.model.User;
import uae.ensate.rentudiant.service.JwtService;
import uae.ensate.rentudiant.service.UserService;

@RestController
@RequestMapping("/api/v1/authenticate")
@AllArgsConstructor
@CrossOrigin
public class AutheticationController {

    private AuthenticationManager authenticationManager;
    private UserService userService;
    private JwtService jwtService;

    @PostMapping
    public ResponseEntity<String> createAuthToken(@RequestBody AuthRequest authRequest) throws Exception {
        try {
            authenticationManager.authenticate(
                    new UsernamePasswordAuthenticationToken(authRequest.email(), authRequest.password())
            );
        } catch (BadCredentialsException e) {
            throw new Exception("Incorrect username or password", e);
        }

        final UserDetails user = userService.loadUserByUsername(authRequest.email());

        return ResponseEntity.ok(jwtService.generateToken(user));
    }
}
