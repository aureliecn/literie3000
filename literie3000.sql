CREATE DATABASE IF NOT EXISTS literie3000;

USE literie3000;

-- Création de la table mattress
CREATE TABLE mattress (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    marque VARCHAR(50) NOT NULL,
    dimension VARCHAR(10) NOT NULL,
    picture VARCHAR(256),
    call_price SMALLINT, 
    reduced_price SMALLINT
);

-- Insertion des données dans la table mattress
INSERT INTO mattress
(name, marque, dimension, picture, call_price, reduced_price)
VALUES
("Matelas Delhi", "Epeda", "90x190", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSDSqOTedOe6H_pOtoTdH1fLTzvFOVbYHA3LPByzRNojDc2gqRuhJiYruAGsLPxIkXTDA&usqp=CAU", 759, 529),
("Matelas Orlando", "Dreamway", "90x190", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx_hqav46TXO2H6wQTs4GRGYCrv9wSXutxv1ip1UnH-78ESVL8hkXPJ3hA22OyfeB0sW8&usqp=CAU", 809, 709),
("Matelas Valenciennes", "Bultex", "140x190", "https://static3.lacompagniedulit.net/6954-large_default/matelas-dunlopillo-mikado.jpg", 759, 529),
("Matelas Seville", "Epeda", "160x200", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQR7HVMWftFblJoWmPcQ0o-w0icF9Ru6A-AZ9loFbGog-9Lc8MT4uSVWJWkI3iHjA_z4Mc&usqp=CAU", 1019, 509);