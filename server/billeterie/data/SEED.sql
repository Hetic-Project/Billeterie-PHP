
BEGIN;

INSERT INTO `event` (
    `name`,
)
VALUES ('Rugby'), 
('Football');

INSERT INTO `event` (
    `name`,
    `picture`,
    `date`,
    `hour`,
    `adress`,
    `city`,
    `zip_code`,
    `description`,
    `sport`,
    `organizer_id`,
    `number_seats`
)
VALUES (
    'Rugby Night',
    'http://localhost:4000/images/affiches/rugby1.jpg',
    '2023-08-07',
    '10:00:00',
    '10 rue orset',
    'paris',
    '75008',
    'Rencontre de rugby a paris',
    'Rugby',
    1,
    300
),
(
    'World cup 2023',
    'http://localhost:4000/images/affiches/rugby2.jpg',
    '2023-08-23',
    '10:00:00',
    '10 rue orset',
    'paris',
    '75008',
    'Rencontre de rugby a paris',
    'Rugby',
    1,
    300
),
(
    'Rugby Heritage cup',
    'http://localhost:4000/images/affiches/rugby3.png',
    '2023-09-02',
    '12:30:00',
    '10 rue orset',
    'paris',
    '75008',
    'Rencontre de rugby a paris',
    'Rugby',
    1,
    300
),
(
    'Football Tournament',
    'http://localhost:4000/images/affiches/foot1.jpg',
    '2023-08-14',
    '19:00:00',
    '10 rue orset',
    'Chambourcy',
    '78240',
    'Rencontre de football a Chambourcy',
    'Football',
    3,
    300
),
(
    'Championnat U19 féminin',
    'http://localhost:4000/images/affiches/foot2.png',
    '2023-10-03',
    '13:00:00',
    '10 rue orset',
    'Chambourcy',
    '78240',
    'Rencontre de football a Chambourcy',
    'Football',
    3,
    300
),
(
    'Football Tournament',
    'http://localhost:4000/images/affiches/foot3.jpg',
    '2023-06-18',
    '12:30:00',
    '10 rue orset',
    'Chambourcy',
    '78240',
    'Rencontre de football a Chambourcy',
    'Football',
    3,
    300
);


COMMIT;