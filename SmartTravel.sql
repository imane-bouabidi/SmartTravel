-- Drop the database if it exists
DROP DATABASE IF EXISTS smarttravel2;

-- Create the database
CREATE DATABASE IF NOT EXISTS smarttravel2;

-- Use the database
USE smarttravel2;

-- Create the entreprise table
CREATE TABLE entreprise (
    idEntreprise INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    short_name VARCHAR(50) NOT NULL,
    image VARCHAR(50) NOT NULL
);

-- Create the bus table
CREATE TABLE bus (
    idBus INT PRIMARY KEY AUTO_INCREMENT,
    Num_Bus INT NOT NULL,
    immatricule varchar(50) NOT NULL,
    idEntreprise INT NOT NULL,
    capacite INT NOT NULL,
    CONSTRAINT fk_bus_idEntreprise FOREIGN KEY (idEntreprise) REFERENCES entreprise(idEntreprise) ON DELETE CASCADE
);

-- Create the ville table
CREATE TABLE ville (
    idVille INT PRIMARY KEY AUTO_INCREMENT,
    ville_name VARCHAR(50) NOT NULL
);

-- Create the routee table
CREATE TABLE routee (
    idRout INT PRIMARY KEY AUTO_INCREMENT,
    ville_departID INT NOT NULL,
    ville_arriveeID INT NOT NULL,
    duree TIME NOT NULL,
    distance FLOAT NOT NULL,
    CONSTRAINT route_check CHECK(ville_departID != ville_arriveeID),
    CONSTRAINT fk_routee_ville_depart FOREIGN KEY (ville_departID) REFERENCES ville(idVille) ON DELETE CASCADE,
    CONSTRAINT fk_routee_ville_arrivee FOREIGN KEY (ville_arriveeID) REFERENCES ville(idVille) ON DELETE CASCADE
);

-- Create the horaire table
CREATE TABLE horaire (
    idHoraire INT PRIMARY KEY AUTO_INCREMENT,
    idRout INT NOT NULL,
    idBus INT NOT NULL,
    date_ DATE NOT NULL,
    heur_depart TIME NOT NULL,
    heur_arrivee TIME NOT NULL,
    sieges_dispo INT NOT NULL,
    price float(50) not null,
    CONSTRAINT time_check CHECK(heur_arrivee > heur_depart),
    CONSTRAINT fk_horaire_routee FOREIGN KEY (idRout) REFERENCES routee(idRout) ON DELETE CASCADE,
    CONSTRAINT fk_horaire_bus FOREIGN KEY (idBus) REFERENCES bus(idBus) ON DELETE CASCADE
);

-- Insert into ville table with unique idVille values
INSERT INTO ville (ville_name) VALUES
    ('Casablanca'),
    ('Rabat'),
    ('Marrakech'),
    ('Fes'),
    ('Tangier'),
    ('Agadir'),
    ('Meknes'),
    ('Oujda'),
    ('Kenitra'),
    ('Tetouan'),
    ('Safi'),
    ('El Jadida'),
    ('Beni Mellal'),
    ('Nador'),
    ('Taza'),
    ('Settat'),
    ('Khouribga'),
    ('Ouarzazate'),
    ('Essaouira'),
    ('Al Hoceima'),
    ('Larache'),
    ('Dakhla'),
    ('Khemisset'),
    ('Taroudant'),
    ('Errachidia'),
    ('Guelmim'),
    ('Tiznit'),
    ('Fquih Ben Salah'),
    ('Tifelt'),
    ('Tan-Tan'),
    ('Ouarzazate'),
    ('Berkane'),
    ('Taourirt'),
    ('Sidi Slimane'),
    ('Ouazzane'),
    ('Sidi Kacem'),
    ('Berrechid'),
    ('Témara'),
    ('Tinghir'),
    ('Chefchaouen'),
    ('Dcheira'),
    ('Guercif'),
    ('Midelt'),
    ('Azrou'),
    ('Skhirat'),
    ('Oulad Teima'),
    ('Sidi Yahia El Gharb'),
    ('Youssoufia'),
    ('Sidi Bennour'),
    ('Ahfir'),
    ('Mechra Bel Ks');


