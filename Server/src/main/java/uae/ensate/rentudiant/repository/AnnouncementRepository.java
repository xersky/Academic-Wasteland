package uae.ensate.rentudiant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import uae.ensate.rentudiant.model.Announcement;
import uae.ensate.rentudiant.model.House;

import java.util.Optional;

public interface AnnouncementRepository extends JpaRepository<Announcement, Long> {

    Optional<Announcement> findById(Long id);

    void deleteById(Long id);

    Optional<Announcement> findByHouse(House house);
}