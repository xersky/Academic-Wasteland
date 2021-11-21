package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import uae.ensate.rentudiant.dto.HouseDto;
import uae.ensate.rentudiant.model.House;
import uae.ensate.rentudiant.service.HouseService;

import java.util.List;

@RestController
@RequestMapping("/api/v1/house")
@AllArgsConstructor
@CrossOrigin
public class HouseController {

    private HouseService houseService;

    @PostMapping("add")
    public ResponseEntity<Long> addHouse(@RequestBody HouseDto house) {
        House h = houseService.add(house);
        return ResponseEntity.ok(h.getId());
    }

    @GetMapping
    public ResponseEntity<List<House>> getAll() {
        return ResponseEntity
                .ok(houseService.fetchAll());
    }


    @DeleteMapping("delete")
    public void delete(@RequestParam("id") Long id) {
        houseService.delete(id);
    }

    @PutMapping("update")
    public void update(@RequestParam("id") Long id, @RequestBody HouseDto houseDto) {
        houseService.update(id, houseDto);
    }
}
