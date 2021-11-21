package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.*;
import uae.ensate.rentudiant.dto.RegistrationDto;
import uae.ensate.rentudiant.service.RegistrationService;

@AllArgsConstructor
@RestController
@RequestMapping(path = "api/v1/register")
@CrossOrigin
public class RegistrationController {

    public final RegistrationService registrationService;

    @PostMapping
    public String register(@RequestBody RegistrationDto request) {
        return registrationService.register(request);
    }

    @GetMapping(path = "confirm")
    public String confirm(@RequestParam("token") String token) {
        return registrationService.confirmToken(token);
    }
}
