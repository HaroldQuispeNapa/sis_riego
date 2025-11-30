CREATE DATABASE sis_riego;
USE sis_riego;

CREATE TABLE tipo_sensor(
	idtipo INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(100) NOT NULL,
    created_at DATE DEFAULT(NOW())
);

CREATE TABLE tabla_sensor(
	idsensor INT PRIMARY KEY AUTO_INCREMENT,
    idtipo INT,
	nombre VARCHAR(100) NOT NULL,
    codigo VARCHAR(15) NOT NULL,
    created_at DATE DEFAULT(NOW()),
    CONSTRAINT fk_idtipo FOREIGN KEY (idtipo) REFERENCES tipo_sensor(idtipo)
);

CREATE TABLE tabla_actividad(
	idactividad INT PRIMARY KEY AUTO_INCREMENT,
    idsensor INT,
    actividad VARCHAR(50),
    estado VARCHAR(1) DEFAULT 1,
    fecha DATE DEFAULT(now()),
    CONSTRAINT fk_idsensor FOREIGN KEY (idsensor) REFERENCES tabla_sensor(idsensor)
);

INSERT INTO tipo_sensor (tipo) VALUES ('Humedad'),('Suelo');

INSERT INTO tabla_sensor (idtipo, nombre, codigo) VALUES (1, 'Sensor Humedad A', 'HUM001'),(1, 'Sensor Humedad B', 'HUM002');
INSERT INTO tabla_sensor (idtipo, nombre, codigo) VALUES (2, 'Sensor Suelo A', 'SUEL001'),(2, 'Sensor Suelo B', 'SUEL002');

INSERT INTO tabla_actividad (idsensor, actividad, estado) VALUES (1, 'Medición de humedad', '1'),(2, 'Medición de humedad', '1');
INSERT INTO tabla_actividad (idsensor, actividad, estado) VALUES (3, 'Medición de pH del suelo', '1'), (4, 'Medición de pH del suelo', '1');

