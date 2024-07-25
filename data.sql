--Creation Base de donnee
CREATE DATABASE IF NOT EXISTS `demophp` ;
USE `demophp`;

-- Table client
CREATE TABLE client (
    idcl INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(15) NOT NULL 
);



-- Table Compte
CREATE TABLE compte (
    idc INT PRIMARY KEY AUTO_INCREMENT,
    numero VARCHAR(50) NOT NULL,
    solde DECIMAL(10, 2) NOT NULL,
    idcl INT,
    FOREIGN KEY (idcl) REFERENCES client(idcl)
);
-- Table transaction
CREATE TABLE transaction (
    idt INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10, 2) NOT NULL,
    type ENUM("depot","retrait") NOT NULL,
    datet DATE,
    idc INT,
    FOREIGN KEY (idc) REFERENCES compte(idc)
);






-- Insérer des données dans la table client
INSERT INTO client (nom, prenom, telephone) VALUES
('Ba', 'Badara', '772641040'),
('Diallo', 'Mamadou', '771234501'),
('Sene', 'Awa Moussa', '771234501');

-- Insérer des données dans la table compte
INSERT INTO compte (numero, solde,idcl) VALUES
('CPT001', 1000.00,  1),
('CPT002', 2000.00,  2),
('CPT003', 5000.00, 3);

-- Insérer des données dans la table transaction
INSERT INTO transaction (montant,type, datet, idc) VALUES
(1000.00,"depot", '2024-01-15', 1),
(5200.00,"retrait", '2024-01-12', 1),
(5230.00,"retrait", '2024-01-13', 1),
(3499.00,"depot", '2024-01-18', 1),
(1000.00,"depot", '2024-01-16', 1),
(2000.00, 'depot','2024-01-15','2');

SELECT * FROM client cl JOIN compte c on cl.idcl=c.idcl WHERE cl.telephone ="772641040";