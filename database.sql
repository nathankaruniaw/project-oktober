CREATE TABLE page(
    idPage INT PRIMARY KEY AUTO_INCREMENT,
    namaPage VARCHAR(50),
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
