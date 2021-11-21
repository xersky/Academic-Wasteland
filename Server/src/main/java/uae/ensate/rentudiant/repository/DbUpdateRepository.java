package uae.ensate.rentudiant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import uae.ensate.rentudiant.model.DbUpdate;

public interface DbUpdateRepository extends JpaRepository<DbUpdate, Long> {
}
