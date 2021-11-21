package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import uae.ensate.rentudiant.dto.AddressDto;
import uae.ensate.rentudiant.service.AddressService;

@AllArgsConstructor
@RestController
@RequestMapping("/api/v1/address")
public class AddressController {

    private final AddressService addressService;

    @PostMapping("add")
    public ResponseEntity<Long> addAddress(@RequestBody AddressDto address) {
        return ResponseEntity
                .ok(addressService.save(address).getId());
    }
}
