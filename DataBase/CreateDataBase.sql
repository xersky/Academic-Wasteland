DROP TABLE Reclamations;
DROP TABLE Factures;
DROP TABLE Clients;
DROP TABLE Providers;

CREATE OR REPLACE TABLE Users (
    id Int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    role VARCHAR(30) NOT NULL,
    password VARCHAR(64) NOT NULL
) ENGINE = InnoDB;

CREATE OR REPLACE TABLE Clients (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    fullname VARCHAR(64) NOT NULL,
    cin VARCHAR(10) NOT NULL,
    adress VARCHAR(100) NOT NULL,
    telephone INT(10) NOT NULL,
    email VARCHAR(30) NOT NULL,
    CONSTRAINT `fk_id_user_client`
        FOREIGN KEY (id_user) 
        REFERENCES Users (id)
) ENGINE = InnoDB;

CREATE OR REPLACE TABLE Providers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,    
    fullname VARCHAR(64) NOT NULL,
    CONSTRAINT `fk_id_user_provider`
        FOREIGN KEY (id_user) 
        REFERENCES Users (id)
) ENGINE = InnoDB;

CREATE OR REPLACE TABLE Factures (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    consomation INT NOT NULL,
    month DATE NOT NULL,
    paid BOOLEAN NOT NULL,
    id_client INT NOT NULL,
    CONSTRAINT `fk_id_client_fac`
        FOREIGN KEY (id_client)
        REFERENCES Clients (id)
) ENGINE = InnoDB;

CREATE OR REPLACE TABLE Reclamation (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_fournisseur INT NOT NULL, 
    subject VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    status BOOLEAN NOT NULL,
    CONSTRAINT `fk_id_client_rec`
        FOREIGN KEY (id_client)
        REFERENCES Clients (id),
    CONSTRAINT `fk_id_fournisseur_rec`
        FOREIGN KEY (id_fournisseur)
        REFERENCES Fournisseurs (id)
) ENGINE = InnoDB;

-- Add data
INSERT INTO Users 
    (username, role, password)
VALUES 
    ("root"     , "client"       , "toor"),
    ("janeDoe"  , "client"      , "2369"),
    ("johnDoe"  , "fournisseur" , "6923"),


INSERT INTO Clients
    (id_user, fullname, adress, cin, telephone, email)
VALUES 
    (1, "janeDoe", "A2369420", "ben diban, fnideq, maroc", "0623694201", "dummy@positron.com");

INSERT INTO Providers
    (id_user, name)
VALUES
    (0, "johnDoe");

