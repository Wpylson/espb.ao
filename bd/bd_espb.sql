
Create database espb;
use espb;



CREATE TABLE `espb`.`tbl_candidature` ( 
`idCandidature`     INT NOT NULL AUTO_INCREMENT , 
`idUser`            INT NOT NULL , 
`num_id`            VARCHAR(50) NOT NULL , 
`birth_date`        DATE NOT NULL , 
`idCurses`          INT NOT NULL , 
`num_phone`         VARCHAR(15) NOT NULL , 
`doc_id`              VARCHAR(255) NOT NULL , 
`doc_certicate`       VARCHAR(255) NOT NULL , 
`candidature_status`  INT NOT NULL , 
`data_candidature`   TIMESTAMP NOT NULL , 
PRIMARY KEY (`idCandidature`)) ENGINE = InnoDB;


CREATE TABLE `espb`.`tbl_curses` ( 
    `idCurses` INT NOT NULL AUTO_INCREMENT , 
    `curse_title` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`idCurses`)) ENGINE = InnoDB;