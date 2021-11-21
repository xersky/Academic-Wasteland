package uae.ensate.rentudiant.model;

import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import org.hibernate.Hibernate;
import javax.persistence.*;

@Getter
@Setter
@NoArgsConstructor
@Entity
public class Rule {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", updatable = false, nullable = false)
    private Long id;

    @Column(nullable = false)
    private String ruleBody;

    @Column(nullable = false)
    private double Penalty;

    public Rule(String ruleBody, double penalty) {
        this.ruleBody = ruleBody;
        Penalty = penalty;
    }
}
