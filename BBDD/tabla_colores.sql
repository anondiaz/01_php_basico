CREATE DATABASE IF NOT EXISTS colores_andres;
USE colores_andres;
CREATE TABLE IF NOT EXISTS colores (
id_color INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(15) NOT NULL,
color VARCHAR(15) NOT NULL
);

-- ALTER TABLE colores
-- RENAME COLUMN id_color
-- TO id_usuario
-- ;

-- ALTER TABLE colores
-- ADD COLUMN id_idioma
-- INT NOT NULL
-- ;

-- ALTER TABLE colores
-- ADD COLUMN id_color
-- INT NOT NULL
-- ;

-- CREATE TABLE IF NOT EXISTS colores_nombre (
-- id_color INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
-- lang_es VARCHAR(15) NOT NULL,
-- lang_en VARCHAR(15) NOT NULL
-- );

-- INSERT INTO colores_nombre (lang_en)
-- SELECT DISTINCT color FROM colores;

-- UPDATE colores_nombreeditoriales ed, poblaciones po
-- SET ed.id_poblacion = po.id_poblacion
-- WHERE ed.ciudad_editorial = po.nombre_poblacion
-- ;

-- ALTER TABLE editoriales
-- DROP ciudad_editorial;



-- CREATE TABLE IF NOT EXISTS idiomas (
-- id_idioma INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
-- idioma VARCHAR(15) NOT NULL
-- );

-- Crear una tabla de colores en multiples idiomas
-- Crear una tabla de idiomas en multiples idiomas
-- Añadir un campo de id_idioma en colores
-- Convertir id_color en un campo de id_usuario en colores
-- Convertir color en un campo de id_color en colores
-- Vincular los idiomas por el id_idioma
-- Vincular los colores por el id_color


INSERT INTO colores (color, usuario) VALUES ("green", "Son Goku");
INSERT INTO colores (color, usuario) VALUES ("blue","Bulma");
INSERT INTO colores (usuario, color) VALUES ("Vegeta", "red");

CREATE TABLE usuarios(
id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
usuario VARCHAR(50) NOT NULL,
email VARCHAR(100),
telefono VARCHAR(15),
password VARCHAR(255) NOT NULL
);

-- DROP TABLE usuarios;

CREATE USER colores@'%' IDENTIFIED BY '13579#Colores';

GRANT ALL PRIVILEGES ON colores_andres.* TO colores@'%' WITH GRANT OPTION;

USE colores_andres;

ALTER TABLE colores
ADD COLUMN id_usuario INT NOT NULL DEFAULT 1 ;

INSERT INTO colores (color, usuario, id_usuario) VALUES ("black","Batman", 2);
INSERT INTO colores (usuario, color, id_usuario) VALUES ("Superman", "blue", 2);
INSERT INTO colores (usuario, color, id_usuario) VALUES ("Vilma", "white", 3);
INSERT INTO colores (usuario, color, id_usuario) VALUES ("Pedro", "black", 3);
