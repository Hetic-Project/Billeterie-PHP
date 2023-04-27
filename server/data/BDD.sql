
BEGIN;


DROP TABLE IF EXISTS  `event`, `ticket`;

CREATE TABLE event (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    picture VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    hour TIME NOT NULL,
    adress VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    zip_code VARCHAR(10) NOT NULL,
    description TEXT,
    sport VARCHAR(255) NOT NULL,
    organizer_id INT NOT NULL,
    number_seats INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP
);


CREATE TABLE ticket (
    id INT PRIMARY KEY AUTO_INCREMENT,
    public_code VARCHAR(30) NOT NULL,
    private_code VARCHAR(10) NOT NULL,
    id_event INT NOT NULL,
    id_user INT NOT NULL,
    scan INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (id_event) REFERENCES event(id)
    
);


COMMIT;