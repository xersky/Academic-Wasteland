package uae.ensate.rentudiant.dto;

import java.util.List;
import java.util.Set;

public record HouseDto(long addressId, int number,
                       int roomsC, int bathroomsC,
                       int bedroomsC, double surface,
                       String description, Set<RuleDto> rules,
                       List<PictureDto> pictures) {}
