-- Creación del esquema 'mydb'
DROP SCHEMA IF EXISTS mydb CASCADE;
CREATE SCHEMA mydb;

-- Creación de la tabla 'asignaturas'
DROP TABLE IF EXISTS asignaturas;
CREATE TABLE asignaturas (
  idasignatura SERIAL PRIMARY KEY,
  nombre_asignatura VARCHAR(45) NOT NULL,
  semestre INT NOT NULL,
  creditos INT NOT NULL,
  carrera VARCHAR(45) NOT NULL
);

INSERT INTO asignaturas (idasignatura, nombre_asignatura, semestre, creditos, carrera) 
VALUES
(1, 'Calculo II', 1, 5, 'informatica'),
(2, 'Algoritmo y programacion II', 3, 5, 'informatica'),
(3, 'Estadistica aplicada', 4, 4, 'informatica'),
(4, 'Calculo I', 2, 5, 'informatica'),
(5, 'Redes', 4, 4, 'informatica');

-- Creación de la tabla 'estudiantes'
DROP TABLE IF EXISTS estudiantes;
CREATE TABLE estudiantes (
  idestudiantes SERIAL PRIMARY KEY,
  personas_idpersonas INT NOT NULL
);

INSERT INTO estudiantes (idestudiantes, personas_idpersonas)
VALUES
(1, 3),
(2, 4),
(3, 5);

-- Creación de la tabla 'evaluaciones'
DROP TABLE IF EXISTS evaluaciones;
CREATE TABLE evaluaciones (
  idevaluaciones SERIAL PRIMARY KEY,
  tema VARCHAR(45) NOT NULL,
  tipo_evaluacion VARCHAR(45) NOT NULL,
  ponderacion FLOAT NOT NULL,
  fecha DATE NOT NULL,
  profesores_idprofesores INT NOT NULL
);

INSERT INTO evaluaciones (idevaluaciones, tema, tipo_evaluacion, ponderacion, fecha, profesores_idprofesores)
VALUES
(1, 'Integrales', 'Taller', 20, '2024-07-14', 1),
(2, 'Manipulacion de datos', 'prueba', 30, '2024-08-27', 2);

-- Creación de la tabla 'evaluaciones_has_asignaturas'
DROP TABLE IF EXISTS evaluaciones_has_asignaturas;
CREATE TABLE evaluaciones_has_asignaturas (
  idevaluaciones_has_asignaturascol SERIAL PRIMARY KEY,
  evaluaciones_idevaluaciones INT NOT NULL,
  asignaturas_idasignaturas INT NOT NULL
);

INSERT INTO evaluaciones_has_asignaturas (idevaluaciones_has_asignaturascol, evaluaciones_idevaluaciones, asignaturas_idasignaturas)
VALUES
(1, 1, 1),
(2, 2, 2);

-- Creación de la tabla 'generos'
DROP TABLE IF EXISTS generos;
CREATE TABLE generos (
  idgeneros SERIAL PRIMARY KEY,
  tipo_genero VARCHAR(25) NOT NULL
);

INSERT INTO generos (idgeneros, tipo_genero)
VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- Creación de la tabla 'personas'
DROP TABLE IF EXISTS personas;
CREATE TABLE personas (
  idpersonas SERIAL PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  cedula INT NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  generos_idgeneros INT NOT NULL
);

INSERT INTO personas (idpersonas, nombre, apellido, cedula, fecha_nacimiento, generos_idgeneros)
VALUES
(1, 'Isaac', 'Cattoni', 30551898, '2003-12-31', 2),
(2, 'Victor', 'Cardona', 30700323, '2005-05-19', 2),
(3, 'Jesus', 'Rondon', 31047386, '2004-09-30', 2),
(4, 'Kevin', 'Fragoso', 30346898, '2004-04-16', 2),
(5, 'Mauricio', 'Sanchez', 30013823, '2003-10-30', 2);

-- Creación de la tabla 'profesores'
DROP TABLE IF EXISTS profesores;
CREATE TABLE profesores (
  idprofesores SERIAL PRIMARY KEY,
  especialidad VARCHAR(45) NOT NULL,
  personas_idpersonas INT NOT NULL
);

INSERT INTO profesores (idprofesores, especialidad, personas_idpersonas)
VALUES
(1, 'Calculo II', 1),
(2, 'Algoritmo y programacion II', 2);

-- Creación de la tabla 'profesores_has_asignaturas'
DROP TABLE IF EXISTS profesores_has_asignaturas;
CREATE TABLE profesores_has_asignaturas (
  idprofesores_has_asignaturascol SERIAL PRIMARY KEY,
  profesores_idprofesores INT NOT NULL,
  asignaturas_idasignatura INT NOT NULL
);

INSERT INTO profesores_has_asignaturas (idprofesores_has_asignaturascol, profesores_idprofesores, asignaturas_idasignatura)
VALUES
(1, 1, 1),
(2, 2, 2);

-- Creación de la tabla 'secciones'
DROP TABLE IF EXISTS secciones;
CREATE TABLE secciones (
  idsecciones SERIAL PRIMARY KEY,
  nombre_seccion VARCHAR(45) NOT NULL,
  promedio FLOAT NOT NULL,
  estudiantes_idestudiantes INT NOT NULL
);

INSERT INTO secciones (idsecciones, nombre_seccion, promedio, estudiantes_idestudiantes)
VALUES
(1, 'A', 12, 1),
(2, 'B', 14, 2),
(3, 'C', 14, 3);

-- Creación de la tabla 'secciones_has_asignaturas'
DROP TABLE IF EXISTS secciones_has_asignaturas;
CREATE TABLE secciones_has_asignaturas (
  idsecciones_has_asignaturascol SERIAL PRIMARY KEY,
  secciones_idsecciones INT NOT NULL,
  asignaturas_idasignatura INT NOT NULL
);

INSERT INTO secciones_has_asignaturas (idsecciones_has_asignaturascol, secciones_idsecciones, asignaturas_idasignatura)
VALUES
(1, 1, 1),
(2, 2, 2);