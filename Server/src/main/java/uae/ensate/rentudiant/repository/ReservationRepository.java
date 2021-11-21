package uae.ensate.rentudiant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import uae.ensate.rentudiant.model.House;
import uae.ensate.rentudiant.model.Reservation;
import uae.ensate.rentudiant.model.User;

import java.util.List;
import java.util.Optional;
import java.util.Set;

public interface ReservationRepository extends JpaRepository<Reservation, Long> {

    Optional<Reservation> findById(Long id);

    List<Reservation> findByHouse(House house);

    void deleteById(Long id);

    List<Reservation> findByOwner(User owner);
}