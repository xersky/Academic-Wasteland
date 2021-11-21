package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import lombok.Getter;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import uae.ensate.rentudiant.dto.RegistrationDto;
import uae.ensate.rentudiant.model.User;
import uae.ensate.rentudiant.service.UserService;

import java.util.List;

@AllArgsConstructor
@RestController
@RequestMapping(path = "api/v1/user")
@CrossOrigin
public class UserController {
    private final UserService userService;

    private static final Logger logger = LoggerFactory.getLogger(UserController.class);

    @GetMapping
    public ResponseEntity<User> getUser(@RequestParam("id") Long id) {
        logger.info("getUser");
        return ResponseEntity.ok(userService.findById(id));
    }

    @GetMapping("/all")
    public ResponseEntity<List<User>> getAllUsers() {
        logger.info("getAllUsers");
        return ResponseEntity.ok(userService.findAll());
    }

    @DeleteMapping
    public void deleteUser(@RequestParam("id") Long id) {
        logger.info("deleteUser");
        userService.deleteById(id);
    }

    @PutMapping
    public void updateUser(@RequestParam("id") Long id, @RequestBody RegistrationDto user) {
        userService.update(id, user);
    }
}
