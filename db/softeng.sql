CREATE TABLE `expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expertise_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`expertise_name`)
) ENGINE=InnoDB;
LOCK TABLES `expertise` WRITE;
UNLOCK TABLES;




CREATE TABLE `cliniks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinik_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB;
LOCK TABLES `cliniks` WRITE;
UNLOCK TABLES;




CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `expertise_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `identity_UNIQUE` (`identity`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  KEY `fk_expertise_id_1` (`expertise_id`),
  CONSTRAINT `fk_expertise_id_1` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;
LOCK TABLES `doctors` WRITE;
UNLOCK TABLES;




CREATE TABLE `cliniks_doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinik_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cliniks_id_1_idx` (`clinik_id`),
  KEY `fk_doctors_id_1_idx` (`doctor_id`),
  CONSTRAINT `fk_cliniks_id_1` FOREIGN KEY (`clinik_id`) REFERENCES `cliniks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_doctors_id_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;
LOCK TABLES `cliniks_doctors` WRITE;
UNLOCK TABLES;




CREATE TABLE `time_slots`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB;
LOCK TABLES `time_slots` WRITE;
UNLOCK TABLES;




CREATE TABLE `free_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(45) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `time_slot_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_free_slot_id_1_idx` (`time_slot_id`),
  KEY `fk_doctors_id_2_idx` (`doctor_id`),
  CONSTRAINT `fk_doctors_id_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_free_slot_id_1` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;
LOCK TABLES `free_times` WRITE;
UNLOCK TABLES;




CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `disease` varchar(45) DEFAULT NULL,
  `blood_type` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `identity` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identity_UNIQUE` (`identity`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB;
LOCK TABLES `patients` WRITE;
UNLOCK TABLES;




CREATE TABLE `reserves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `free_time_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_free_slot_id_1_idx` (`free_time_id`),
  KEY `fk_doctor_id_2_idx` (`doctor_id`),
  KEY `fk_patient_id_1_idx` (`patient_id`),
  CONSTRAINT `fk_patient_id_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_doctor_id_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_free_time_id_1` FOREIGN KEY (`free_time_id`) REFERENCES `free_times` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;
LOCK TABLES `reserves` WRITE;
UNLOCK TABLES;
