package uae.ensate.rentudiant.controller;

import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import uae.ensate.rentudiant.dto.AnnouncementDto;
import uae.ensate.rentudiant.dto.RuleDto;
import uae.ensate.rentudiant.model.Announcement;
import uae.ensate.rentudiant.service.AnnouncementService;

import java.util.List;
import java.util.Set;

@AllArgsConstructor
@RestController
@RequestMapping(path = "/api/v1/announcement")
@CrossOrigin
public class AnnouncementController {

    public final AnnouncementService announcementService;

    @PostMapping(path = "add")
    public ResponseEntity<Long> addAnnouncement(@RequestBody AnnouncementDto announcementDto) {
        Announcement announcement = announcementService.add(announcementDto);
        return ResponseEntity.ok(announcement.getId());
    }

    @GetMapping
    public ResponseEntity<List<Announcement>> listAnnouncements() {
        return ResponseEntity.ok(announcementService.findAll());
    }

    @DeleteMapping("delete")
    public void deleteAnnouncement(@RequestParam("id") Long id) {
        announcementService.delete(id);
    }

    @PutMapping("update")
    public void updateAnnouncement(@RequestParam("id") Long id,
                                   @RequestBody AnnouncementDto announcementDto) {
        announcementService.update(id, announcementDto);
    }

    @GetMapping("range")
    public ResponseEntity<List<Announcement>> getInRange(@RequestParam("max") double max,
                                                         @RequestParam("min") double min) {
        return ResponseEntity
                .ok(announcementService.fetchAllByPriceRange(max, min));
    }

    @GetMapping("rules")
    public ResponseEntity<List<Announcement>> getByRules(@RequestBody Set<RuleDto> rules) {
        return ResponseEntity
                .ok(announcementService.fetchAllByRules(rules));
    }
}
