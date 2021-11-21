package uae.ensate.rentudiant.model;

import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import javax.persistence.*;
import java.time.LocalDateTime;
import java.util.Set;

@Getter
@Setter
@NoArgsConstructor
@Entity
@Table(name = "reservations")
public class Reservation {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @OneToOne
    @JoinColumn(
            name = "house_id",
            nullable = false
    )
    private House house;

    @ManyToOne
    @JoinColumn (name = "user_id")
    private User owner;

    @OneToMany
    @JoinColumn (name = "user_id")
    private Set<User> user;

    @Column(nullable = false)
    private LocalDateTime startPeriod;

    @Column(nullable = false)
    private LocalDateTime endPeriod;

    @Column(nullable = false)
    private LocalDateTime createdAt;

    public Reservation(House house, User owner,
                       Set<User> user,
                       LocalDateTime startPeriod,
                       LocalDateTime endPeriod,
                       LocalDateTime createdAt) {
        this.house = house;
        this.owner = owner;
        this.user = user;
        this.startPeriod = startPeriod;
        this.endPeriod = endPeriod;
        this.createdAt = createdAt;
    }
}
