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
    montant double NOT NULL,
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





INSERT INTO slots_garage (nom_slots, statut) VALUES ('A', 1);
INSERT INTO slots_garage (nom_slots, statut) VALUES ('B', 0);
INSERT INTO slots_garage (nom_slots, statut) VALUES ('C', 1);

INSERT INTO type_voiture_garage (marque) VALUES ('légère');
INSERT INTO type_voiture_garage (marque) VALUES ('4 * 4');
INSERT INTO type_voiture_garage (marque) VALUES ('Utilitaire');

INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation simple', '01:00:00', 150000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation standard', '02:00:00', 250000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Réparation complexe', '08:00:00', 800000);
INSERT INTO service_garage (nom_service, duree, tarif) VALUES ('Entretien', '02:30:00', 300000);

INSERT INTO login_admin (username, email, mdp)
VALUES ('admin', 'admin@gmail.com', SHA1('mdp'));



SELECT * FROM clients_garage WHERE numero LIKE '1809tap' AND id_type_voiture = 1;

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


CREATE OR REPLACE VIEW vue_utilisation_slot AS
SELECT 
    slots_garage.nom_slots, 
    reservations_garage.date_debut, 
    reservations_garage.date_fin
FROM 
    reservations_garage
JOIN 
    slots_garage ON reservations_garage.id_slot = slots_garage.idSlot;


CREATE OR REPLACE VIEW vue_utilisation_slot AS
SELECT 
    slots_garage.nom_slots, 
    TIME(reservations_garage.date_debut) AS heure_debut, 
    TIME(reservations_garage.date_fin) AS heure_fin
FROM 
    reservations_garage
JOIN 
    slots_garage ON reservations_garage.id_slot = slots_garage.idSlot;




//chiffre d affaire total
CREATE VIEW chiffre_affaire_total AS 
SELECT
    rg.idReservation,
    SUM(rg.montant) AS montant_total
FROM
    reservations_garage rg
GROUP BY
    rg.idReservation;

select sum(montant_total) AS Chiffre_affaire  from chiffre_affaire_total;


//non paye 
CREATE VIEW non_paye AS 
SELECT
    rg.idReservation,
    SUM(rg.montant) AS non_payes
FROM
    devis_garage dg
INNER JOIN
    reservations_garage rg ON dg.idReservation = rg.idReservation
WHERE
    dg.date_payement IS NULL
GROUP BY
    rg.idReservation;

select sum(non_payes) AS Chiffre_affaire  from non_paye;


//chiffre d affaire par type de voiture 
CREATE OR REPLACE VIEW chiffre_affaire_voiture AS 
SELECT
    tv.id_type_voiture,
    tv.marque,
    SUM(rg.montant) AS total_tarif_services,
    COUNT(*) AS nombre_de_fois
FROM
    reservations_garage rg
INNER JOIN
    clients_garage cg ON rg.id_client = cg.id
INNER JOIN
    type_voiture_garage tv ON cg.id_type_voiture = tv.id_type_voiture
GROUP BY
    tv.marque;

select * from chiffre_affaire_voiture;