INSERT INTO routee (ville_departID,ville_arriveeID,distance, duree)
VALUES (3, 4, '180', '2:15:00'),
    -- Tangier to Marrakesh
    (4, 5, '200', '2:30:00'),
    -- Marrakesh to Salé
    (5, 6, '250', '3:15:00'),
    -- Salé to Meknes
    (6, 7, '180', '2:00:00'),
    -- Meknes to Rabat
    (7, 8, '200', '2:45:00'),
    -- Rabat to Oujda
    (8, 9, '250', '3:30:00'),
    -- Oujda to Kenitra
    (9, 10, '150', '2:00:00'),
    -- Kenitra to Agadir
    (10, 11, '120', '1:15:00'),
    -- Agadir to Tetouan
    (11, 12, '180', '2:15:00'),
    -- Tetouan to Temara
    (12, 13, '220', '3:00:00'),
    -- Temara to Safi
    (13, 14, '180', '2:15:00'),
    -- Safi to Mohammedia
    (14, 15, '200', '2:30:00'),
    -- Mohammedia to El Jadida
    (15, 16, '250', '3:15:00'),
    -- El Jadida to Beni Mellal
    (16, 17, '180', '2:00:00'),
    -- Beni Mellal to Aït Melloul
    (17, 18, '100', '1:15:00'),
    -- Marrakesh to Nador
    (18, 19, '120', '1:30:00'),
    -- Nador to Khemisset
    (19, 20, '300', '4:00:00'),
    -- Khemisset to Larache
    (20, 21, '280', '3:45:00'),
    -- Larache to Tan-Tan
    (21, 22, '180', '2:30:00'),
    -- Tan-Tan to Taza
    (22, 23, '200', '2:45:00'),
    -- Taza to Settat
    (23, 24, '150', '2:00:00'),
    -- Settat to Berrechid
    (24, 25, '220', '3:00:00'),
    -- Berrechid to Inezgane
    (25, 1, '180', '2:15:00'),
    -- Inezgane to Casablanca
    (1, 2, '250', '3:15:00'),
    -- Casablanca to Fez
    (2, 3, '300', '4:00:00'),
    -- Fez to Tangier
    (3, 4, '180', '2:15:00'),
    -- Tangier to Marrakesh
    (4, 5, '200', '2:30:00'),
    -- Marrakesh to Salé
    (5, 6, '250', '3:15:00'),
    -- Salé to Meknes
    (6, 7, '180', '2:00:00'),
    -- Meknes to Rabat
    (7, 8, '200', '2:45:00'),
    -- Rabat to Oujda
    (8, 9, '250', '3:30:00'),
    -- Oujda to Kenitra
    (9, 10, '150', '2:00:00'),
    -- Kenitra to Agadir
    (10, 11, '120', '1:15:00'),
    -- Agadir to Tetouan
    (11, 12, '180', '2:15:00'),
    -- Tetouan to Temara
    (12, 13, '220', '3:00:00'),
    -- Temara to Safi
    -- Add more routes as needed
    (13, 14, '180', '2:15:00'),
    -- Safi to Mohammedia
    (14, 15, '200', '2:30:00'),
    -- Mohammedia to El Jadida
    (15, 16, '250', '3:15:00'),
    -- El Jadida to Beni Mellal
    (16, 17, '180', '2:00:00'),
    -- Beni Mellal to Aït Melloul
    (17, 18, '100', '1:15:00'),
    -- Marrakesh to Nador
    (18, 19, '120', '1:30:00'),
    -- Nador to Khemisset
    (19, 20, '300', '4:00:00'),
    -- Khemisset to Larache
    (20, 21, '280', '3:45:00'),
    -- Larache to Tan-Tan
    (21, 22, '180', '2:30:00'),
    -- Tan-Tan to Taza
    -- Add more routes as needed
    (22, 23, '200', '2:45:00'),
    -- Taza to Settat
    (23, 24, '150', '2:00:00'),
    -- Settat to Berrechid
    (24, 25, '220', '3:00:00'),
    -- Berrechid to Inezgane
    (25, 1, '180', '2:15:00');

