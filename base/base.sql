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
    duree DATETIME NOT NULL,
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
    FOREIGN KEY (id_slot) REFERENCES slots_garage(idSlot),
    FOREIGN KEY (id_client) REFERENCES clients_garage(id),
    FOREIGN KEY (id_service) REFERENCES service_garage(idService)
);


CREATE TABLE devis_gararge(
    id_devis INT AUTO_INCREMENT PRIMARY KEY,
    idReservation INT not null,
    date_payement DATETIME not null,
    FOREIGN KEY (idReservation) REFERENCES reservations_garage(idReservation)
);





INSERT INTO slots_garage (nom_slots, statut) VALUES ('A', 1);
INSERT INTO slots_garage (nom_slots, statut) VALUES ('B', 0);
INSERT INTO slots_garage (nom_slots, statut) VALUES ('C', 1);

INSERT INTO type_voiture_garage (marque) VALUES ('légère');
INSERT INTO type_voiture_garage (marque) VALUES ('4 * 4');
INSERT INTO type_voiture_garage (marque) VALUES ('Utilitaire');

INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation simple', '0000-00-00 01:00:00', 150000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation standard', '0000-00-00 02:00:00', 250000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation complexe', '0000-00-00 08:00:00', 800000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Entretien', '0000-00-00 02:30:00', 300000);


SELECT * FROM clients_garage WHERE numero LIKE '1809tap' AND id_type_voiture = 1;

CREATE VIEW vue_reservation_details AS
SELECT
    rg.idReservation,
    sg.nom_slots AS nom_slot,
    cg.numero AS numero_client,
    srg.nom_service AS nom_service,
    rg.date_debut,
    rg.date_fin
FROM
    reservations_garage rg
    INNER JOIN slots_garage sg ON rg.id_slot = sg.idSlot
    INNER JOIN clients_garage cg ON rg.id_client = cg.id
    INNER JOIN service_garage srg ON rg.id_service = srg.idService
WHERE
    rg.idReservation = 1;
