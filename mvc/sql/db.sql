DROP DATABASE IF EXISTS apartaments_figuerencs;
CREATE DATABASE apartaments_figuerencs;

use apartaments_figuerencs;

-- Crea la taula Apartament
CREATE TABLE Apartament (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Titol VARCHAR(255),
    Adreca VARCHAR(255),
    Longitud DECIMAL(10, 8),
    Latitud DECIMAL(10, 8),
    Descripcio TEXT,
    MetresQuadrats INT,
    NumHabitacions INT,
    PreuDiaTemporadaBaixa DECIMAL(10, 2),
    PreuDiaTemporadaAlta DECIMAL(10, 2)
    numPersones INT,
);

-- Crea la taula Extres
CREATE TABLE Extres (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    NomExtra VARCHAR(255)
);

-- Crea la taula PeriodeTancament
CREATE TABLE PeriodeTancament (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    DataInici DATE,
    DataFinalitzacio DATE
);

CREATE TABLE Usuari (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255),
    Cognoms VARCHAR(255),
    Telefon VARCHAR(15),
    CorreuElectronic VARCHAR(255),
    Contrasenya VARCHAR(255),
    NumTargetaCredit VARCHAR(16),
    Rol ENUM('usuari', 'gestor', 'administrador') DEFAULT 'usuari'
);

-- Crea la taula Reserva
CREATE TABLE Reserva (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    DataEntrada DATE,
    DataSortida DATE,
    Estat ENUM('Lliure', 'Ocupat', 'Tancat'),
    Preu DECIMAL(10, 2),
    IdUsuari INT,
    IdApartament INT,
    FOREIGN KEY (IdUsuari) REFERENCES Usuari(Id),
    FOREIGN KEY (IdApartament) REFERENCES Apartament(Id)
);

-- Crea la taula Temporada
CREATE TABLE Temporada (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    DataIniciTemporadaAlta DATE,
    DataFinalitzacioTemporadaAlta DATE,
    DataIniciTemporadaBaixa DATE,
    DataFinalitzacioTemporadaBaixa DATE
);

-- Relació entre Apartament i Extres (n:N)
CREATE TABLE ApartamentExtres (
    IdApartament INT,
    IdExtres INT,
    PRIMARY KEY (IdApartament, IdExtres),
    FOREIGN KEY (IdApartament) REFERENCES Apartament(Id),
    FOREIGN KEY (IdExtres) REFERENCES Extres(Id)
);

-- Relació entre Apartament i PeriodeTancament (n:N)
CREATE TABLE ApartamentPeriodeTancament (
    IdApartament INT,
    IdPeriodeTancament INT,
    PRIMARY KEY (IdApartament, IdPeriodeTancament),
    FOREIGN KEY (IdApartament) REFERENCES Apartament(Id),
    FOREIGN KEY (IdPeriodeTancament) REFERENCES PeriodeTancament(Id)
);

CREATE TABLE Imatges (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Enlace VARCHAR(255),
    IdApartament INT,
    FOREIGN KEY (IdApartament) REFERENCES Apartament(Id)
);

-- Relació entre Temporada i Reserva
ALTER TABLE Reserva
ADD COLUMN IdTemporada INT,
ADD FOREIGN KEY (IdTemporada) REFERENCES Temporada(Id);