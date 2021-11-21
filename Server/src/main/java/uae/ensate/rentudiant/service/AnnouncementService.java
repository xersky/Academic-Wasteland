package uae.ensate.rentudiant.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import uae.ensate.rentudiant.dto.AnnouncementDto;
import uae.ensate.rentudiant.dto.RuleDto;
import uae.ensate.rentudiant.mapper.Mapper;
import uae.ensate.rentudiant.model.Announcement;
import uae.ensate.rentudiant.model.House;
import uae.ensate.rentudiant.repository.AnnouncementRepository;

import java.util.List;
import java.util.Set;

@AllArgsConstructor
@Service
public class AnnouncementService {

    private final AnnouncementRepository announcementRepository;
    private final HouseService houseService;
    private final DbUpdateService dbUpdateService;

    public Announcement add(AnnouncementDto announcementDto) {
        dbUpdateService.dbUpdated();
        return announcementRepository.save(Mapper.mapToAnnouncement(
                announcementDto,
                houseService.findById(announcementDto.idHouse())));
    }

    public List<Announcement> findAll() {
        return announcementRepository.findAll();
    }

    public void delete(Long id) {
        dbUpdateService.dbUpdated();
        announcementRepository.deleteById(id);
    }

    public void update(Long id, AnnouncementDto announcementDto) {
       Announcement announcement = findById(id);

       Announcement modAnnouncement = Mapper.mapToAnnouncement(
               announcementDto,
               houseService.findById(announcementDto.idHouse()));

       announcement.setHouse(modAnnouncement.getHouse());
       announcement.setPrice(modAnnouncement.getPrice());
       announcement.setType(modAnnouncement.getType());

       dbUpdateService.dbUpdated();
       announcementRepository.save(announcement);
    }

    public Announcement findById(Long id) {
        return announcementRepository.findById(id)
                .orElseThrow(() -> new IllegalStateException(
                        String.format("Announcement by %s not found", id)));
    }

    public List<Announcement> fetchAllByPriceRange(double max, double min) {
        return findAll().stream()
                .filter(ann ->
                        ann.getPrice() <= max
                                && ann.getPrice() >= min)
                .toList();
    }

    public List<Announcement> fetchAllByRules(Set<RuleDto> rules) {
        return findAll().stream()
                .filter(x -> x.getHouse()
                        .getRules()
                        .containsAll(rules.stream()
                                .map(Mapper::mapToRule).toList()))
                .toList();
    }
}