-- Insert into entreprise table
INSERT INTO entreprise (name, image, short_name) VALUES 
('CTM', 'ctm.jpg', 'CTM'),
('TajVoyage', 'taj.jpg', 'Taj'),
('Bismi Allah Salama', 'bismilah.jpg', 'BAS'),
('SAT First', 'SAT_First.jpg', 'SAT'),
('Ghazala', 'ghazala.jpg', 'Ghazala'),
('Sotram', 'sotram.jpg', 'Sotram'),
('Bab Allah', 'BabAllah.jpg', 'Bab Allah'),
('GloBus Trans', 'GloBus.jpg', 'GloBus'),
('Supratours', 'Supratours.jpg', 'Supratours'),
('Jana Viajes', 'JanaViajes.jpg', 'Jana');


INSERT INTO bus (
        idBus,
        Num_Bus,
        immatricule,
        idEntreprise,
        capacite
    )
VALUES -- Supratours
    (101, 101, 'AB123CD', 1, 50),
    -- SATAS
    (102, 202, 'EF456GH', 2, 45),
    -- Autocars Bardia
    (103, 303, 'IJ789KL', 3, 55),
    --  Autocars Zerktouni
    (104, 404, 'MN012OP', 4, 40),
    -- Trans Ghazala
    (105, 505, 'QR345ST', 5, 60),
    -- Alsa Maroc
    (106, 606, 'UV678WX', 6, 55),
    -- SupraTours Sahara
    (107, 707, 'YZ901AB', 7, 45),
    -- Kamel Transports
    (108, 808, 'CD234EF', 8, 50),
    -- Transavia
    (109, 909, 'GH567IJ', 9, 40),
    -- Tarik Express
    (110, 1010, 'KL890MN', 10, 60);


    INSERT INTO horaire (
        date_,
        heur_depart,
        heur_arrivee,
        sieges_dispo,
        idBus,
        idRout,
        price
    )
VALUES (
        '2024-02-01',
        '09:30:00',
        '13:30:00',
        15,
        101,
        1,
        25.00
    ),
    (
        '2024-02-03',
        '09:30:00',
        '13:30:00',
        40,
        101,
        2,
        30.00
    ),
    (
        '2024-02-04',
        '12:00:00',
        '16:00:00',
        35,
        101,
        3,
        28.50
    ),
    (
        '2024-02-05',
        '14:45:00',
        '18:45:00',
        50,
        101,
        4,
        35.00
    ),
    (
        '2024-02-06',
        '17:30:00',
        '21:30:00',
        45,
        101,
        5,
        32.50
    ),
    (
        '2024-02-07',
        '20:00:00',
        '23:50:00',
        55,
        101,
        6,
        40.00
    ),
    (
        '2024-02-08',
        '20:30:00',
        '23:30:00',
        50,
        101,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '01:00:00',
        '05:00:00',
        40,
        101,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '07:30:00',
        '11:30:00',
        45,
        101,
        9,
        32.50
    ),
    (
        '2024-02-11',
        '09:30:00',
        '13:30:00',
        20,
        101,
        10,
        18.00
    );
-- schedules for SATAS (CompanyID = 2)
INSERT INTO horaire (
        date_,
        heur_depart,
        heur_arrivee,
        sieges_dispo,
        idBus,
        idRout,
        price
    )
VALUES (
        '2024-02-01',
        '10:00:00',
        '14:00:00',
        20,
        102,
        1,
        28.00
    ),
    (
        '2024-02-03',
        '10:00:00',
        '14:00:00',
        30,
        102,
        2,
        35.00
    ),
    (
        '2024-02-04',
        '12:30:00',
        '16:30:00',
        25,
        102,
        3,
        30.50
    ),
    (
        '2024-02-05',
        '15:15:00',
        '19:15:00',
        40,
        102,
        4,
        40.00
    ),
    (
        '2024-02-06',
        '18:00:00',
        '22:00:00',
        35,
        102,
        5,
        37.50
    ),
    (
        '2024-02-07',
        '20:30:00',
        '23:50:00',
        45,
        102,
        6,
        45.00
    ),
    (
        '2024-02-08',
        '20:45:00',
        '23:45:00',
        30,
        102,
        7,
        32.00
    ),
    (
        '2024-02-09',
        '01:15:00',
        '05:15:00',
        25,
        102,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '08:00:00',
        '12:00:00',
        30,
        102,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '10:00:00',
        '14:00:00',
        20,
        102,
        10,
        28.00
    );
-- Insert schedules for CTM (CompanyID = 3)
INSERT INTO horaire (
        date_,
        heur_depart,
        heur_arrivee,
        sieges_dispo,
        idBus,
        idRout,
        price
    )
