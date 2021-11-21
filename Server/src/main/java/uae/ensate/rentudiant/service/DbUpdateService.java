package uae.ensate.rentudiant.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import uae.ensate.rentudiant.model.DbUpdate;
import uae.ensate.rentudiant.repository.DbUpdateRepository;

@AllArgsConstructor
@Service
public class DbUpdateService {
    private final DbUpdateRepository dbUpdateRepository;

    public boolean getUpdateState() {
         DbUpdate du = dbUpdateRepository
                .findAll().stream()
                .findFirst().orElseThrow();

         if (du.getUpdated()) {
             du.setUpdated(false);
             return true;
         }

         return false;
    }

    public void dbUpdated() {
        DbUpdate du = dbUpdateRepository
                .findAll().stream()
                .findFirst().orElseThrow();

        du.setUpdated(true);
    }
}
