--Creation Base de donnee
CREATE DATABASE IF NOT EXISTS `demophp1` ;
USE `demophp1`;

-- Table client
CREATE TABLE client (
    idcl INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(15) NOT NULL 
);

-- Table typeCompte
CREATE TABLE typeCompte (
    idtc INT PRIMARY KEY AUTO_INCREMENT,
    libtc VARCHAR(50) NOT NULL 
);

-- Table Compte
CREATE TABLE compte (
    idc INT PRIMARY KEY AUTO_INCREMENT,
    numero VARCHAR(50) NOT NULL,
    solde DECIMAL(10, 2) NOT NULL,
    idtc INT,
    idcl INT,
    FOREIGN KEY (idtc) REFERENCES typeCompte(idtc),
    FOREIGN KEY (idcl) REFERENCES client(idcl)
);

-- Table typeTransaction
CREATE TABLE typeTransacton (
    idtt INT PRIMARY KEY AUTO_INCREMENT,
    libtt VARCHAR(50) NOT NULL 
);

-- Table transaction
CREATE TABLE transaction (
    idt INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10, 2) NOT NULL,
    datet DATE,
    idtt INT,
    idc INT,
    FOREIGN KEY (idtt) REFERENCES typeTransacton(idtt),
    FOREIGN KEY (idc) REFERENCES compte(idc)
);
-- Table comptLog
CREATE TABLE comptLog (
    idlog INT PRIMARY KEY AUTO_INCREMENT,
   login VARCHAR(50) NOT NULL,
   mdp VARCHAR(250) NOT NULL,
   idcl INT,
    FOREIGN KEY (idcl) REFERENCES client(idcl)
);






-- Insérer des données dans la table client
INSERT INTO client (nom, prenom, telephone) VALUES
('Ba', 'Badara', '772641040'),
('Diallo', 'Mamadou', '771234501'),
('Sene', 'Awa Moussa', '771234501');

-- Insérer des données dans la table typeCompte
INSERT INTO typeCompte (libtc) VALUES
('Compte Courant'),
('Compte Épargne');

-- Insérer des données dans la table compte
INSERT INTO compte (numero, solde, idtc, idcl) VALUES
('CPT001', 1000.00, 1, 1),
('CPT002', 2000.00, 1, 2),
('CPT003', 5000.00, 2, 3);

-- Insérer des données dans la table typeTransaction
INSERT INTO typeTransacton (libtt) VALUES
('Depot'),
('Retrait');

-- Insérer des données dans la table transaction
INSERT INTO transaction (montant, datet, idtt, idc) VALUES
(1000.00, '2024-01-15', 1, 1),
(5200.00, '2024-01-12', 2, 1),
(5230.00, '2024-01-13', 2, 1),
(3499.00, '2024-01-18', 1, 1),
(1000.00, '2024-01-16', 1, 1),
(2000.00, '2024-01-15', 1, 2);

-- Insérer des données dans la table comptLog
INSERT INTO comptLog (login, mdp, idcl) VALUES
('b.badara', 'password123', 1),
('m.diallo', 'password456', 2),
('a.sene', 'password789', 3);


SELECT * FROM client cl JOIN compte c on cl.idcl=c.idcl WHERE cl.telephone ="772641040";