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
    PreuDiaTemporadaAlta DECIMAL(10, 2),
    numPersones INT
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
    Rol ENUM('Usuari', 'Gestor', 'Administrador') DEFAULT 'Usuari'
);

-- Crea la taula Reserva
CREATE TABLE Reserva (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Preu DECIMAL(10, 2),
    DataReserva DATE,
    numUsuaris INT,
    IdUsuari INT,
    IdApartament INT,

    FOREIGN KEY (IdUsuari) REFERENCES Usuari(Id),
    FOREIGN KEY (IdApartament) REFERENCES Apartament(Id)
);

CREATE TABLE Disponibilitat (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Data DATE,
    IdReserva INT,
    IdApartament INT,
    FOREIGN KEY (IdReserva) REFERENCES Reserva(Id),
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

INSERT INTO `usuari` (`Id`, `Nom`, `Cognoms`, `Telefon`, `CorreuElectronic`, `Contrasenya`, `NumTargetaCredit`, `Rol`) VALUES
(1, 'admin', 'admin', NULL, 'admin@admin', '1234', NULL, 'Administrador'),
(2, 'gestor', 'gestor', NULL, 'gestor@gestor', '1234', NULL, 'Gestor'),
(3, 'usuari', 'usuari', NULL, 'usuari@usuari', '1234', NULL, 'Usuari');

INSERT INTO Apartament (Titol, Adreca, Longitud, Latitud, Descripcio, MetresQuadrats, NumHabitacions, PreuDiaTemporadaBaixa, PreuDiaTemporadaAlta, numPersones)
VALUES
    ('Apartamento 1', 'Direccion 1', 12.345678, 23.456789, 'Descripcion del apartamento 1', 80, 2, 100.00, 150.00, 4),
    ('Apartamento 2', 'Direccion 2', 12.345679, 23.456790, 'Descripcion del apartamento 2', 100, 3, 120.00, 180.00, 6),
    ('Apartamento 3', 'Direccion 3', 12.345680, 23.456781, 'Descripcion del apartamento 3', 70, 2, 90.00, 140.00, 4),
    ('Apartamento 4', 'Direccion 4', 12.345681, 23.456782, 'Descripcion del apartamento 4', 120, 4, 150.00, 220.00, 8),
    ('Apartamento 5', 'Direccion 5', 12.345682, 23.456783, 'Descripcion del apartamento 5', 90, 3, 110.00, 170.00, 6),
    ('Apartamento 6', 'Direccion 6', 12.345683, 23.456784, 'Descripcion del apartamento 6', 60, 1, 80.00, 120.00, 2),
    ('Apartamento 7', 'Direccion 7', 12.345684, 23.456785, 'Descripcion del apartamento 7', 110, 4, 140.00, 200.00, 8),
    ('Apartamento 8', 'Direccion 8', 12.345685, 23.456786, 'Descripcion del apartamento 8', 75, 2, 95.00, 150.00, 4),
    ('Apartamento 9', 'Direccion 9', 12.345686, 23.456787, 'Descripcion del apartamento 9', 100, 3, 120.00, 180.00, 6),
    ('Apartamento 10', 'Direccion 10', 12.345687, 23.456788, 'Descripcion del apartamento 10', 85, 2, 100.00, 160.00, 4);

INSERT INTO Imatges (Enlace, IdApartament)
VALUES
    ('hab1.jpg', 1),
    ('hab2.jpg', 2),
    ('hab3.jpg', 3),
    ('hab4.jpg', 4),
    ('hab5.jpg', 5),
    ('hab6.jpg', 6),
    ('hab7.jpg', 7),
    ('hab8.jpg', 8),
    ('hab9.jpg', 9),
    ('hab10.jpg', 10);

    INSERT INTO `temporada` (`Id`, `DataIniciTemporadaAlta`, `DataFinalitzacioTemporadaAlta`, `DataIniciTemporadaBaixa`, `DataFinalitzacioTemporadaBaixa`) VALUES ('1', NULL, NULL, NULL, NULL);
    ALTER TABLE apartament
ADD COLUMN Extras VARCHAR(255);
UPDATE apartament
SET Extras = 'Wi-Fi, Aire Acondicionado, TV por Cable'
WHERE Id IN (1, 2, 3);
