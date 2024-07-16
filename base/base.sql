CREATE DATABASE garage;
USE garage;

-- Création de la table slots_garage
CREATE TABLE slots_garage (
    idSlot INT AUTO_INCREMENT PRIMARY KEY,
    nom_slots VARCHAR(256) NOT NULL,
    statut INT NOT NULL CHECK (statut BETWEEN 0 AND 1)
);

-- Création de la table service_garage
CREATE TABLE service_garage (
    idService INT AUTO_INCREMENT PRIMARY KEY,
    nom_service VARCHAR(256) NOT NULL,
    duree TIME NOT NULL,
    tarif DOUBLE NOT NULL
);


-- Création de la table type_voiture_garage
CREATE TABLE type_voiture_garage (
    id_type_voiture INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(256) NOT NULL
);

-- Création de la table clients_garage
CREATE TABLE clients_garage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(256) NOT NULL,
    id_type_voiture INT NOT NULL,
    FOREIGN KEY (id_type_voiture) REFERENCES type_voiture_garage(id_type_voiture)
);

-- Création de la table reservations_garage
CREATE TABLE reservations_garage (
    idReservation INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    id_slot INT NOT NULL,
    id_client INT NOT NULL,
    id_service INT NOT NULL,
    montant double not null,
    FOREIGN KEY (id_slot) REFERENCES slots_garage(idSlot),
    FOREIGN KEY (id_client) REFERENCES clients_garage(id),
    FOREIGN KEY (id_service) REFERENCES service_garage(idService)
);


CREATE TABLE devis_garage(
    id_devis INT AUTO_INCREMENT PRIMARY KEY,
    idReservation INT not null,
    date_payement DATETIME,
    etat INT not null CHECK (etat BETWEEN 0 AND 1),
    FOREIGN KEY (idReservation) REFERENCES reservations_garage(idReservation)
);

CREATE TABLE login_admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(256) unique not null,
    mdp VARCHAR(256) not null
);


CREATE TABLE temp_service_garage(
    id int PRIMARY key AUTO_INCREMENT,
    service_nom VARCHAR(256) Not Null,
    durree TIME NOT NULL
);



CREATE TABLE temp_table_garage(
    id int PRIMARY key AUTO_INCREMENT,
    voiture varchar(256) not null,
    type_voiture varchar(256) not null,
    date_heurerdv DATETIME not null,
    type_service varchar(256) not null,
    montant double not null,
    date_payement DATETIME
);



CREATE VIEW reservation_devis_view AS
SELECT 
    d.id_devis AS id_devis,
    c.numero AS numero_client,
    s.nom_service AS nom_service,
    r.date_debut AS date_debut,
    sl.nom_slots AS nom_slot,
    d.date_payement AS date_payement,
    d.etat AS etat
FROM 
    devis_garage d
JOIN 
    reservations_garage r ON d.idReservation = r.idReservation
JOIN 
    clients_garage c ON r.id_client = c.id
JOIN 
    service_garage s ON r.id_service = s.idService
JOIN 
    slots_garage sl ON r.id_slot = sl.idSlot;




INSERT INTO slots_garage (nom_slots, statut) VALUES ('A', 1);
INSERT INTO slots_garage (nom_slots, statut) VALUES ('B', 0);
INSERT INTO slots_garage (nom_slots, statut) VALUES ('C', 1);


INSERT INTO login_admin (username, mdp)
VALUES ('admin', SHA1('mdp'));




CREATE VIEW vue_reservation_details AS
SELECT
    rg.idReservation AS id,
    sg.nom_slots AS nom_slot,
    cg.numero AS numero_client,
    srg.nom_service AS nom_service,
    srg.tarif AS tarif,
    srg.duree AS duree,
    rg.date_debut,
    rg.date_fin
FROM
    reservations_garage rg
    INNER JOIN slots_garage sg ON rg.id_slot = sg.idSlot
    INNER JOIN clients_garage cg ON rg.id_client = cg.id
    INNER JOIN service_garage srg ON rg.id_service = srg.idService;





INSERT INTO type_voiture_garage (marque) VALUES ('légère');
INSERT INTO type_voiture_garage (marque) VALUES ('4 * 4');
INSERT INTO type_voiture_garage (marque) VALUES ('Utilitaire');

INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation simple', '01:00:00', 150000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation standard', '02:00:00', 250000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation complexe', '08:00:00', 800000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Entretien', '02:30:00', 300000);
