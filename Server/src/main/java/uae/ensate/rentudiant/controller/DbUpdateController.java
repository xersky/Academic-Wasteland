package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import uae.ensate.rentudiant.service.DbUpdateService;

@RestController
@RequestMapping("/api/v1/update")
@AllArgsConstructor
@CrossOrigin
public class DbUpdateController {

    private final DbUpdateService dbUpdateService;

    @GetMapping
    public ResponseEntity<Boolean> updateDb() {
        return ResponseEntity.ok(dbUpdateService.getUpdateState());
    }
}
