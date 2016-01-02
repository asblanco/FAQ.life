-- MySQL script creado por Borxa Mendez Candeias y Andrea Sanchez Blanco

-- -----------------------------------------------------
-- Schema faq_life
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `faq_life` DEFAULT CHARACTER SET utf8 ;
USE `faq_life` ;

-- -----------------------------------------------------
-- Users And Privileges
-- -----------------------------------------------------
CREATE USER 'faq_life'@'localhost' identified by 'faqpass';
GRANT ALL PRIVILEGES ON faq_life.* TO 'faq_life'@'localhost' WITH GRANT OPTION;

-- -----------------------------------------------------
-- Table `faq_life`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq_life`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `foto` VARCHAR(50) NULL DEFAULT 'default.png',
  `idioma` VARCHAR(3) NULL DEFAULT 'spa',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `faq_life`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq_life`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `faq_life`.`preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq_life`.`preguntas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` LONGTEXT NOT NULL,
  `cuerpo` LONGTEXT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `visto` INT NULL DEFAULT 0,
  `respuestas` INT NULL DEFAULT 0,
  `positivos` INT NULL DEFAULT 0,
  `negativos` INT NULL DEFAULT 0,
  `usuario_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  `pvoto_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_preguntas_usuarios_idx` (`usuario_id` ASC),
  INDEX `fk_preguntas_categorias1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_preguntas_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `faq_life`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_preguntas_categorias`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `faq_life`.`categorias` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `faq_life`.`respuestas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq_life`.`respuestas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cuerpo_res` LONGTEXT NOT NULL,
  `fecha_res` DATETIME NOT NULL,
  `positivos` INT NOT NULL DEFAULT 0,
  `negativos` INT NOT NULL DEFAULT 0,
  `usuario_id` INT NOT NULL,
  `pregunta_id` INT UNSIGNED NOT NULL,
  `rvoto_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_respuestas_preguntas1_idx` (`pregunta_id` ASC),
  CONSTRAINT `fk_respuestas_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `faq_life`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_respuestas_preguntas`
    FOREIGN KEY (`pregunta_id`)
    REFERENCES `faq_life`.`preguntas` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `faq_life`.`rvotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq_life`.`rvotos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `voto` INT NULL,
  `usuario_id` INT NOT NULL,
  `respuesta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rvotos_usuarios1_idx` (`usuario_id` ASC),
  INDEX `fk_rvotos_respuestas1_idx` (`respuesta_id` ASC),
  CONSTRAINT `fk_rvotos_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `faq_life`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rvotos_respuestas`
    FOREIGN KEY (`respuesta_id`)
    REFERENCES `faq_life`.`respuestas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `faq_life`.`pvotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq_life`.`pvotos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `voto` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `pregunta_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pvotos_usuarios1_idx` (`usuario_id` ASC),
  INDEX `fk_pvotos_preguntas1_idx` (`pregunta_id` ASC),
  CONSTRAINT `fk_pvotos_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `faq_life`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pvotos_preguntas`
    FOREIGN KEY (`pregunta_id`)
    REFERENCES `faq_life`.`preguntas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Insert Data Into Tables
-- -----------------------------------------------------
INSERT INTO `usuarios` (`id`,`username`, `password`, `nombre`, `foto`, `idioma`) VALUES
(null, 'manolo', '$2a$10$OwSsRUbGDPwJwJ9kT9Mz..vT/w8fEqbRNVwXfKtqq7XSQufpQgSUO', 'Manolo Pérez', 'img_users/superman.jpg', 'spa'),
(null, 'juanito', '$2a$10$BJdR5.cvZrV9Y06qmMUNe..zJkHHM3T./WIhT1NxniKNjBBh7hWUq', 'Juan Sánchez', 'img_users/default.png', 'eng'),
(null, 'carlitos', '$2a$10$JlS1DEAdsVXIV8ieoWTp/.zKEiObYAw9BTBNL.kAVyXENpsKK86V2', 'Carlos Méndez', 'img_users/default.png', 'glg'),
(null, 'marco', '$2a$10$zSn4yxbFaLUv5HrBqNAUL.VBSzGdwOBuMHt4K6KF/7kDp1Z9c6Ghm', 'Marco Pérez', 'img_users/pluto_lengua.jpg', 'spa'),
(null, 'lucas', '$2a$10$4YTabU7ZcCIBxHVXZMJd8OUIM5/ASXJGmfPjJwmB9o5TLiTt8t.Zq', 'Lucas Rodriguez', 'img_users/pluto_posando.jpg', 'eng');

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(null, 'Religion'),
(null, 'Electricidad'),
(null, 'Noticias'),
(null, 'Comida'),
(null, 'Naturaleza'),
(null, 'Deporte');

INSERT INTO `preguntas` (`id`, `titulo`, `cuerpo`, `fecha`, `visto`, `respuestas`, `positivos`, `negativos`, `usuario_id`, `categoria_id`) VALUES
(null, '¿Si satanas castiga a los malos, eso no lo hace ser bueno?', 'Pues los malos se van al infierno y satanas les da su merecido, eso no lo hace bueno?', '2015-10-22 10:20:00', 0, 2, 0, 0, 1, 1),
(null, '¿Cuántas comidas hay que hacer al día?', 'Unos dicen tres, otros cinco, otros cuatro... esto es un lio, por favor, !ayudadme!', '2016-01-01 00:20:00', 0, 1, 0, 0, 2, 4),
(null, '¿Cuántos huevos se pueden tomar a la semana?', 'Unos dicen tres, otros cinco, otros cuatro... esto es un lio, por favor, !ayudadme!', '2015-01-01 00:20:00', 0, 0, 0, 0, 2, 4),
(null, '¿A dónde va la luz cuando le doy al interruptor?', 'Siempre que le doy al interruptor para apagar la luz me pregunto a donde va, porque cuando le vuelvo a dar se vuelve a encender inmediatamente. Se queda esperando?', '2015-10-18 11:30:00', 0, 0, 0, 0, 3, 2),
(null, '¿En las tormentas hay rayos que vayan de abajo arriba?', '', '2015-10-19 16:30:00', 0, 1, 0, 0, 3, 5),
(null, 'Carlinhos Brown perseguirá a los morosos tocando el tambor', 'Tras expirar su contrato con el correccional de Guantánamo, el cantante y percusionista Carlinhos Brown ha creado la empresa “Pe pe pe pepepe pe pe SL”, que ofrece un servicio de cobro de morosos.
El artista brasileño perseguirá a los deudores bailando al ritmo de una samba y tocando el tambor constantemente, una actividad que el cerebro humano no puede soportar más de dos horas seguidas, según los expertos.', '2015-10-19 22:41:00', 0, 0, 0, 0, 3, 3);

INSERT INTO `respuestas` (`id`, `cuerpo_res`, `fecha_res`, `positivos`, `negativos`, `usuario_id`, `pregunta_id`) VALUES
(null, 'yo siempre dije q satanas era un buen loco incomprendido por esta sociedad posmoderna', '2015-10-18 11:30:00', 0, 0, 4, 1),
(null, 'Tus premisas son acertadas pero como Satanas no existe eso no es valido', '2015-11-08 1:28:00', 0, 0, 5, 1),
(null, 'Sí, no siempre son una descarga desde las nubes al suelo. Pero son menos frecuentes que los que caen a tierra: de entre todos los rayos que no saltan de una nube a otra, los de tierra a nube solo representan un 10%, pero tienen un mecanismo idéntico. Al final, se trata de aire o agua cargados de iones negativos que, por diferencia de potencial, se ven atraídos por una “bolsa” de iones positivos. En situación de calma, las cargas positivas y negativas están distribuidas de modo regular en la atmósfera. Lo que ocurre en una tormenta eléctrica es que las corrientes de aire hacen que los cristales de hielo (+) asciendan y el granizo (-) descienda; como el suelo de la Tierra está cargado de iones positivos (protones), atraen a los negativos, y se produce una corriente que acaba en descarga. Pero a veces, la carga negativa de la nube es tan abundante que en vez de atraerla la positiva de la Tierra, los protones ascienden hacia la nube. Se llama también descarga inversa. Eso sí, la forma de unos rayos y de otros no es igual. Los que caen de las nubes al suelo tienen menos ramificaciones, pero los que son ascendentes tienen más “brazos”, aunque más cortos.', '2015-11-08 1:28:00', 0, 0, 5, 5),
(null, 'Lo más recomendable desde el punto de vista de los especialistas es repartir la ingesta en 5 comidas. Se favorece así el reparto de la energía a lo largo del día, evitando que se llegue a la comida siguiente con mucha sensación de hambre y que se coma más de lo debido. Un reparto adecuado de la ingesta a lo largo del día ayuda a mantener un peso estable.', '2016-01-01 1:28:00', 0, 0, 5, 2);
