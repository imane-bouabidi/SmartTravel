create database if not exists smarttravel;

use smarttravel;
create table entreprise(
    idEntreprise int(20) primary key AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    short_name varchar(50) NOT NULL,
    image varchar(50) NOT NULL
);
create table bus(
    idBus int(20) primary key AUTO_INCREMENT,
    Num_Bus int(20) NOT NULL,
    immatricule int(20) NOT NULL,
    idEntreprise int NOT NULL,
    capacite int(20) NOT NULL,
    foreign key (idEntreprise) references entreprise(idEntreprise)
);
create table ville(
    idVille int(20) primary key AUTO_INCREMENT,
    ville_name varchar(50) NOT NULL
);

create table routee(
    idRout int(20) primary key AUTO_INCREMENT,
    ville_departID int(30) NOT NULL,
    ville_arriveeID int(30) NOT NULL,
    duree time NOT NULL,
    distance float(20) NOT NULL,
    constraint route_ check(ville_departID != ville_arriveeID),
    foreign key (ville_departID) references ville(idVille),
    foreign key (ville_arriveeID) references ville(idVille)
);

create table horaire(
    idHoraire int(20) primary key AUTO_INCREMENT,
    idRoute int(20) NOT NULL,
    idBus int not null,
    date_ date NOT NULL,
    heur_depart time NOT NULL,
    heur_arrivee time NOT NULL,
    sieges_dispo int(10) NOT NULL,
    constraint time_check check(heur_arrivee > heur_depart),
    foreign key (idRout) references routee(idRoute),
    foreign key (idBus) references bus(idBus)
);


INSERT INTO ville (idVille, ville_name) VALUES
    (0, 'Casablanca'),
    (0, 'Rabat'),
    (0, 'Marrakech'),
    (0, 'Fes'),
    (0, 'Tangier'),
    (0, 'Agadir'),
    (0, 'Meknes'),
    (0, 'Oujda'),
    (0, 'Kenitra'),
    (0, 'Tetouan'),
    (0, 'Safi'),
    (0, 'El Jadida'),
    (0, 'Beni Mellal'),
    (0, 'Nador'),
    (0, 'Taza'),
    (0, 'Settat'),
    (0, 'Khouribga'),
    (0, 'Ouarzazate'),
    (0, 'Essaouira'),
    (0, 'Al Hoceima'),
    (0, 'Larache'),
    (0, 'Dakhla'),
    (0, 'Khemisset'),
    (0, 'Taroudant'),
    (0, 'Errachidia'),
    (0, 'Guelmim'),
    (0, 'Tiznit'),
    (0, 'Fquih Ben Salah'),
    (0, 'Tifelt'),
    (0, 'Tan-Tan'),
    (0, 'Ouarzazate'),
    (0, 'Berkane'),
    (0, 'Taourirt'),
    (0, 'Sidi Slimane'),
    (0, 'Ouazzane'),
    (0, 'Sidi Kacem'),
    (0, 'Berrechid'),
    (0, 'Témara'),
    (0, 'Tinghir'),
    (0, 'Chefchaouen'),
    (0, 'Dcheira'),
    (0, 'Guercif'),
    (0, 'Midelt'),
    (0, 'Azrou'),
    (0, 'Skhirat'),
    (0, 'Oulad Teima'),
    (0, 'Sidi Yahia El Gharb'),
    (0, 'Youssoufia'),
    (0, 'Sidi Bennour'),
    (0, 'Ahfir'),
    (0, 'Mechra Bel Ks');


INSERT INTO entreprise (idEntreprise, name, image, short_name) VALUES 
(1, 'CTM', 'ctm.jpg', 'CTM'),
(2, 'TajVoyage', 'taj.jpg', 'Taj'),
(3, 'Bismi Allah Salama', 'bismilah.jpg', 'BAS'),
(4, 'SAT First', 'SAT_First.jpg', 'SAT'),
(5, 'Ghazala', 'ghazala.jpg', 'Ghazala');
