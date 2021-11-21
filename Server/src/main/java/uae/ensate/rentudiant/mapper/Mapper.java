package uae.ensate.rentudiant.mapper;

import lombok.AllArgsConstructor;
import uae.ensate.rentudiant.dto.*;
import uae.ensate.rentudiant.model.*;
import uae.ensate.rentudiant.util.ByteDigester;

import java.util.List;
import java.util.Set;

@AllArgsConstructor
public class Mapper {

    public static House mapToHouse(HouseDto houseDto, Set<Rule> rules, List<Picture> pictures, Address address) {

        return new House(
                address,
                houseDto.number(),
                houseDto.roomsC(),
                houseDto.bathroomsC(),
                houseDto.bedroomsC(),
                houseDto.description(),
                houseDto.surface(),
                rules, pictures
            );
    }

    public static Review mapToReview(ReviewDto reviewDto, House house) {
        return new Review(
                house,
                reviewDto.rating()
        );
    }

    public static Rule mapToRule(RuleDto ruleDto) {
        return new Rule(
                ruleDto.ruleBody(),
                ruleDto.penalty()
        );
    }

    public static Announcement mapToAnnouncement(AnnouncementDto announcementDto, House house) {
       return new Announcement(
               house,
               announcementDto.announcementType(),
               announcementDto.price()
       );
    }

    public static Reservation mapToReservation(ReservationDto reservationDto, House house) {
        return new Reservation(
                house,
                reservationDto.owner(),
                reservationDto.users(),
                reservationDto.startPeriod(),
                reservationDto.endPeriod(),
                reservationDto.createdAt()
        );
    }

    public static Address mapToAddress(AddressDto addressDto) {
        return new Address(
                addressDto.city(),
                addressDto.street(),
                addressDto.zip()
        );
    }

    public static Picture mapToPicture(PictureDto pictureDto) {
        return new Picture(
                ByteDigester.decode(pictureDto.data())
        );
    }

    public static PictureDto mapToPictureDto(Picture picture) {
        return new PictureDto(
                ByteDigester.encode(picture.getData())
        );
    }

    public static User mapToUser(RegistrationDto registrationDto) {
        return new User (
                registrationDto.firstName(),
                registrationDto.lastName(),
                registrationDto.email(),
                registrationDto.password(),
                registrationDto.gender(),
                registrationDto.role()
        );
    }
}
