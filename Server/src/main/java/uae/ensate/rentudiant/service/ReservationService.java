package uae.ensate.rentudiant.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import uae.ensate.rentudiant.dto.ReservationDto;
import uae.ensate.rentudiant.mapper.Mapper;
import uae.ensate.rentudiant.model.Reservation;
import uae.ensate.rentudiant.model.User;
import uae.ensate.rentudiant.repository.ReservationRepository;

import java.util.List;
import java.util.Set;

@AllArgsConstructor
@Service
public class ReservationService {

    private final ReservationRepository reservationRepository;
    private final HouseService houseService;
    private final UserService userService;
    private final DbUpdateService dbUpdateService;

    public Reservation addReservation(ReservationDto reservationDto) {
        Reservation reservation = Mapper.mapToReservation(
                reservationDto,
                houseService.findById(reservationDto.houseId()));

        dbUpdateService.dbUpdated();
        return reservationRepository.save(reservation);
    }

    public void deleteReservation(Long id) {
        dbUpdateService.dbUpdated();
        reservationRepository.deleteById(id);
    }

    public Reservation update(Long id, ReservationDto reservationDto) {
        Reservation reservation = findById(id);
        Reservation updatedReservation = Mapper.mapToReservation(
                reservationDto,
                houseService.findById(reservationDto.houseId()));

        reservation.setCreatedAt(reservation.getCreatedAt());
        reservation.setHouse(updatedReservation.getHouse());
        reservation.setEndPeriod(updatedReservation.getEndPeriod());
        reservation.setStartPeriod(updatedReservation.getStartPeriod());

        dbUpdateService.dbUpdated();
        return reservationRepository.save(reservation);
    }

    public Reservation findById(Long id) {
        return reservationRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Reservation not found"));
    }

    public List<Reservation> getByRenter(Long id) {
        User user = userService.findById(id);
        return reservationRepository.findByOwner(user);
    }

    public List<Reservation> getByClient(Long id) {
        List<Reservation> reservations = reservationRepository.findAll();
        User user = userService.findById(id);
        return reservations.stream()
                .filter(res -> res.getUser().contains(user))
                .toList();
    }

}
