DROP database if exists sidji;
create database sidji;
use sidji;

CREATE TABLE page(
    idPage INT PRIMARY KEY AUTO_INCREMENT,
    namaPage VARCHAR(50),
    statusPage VARCHAR(20),
    idSubPage INT
);

CREATE TABLE section(
    idSection INT PRIMARY KEY AUTO_INCREMENT,
    namaSection VARCHAR(50)
);

CREATE TABLE pageSection(
    idPageSection INT PRIMARY KEY AUTO_INCREMENT,
    idSection INT,
    idPage INT,
    urutanPageSection INT
);


-- IMPORTANT
INSERT INTO page values(1, 'Dashboard', 'Online', 1);
