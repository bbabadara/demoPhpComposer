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






-- Insérer des données dans la table users
INSERT INTO client (nom, prenom, telephone) VALUES
('Ba', 'Badara', '772641040'),
('Diallo', 'Mamadou', '771234501'),
('Sene', 'Awa Moussa', '771234501');




-- Insérer des données dans la table compte
INSERT INTO compte (numero, solde,idcl) VALUES
('CPT001', 1000.00,  1),
('CPT002', 2000.00,  2),
('CPT003', 5000.00, 3);



SELECT * FROM client cl JOIN compte c on cl.idcl=c.idcl WHERE cl.telephone ="772641040";