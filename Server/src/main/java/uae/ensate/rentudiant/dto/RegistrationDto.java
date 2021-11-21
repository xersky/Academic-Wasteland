package uae.ensate.rentudiant.dto;

import lombok.AllArgsConstructor;
import lombok.ToString;
import uae.ensate.rentudiant.enums.Gender;
import uae.ensate.rentudiant.enums.Role;

public record RegistrationDto(String firstName, String lastName,
                              String email, String password,
                              Gender gender, Role role) {}
