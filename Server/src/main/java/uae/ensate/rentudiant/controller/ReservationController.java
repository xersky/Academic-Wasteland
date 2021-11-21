package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import uae.ensate.rentudiant.dto.ReservationDto;
import uae.ensate.rentudiant.model.Reservation;
import uae.ensate.rentudiant.service.ReservationService;

import java.util.List;

@RestController
@RequestMapping("/api/v1/reservation")
@AllArgsConstructor
@CrossOrigin
public class ReservationController {

    public final ReservationService reservationService;

    @PostMapping("/add")
    public ResponseEntity<Long> addReservation(@RequestBody ReservationDto reservation) {
        Reservation r = reservationService.addReservation(reservation);
        return ResponseEntity.ok(r.getId());
    }

    @DeleteMapping("/delete")
    public void deleteReservation(@RequestParam("id") Long id) {
        reservationService.deleteReservation(id);
    }

    @PutMapping("/update")
    public void updateReservation(@RequestParam("id") Long id, @RequestBody ReservationDto reservation) {
        reservationService.update(id, reservation);
    }

    @GetMapping("/renter")
    public ResponseEntity<List<Reservation>> getByRenter(@RequestParam("id") Long id) {
        return ResponseEntity.ok(reservationService.getByRenter(id));
    }

    @GetMapping("/rentee")
    public ResponseEntity<List<Reservation>> getByClient(@RequestParam("id") Long id) {
        return ResponseEntity.ok(reservationService.getByClient(id));
    }
}
