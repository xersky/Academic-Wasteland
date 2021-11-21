package uae.ensate.rentudiant.dto;

import uae.ensate.rentudiant.enums.AnnouncementType;

public record AnnouncementDto (Long idHouse,
                               AnnouncementType announcementType,
                               double price) {}