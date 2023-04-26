
BEGIN;


DROP TABLE IF EXISTS  `event`, `ticket`;

CREATE TABLE event (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    description TEXT,
    genre_sport VARCHAR(255) NOT NULL,
    organisateur_id INT NOT NULL,
    nombre_places INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP
);


CREATE TABLE ticket (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code_public VARCHAR(30) NOT NULL,
    code_prive VARCHAR(10) NOT NULL,
    id_event INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (id_event) REFERENCES event(id)
    
);

COMMIT;