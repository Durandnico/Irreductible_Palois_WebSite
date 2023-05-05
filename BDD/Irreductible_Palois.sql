-- Path: BDD/Irreductible_Palois.sql
DROP DATABASE IF EXISTS irreductible_palois;
CREATE DATABASE irreductible_palois;
USE irreductible_palois;


CREATE TABLE Product(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    alt VARCHAR(255) NOT NULL,
    shortDescription TEXT NOT NULL,
    fullDescription TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    localid INT NOT NULL,
    category VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Header(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    quantity VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Category(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
