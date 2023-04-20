CREATE TABLE evenements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    description TEXT,
    genre_sport VARCHAR(255) NOT NULL,
    organisateur_id INT NOT NULL,
    nombre_places INT NOT NULL
);


CREATE TABLE billets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code_public VARCHAR(30) NOT NULL,
    code_prive VARCHAR(10) NOT NULL,
    id_evenement INT NOT NULL,
    FOREIGN KEY (id_evenement) REFERENCES evenements(id)
);