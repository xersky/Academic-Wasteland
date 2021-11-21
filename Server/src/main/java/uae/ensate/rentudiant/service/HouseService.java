package uae.ensate.rentudiant.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import uae.ensate.rentudiant.dto.HouseDto;
import uae.ensate.rentudiant.mapper.Mapper;
import uae.ensate.rentudiant.model.House;
import uae.ensate.rentudiant.model.Picture;
import uae.ensate.rentudiant.model.Rule;
import uae.ensate.rentudiant.repository.HouseRepository;

import java.util.List;
import java.util.Set;
import java.util.stream.Collectors;

@Service
@AllArgsConstructor
public class HouseService {

    private final HouseRepository houseRepository;
    private final AddressService addressService;
    private final RuleService ruleService;
    private final PictureService pictureService;
    private final DbUpdateService dbUpdateService;

    public List<House> fetchAll () {
        return houseRepository.findAll();
    }

    public House add(HouseDto houseDto) {
        Set<Rule> rules = houseDto.rules().stream()
                .map(ruleService::save)
                .collect(Collectors.toSet());

        List<Picture> pictures = houseDto.pictures().stream()
                .map(pictureService::save)
                .toList();

        System.out.println(pictures.isEmpty());

        House house = Mapper.mapToHouse(houseDto, rules, pictures,
                addressService.findById(houseDto.addressId()));

        dbUpdateService.dbUpdated();
        return houseRepository.save(house);
    }

    public void delete(Long id) {
        dbUpdateService.dbUpdated();
        houseRepository.deleteById(id);
    }

    public House findById(Long id) {
        return houseRepository.findById(id)
                .orElseThrow(() -> new IllegalStateException("House with id=" + id + "not found"));
    }

    public void update(Long id, HouseDto houseDto) {
        House house = findById(id);

        Set<Rule> rules = houseDto.rules().stream()
                .map(ruleService::save)
                .collect(Collectors.toSet());

        List<Picture> pictures = houseDto.pictures().stream()
                .map(pictureService::save)
                .toList();

        House modHouse = Mapper.mapToHouse(houseDto, rules, pictures,
                addressService.findById(houseDto.addressId()));

        house.setAddress(modHouse.getAddress());
        house.setBathroomsC(modHouse.getBathroomsC());
        house.setBedroomsC(modHouse.getBedroomsC());
        house.setDescription(modHouse.getDescription());
        house.setNumber(modHouse.getNumber());
        house.setPictures(modHouse.getPictures());
        house.setRules(modHouse.getRules());
        house.setSurface(modHouse.getSurface());

        dbUpdateService.dbUpdated();
        houseRepository.save(house);
    }

    public List<House> findAll() {
        return houseRepository.findAll();
    }

    public List<Picture> getPictures(Long house_id) {
        return findById(house_id).getPictures();
    }
}
