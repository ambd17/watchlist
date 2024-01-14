#bbdd watchist netflix
#autor: Alessandra Bayot

#borro la bbdd
drop database db_watchlist;

#creamos la base de datos
CREATE SCHEMA IF NOT EXISTS `db_watchlist` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_watchlist` ;


-- -----------------------------------------------------
-- Table `db_watchlist`.`movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_watchlist`.`movies` (
  `id_movie` INT(11) NOT NULL AUTO_INCREMENT,
  `pic` VARCHAR(200) NOT NULL,
  `titulo` VARCHAR(50) NOT NULL,
  `ano_lanzamiento` INT(4) NOT NULL,
  `minutos` INT(3) NOT NULL,
  `categoria` VARCHAR(15) NOT NULL,
  `sinopsis` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`id_movie`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_watchlist`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_watchlist`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `apellidos` VARCHAR(30) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `contra` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_watchlist`.`listas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_watchlist`.`listas` (
  `idlistas` INT NOT NULL,
  `movies_id_movie` INT(11) NOT NULL,
  `usuarios_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`idlistas`),
  INDEX `fk_listas_movies1_idx` (`movies_id_movie` ASC) ,
  INDEX `fk_listas_usuarios1_idx` (`usuarios_id_usuario` ASC) ,
  CONSTRAINT `fk_listas_movies1`
    FOREIGN KEY (`movies_id_movie`)
    REFERENCES `db_watchlist`.`movies` (`id_movie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_listas_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `db_watchlist`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

#insertamos un usuario en la tabla 
insert into usuarios (`nombre`,`apellidos`,`email`,`contra`) values ('admin','admin','admin@admin.com','Admin@2024');

#muestro la tabla de usuarios
select * from usuarios;


#inserto datos a la tabla de peliculas
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://upload.wikimedia.org/wikipedia/en/thumb/c/c0/Lift_2024_poster.webp/259px-Lift_2024_poster.webp.png','Lift','2024','104','Accion','Un maestro ladrón es cortejado por su ex novia y el FBI para que lleve a cabo un atraco imposible con su equipo internacional en un vuelo de pasajeros 777 de Londres a Zurich.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHP6ZkVTCljPE56s2qjvNfHAgzArGqpOJYuIj7wgeJHx1zzlV5','Uncharted','2022','116','Accion','Nathan Drake y su compañero Victor Sullivan se adentran en la peligrosa búsqueda del "mayor tesoro jamás encontrado". Al mismo tiempo, rastrean pistas que puedan conducir al hermano perdido de Drake.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTn8tj9u-Tm9FkAaf2ZDkmIOV37fDnJKXB49_Ta48K63m9ZvSYm','White Chicks','2004','109','Comedia','Dos desafortunados agentes del FBI se hacen pasar por dos chicas, novatas en la alta sociedad para investigar una serie de secuestros. Pero mientras preparan su plan, descubren que irrumpir en la alta sociedad es mucho más duro de lo que creían.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://play-lh.googleusercontent.com/eJUgbA1JKOFZb6FSRnqhIk2yh4hlBlWElIeQPQk6_uIUyccNkvJu6jL9xYNmaklzGZlW','Chicas Malas','2004','97','Comedia','Tras pasar su infancia en África, Cady deberá enfrentarse a la vida en un típico instituto americano, y entablará amistad con tres de las chicas más populares y manipuladoras del instituto.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://pics.filmaffinity.com/El_viaje_de_Chihiro-405533198-large.jpg','El viaje de Chihiro','2001','125','Fantasia','Chihiro es una niña de diez años caprichosa y testaruda que cree que el universo entero debe someterse a sus deseos.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://i.pinimg.com/originals/cc/07/a2/cc07a29bbdac5a876f35068aa4472240.jpg','Alicia en el país de las maravillas','2010','108','Fantasia','Alicia, una joven de 19 años, acude a una mansión victoriana para asistir a una fiesta de la alta sociedad. Cuando está a punto de recibir públicamente una propuesta de matrimonio, sale corriendo tras un conejo blanco.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTZfAvQ4lq-p5CrO2gPGnTT7wdMdSq7BVkQwD68-fLvchs7SXy6','El diario de Noa','2004','121','Romance','Historia de amor entre Allie Hamilton y Noah Calhoun y recordada en una residencia de ancianos, décadas después de que sucediera. Basada en el libro de Nicholas Sparks.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZlsfv7T-3iX4KyGOqfBboNG5WfFEF7b7-j5m8_JkWtDYw7bao','Antes de ti','2016','110','Romance','Louisa una chica inestable y creativa, reside en un pequeño pueblo de la campiña inglesa. Vive sin rumbo y va de un trabajo a otro para ayudar a su familia a llegar a fin de mes. Sin embargo, un nuevo trabajo pondrá a prueba su habitual alegría.');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDD0mJYWbcOlkkKsx_aPLeQirc2Bx_Jz0KzPuyIOdPf86U-Zxj','Escape room','2019','100','Terror','Seis personas, sin ninguna relación entre sí, reciben un misterioso paquete. Su interior contiene un mensaje que promete al propietario una oportunidad para alejarse de su vida rutinaria: participar en un "escape room".');
insert into movies (`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis`) values ('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQ2UcwEm8syDclK8xYgXX-ltFptVxa84d3NDiyQjj4yRaE3_zwd','El Circulo','2015','87','Terror','Un grupo de extraños en una cámara de tortura que espera ser ejecutado se enfrenta a la horrible tarea de tener que elegir a un miembro del grupo como único sobreviviente.');

#inserto datos en la lista
INSERT INTO `listas`(`movies_id_movie`, `usuarios_id_usuario`) VALUES ('9','1');
INSERT INTO `listas`(`movies_id_movie`, `usuarios_id_usuario`) VALUES ('2','1');

#muestro la tabla de peliculas
select * from movies;

SELECT `email`, `contra` FROM `usuarios` WHERE email='admin@admin.com' and contra='Admin@2024'