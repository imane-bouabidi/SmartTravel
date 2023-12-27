-- Drop the database if it exists
DROP DATABASE IF EXISTS smarttravel;

-- Create the database
CREATE DATABASE IF NOT EXISTS smarttravel;

-- Use the database
USE smarttravel;

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
    immatricule INT NOT NULL,
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

-- Insert into entreprise table
INSERT INTO entreprise (name, image, short_name) VALUES 
('CTM', 'ctm.jpg', 'CTM'),
('TajVoyage', 'taj.jpg', 'Taj'),
('Bismi Allah Salama', 'bismilah.jpg', 'BAS'),
('SAT First', 'SAT_First.jpg', 'SAT'),
('Ghazala', 'ghazala.jpg', 'Ghazala');


INSERT INTO `bus` (`idBus`, `Num_Bus`, `immatricule`, `idEntreprise`, `capacite`) VALUES 
(NULL, '12', '124578', '2', '50'), 
(NULL, '11', '457996', '2', '60'), 
(NULL, '8', '857496', '1', '70'), 
(NULL, '7', '584213', '4', '75');