VALUES (
        '2024-02-01',
        '12:00:00',
        '16:00:00',
        15,
        103,
        1,
        20.00
    ),
    (
        '2024-02-03',
        '12:00:00',
        '16:00:00',
        30,
        103,
        2,
        35.00
    ),
    (
        '2024-02-04',
        '14:30:00',
        '18:30:00',
        25,
        103,
        3,
        30.00
    ),
    (
        '2024-02-05',
        '17:15:00',
        '21:15:00',
        40,
        103,
        4,
        40.00
    ),
    (
        '2024-02-06',
        '20:00:00',
        '23:59:00',
        35,
        103,
        5,
        37.50
    ),
    (
        '2024-02-07',
        '20:30:00',
        '23:30:00',
        45,
        103,
        6,
        45.00
    ),
    (
        '2024-02-08',
        '01:00:00',
        '04:45:00',
        30,
        103,
        7,
        32.00
    ),
    (
        '2024-02-09',
        '03:15:00',
        '07:15:00',
        25,
        103,
        8,
        28.00
    ),
    (
        '2024-02-10',
        '09:30:00',
        '13:30:00',
        30,
        103,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '12:00:00',
        '16:00:00',
        15,
        103,
        10,
        20.00
    );
-- Insert schedules for Tramesa (CompanyID = 4)
INSERT INTO horaire (
        date_,
        heur_depart,
        heur_arrivee,
        sieges_dispo,
        idBus,
        idRout,
        price
    )
VALUES (
        '2024-02-01',
        '14:45:00',
        '18:45:00',
        15,
        104,
        1,
        22.00
    ),
    (
        '2024-02-03',
        '14:45:00',
        '18:45:00',
        30,
        104,
        2,
        37.00
    ),
    (
        '2024-02-04',
        '17:15:00',
        '21:15:00',
        25,
        104,
        3,
        32.50
    ),
    (
        '2024-02-05',
        '20:00:00',
        '23:59:00',
        40,
        104,
        4,
        42.00
    ),
    (
        '2024-02-06',
        '20:30:00',
        '23:50:00',
        35,
        104,
        5,
        39.00
    ),
    (
        '2024-02-07',
        '01:00:00',
        '04:45:00',
        45,
        104,
        6,
        47.50
    ),
    (
        '2024-02-08',
        '03:15:00',
        '07:15:00',
        30,
        104,
        7,
        34.00
    ),
    (
        '2024-02-09',
        '09:30:00',
        '13:30:00',
        25,
        104,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '12:00:00',
        '16:00:00',
        30,
        104,
        9,
        37.00
    ),
    (
        '2024-02-11',
        '14:45:00',
        '18:45:00',
        15,
        104,
        10,
        22.00
    );
-- Insert schedules for Trans Ghazala (CompanyID = 5)
INSERT INTO horaire (
        date_,
        heur_depart,
        heur_arrivee,
        sieges_dispo,
        idBus,
        idRout,
        price
    )
VALUES (
        '2024-02-01',
        '17:30:00',
        '21:30:00',
        15,
        105,
        1,
        25.00
    ),
    (
        '2024-02-03',
        '17:30:00',
        '21:30:00',
        30,
        105,
        2,
        40.00
    ),
    (
        '2024-02-04',
        '20:00:00',
        '23:59:00',
        25,
        105,
        3,
        35.00
    ),
    (
        '2024-02-05',
        '20:45:00',
        '23:55:00',
        40,
        105,
        4,
        45.00
    ),
    (
        '2024-02-06',
        '01:15:00',
        '05:15:00',
        35,
        105,
        5,
        42.50
    ),
    (
        '2024-02-07',
        '08:00:00',
        '12:00:00',
        45,
        105,
        6,
        50.00
    ),
    (
        '2024-02-08',
        '10:30:00',
        '14:30:00',
        30,
        105,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '12:45:00',
        '16:45:00',
        25,
        105,
        8,
        32.00
    ),
    (
        '2024-02-10',
        '15:15:00',
        '19:15:00',
        30,
        105,
        9,
        40.00
    ),
    (
        '2024-02-11',
        '17:30:00',
        '21:30:00',
        15,
        105,
        10,
        25.00
    );
