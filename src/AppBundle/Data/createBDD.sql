-- delete database if exist
DROP DATABASE IF EXISTS tp_roland_garros;

-- create databse
CREATE DATABASE tp_roland_garros;
USE tp_roland_garros;

-- create table for entity Nationality
CREATE TABLE rg_nationality (
  id_nationality INT AUTO_INCREMENT NOT NULL,
  nationalty_name VARCHAR(25) DEFAULT NULL,
  short_name VARCHAR(5) DEFAULT NULL,
  PRIMARY KEY(id_nationality)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- create table for entity Person with index on the id field
CREATE TABLE rg_person (
  id_person INT AUTO_INCREMENT NOT NULL,
  nationality_id INT DEFAULT NULL,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  female TINYINT(1) DEFAULT NULL,
  INDEX IDX_B2F1BFD41C9DA55 (nationality_id),
  PRIMARY KEY(id_person)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- create table for entity Score with index on team and match id fields
CREATE TABLE rg_score (id_score INT AUTO_INCREMENT NOT NULL,
  team_id INT DEFAULT NULL,
  match_id INT DEFAULT NULL,
  nb_set_win INT DEFAULT NULL,
  win TINYINT(1) NOT NULL,
  INDEX IDX_CC254181296CD8AE (team_id),
  INDEX IDX_CC2541812ABEACD6 (match_id),
  PRIMARY KEY(id_score)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- create table for entity Team
CREATE TABLE rg_team (
  id_team INT AUTO_INCREMENT NOT NULL,
  PRIMARY KEY(id_team)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

--  create table for relation between Player and Team and index on both team and player id field
CREATE TABLE rg_team_players (
  team_id INT NOT NULL,
  player_id INT NOT NULL,
  INDEX IDX_1C015B89296CD8AE (team_id),
  INDEX IDX_1C015B8999E6F5DF (player_id),
  PRIMARY KEY(team_id, player_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- create table for TennisCourt
CREATE TABLE rg_tennis_court (
  id_tennis_court INT AUTO_INCREMENT NOT NULL,
  tennis_court_name VARCHAR(255) NOT NULL,
  tennis_court_number INT NOT NULL,
  PRIMARY KEY(id_tennis_court)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

--  create table for entity TennisMatch with index on tournament, referee and tennis court id
CREATE TABLE rg_tennis_match (
  id_tennis_match INT AUTO_INCREMENT NOT NULL,
  tournament_id INT DEFAULT NULL,
  referee_id INT DEFAULT NULL,
  tennis_court_id INT DEFAULT NULL,
  tennis_match_date DATETIME DEFAULT NULL,
  duration VARCHAR(5) DEFAULT NULL,
  INDEX IDX_B026B86F33D1A3E7 (tournament_id),
  INDEX IDX_B026B86F4A087CA2 (referee_id),
  INDEX IDX_B026B86F7BCDB375 (tennis_court_id),
  PRIMARY KEY(id_tennis_match)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- create table for Tournament withe index on id field
CREATE TABLE rg_tournament (
  id_tournament INT AUTO_INCREMENT NOT NULL,
  tournament_type_id INT DEFAULT NULL,
  tournament_name VARCHAR(20) NOT NULL,
  tournament_simple TINYINT(1) NOT NULL,
  class_name VARCHAR(15) NOT NULL,
  nb_set_max INT NOT NULL,
  INDEX IDX_3C85F387AE437799 (tournament_type_id),
  PRIMARY KEY(id_tournament)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- create table for TournamentType
CREATE TABLE rg_tournament_type (
  id_tournament_type INT AUTO_INCREMENT NOT NULL,
  tournament_type_name VARCHAR(20) NOT NULL,
  tournament_type_number INT NOT NULL,
  PRIMARY KEY(id_tournament_type)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

-- add foreign keys constraints
ALTER TABLE rg_person ADD CONSTRAINT FK_B2F1BFD41C9DA55 FOREIGN KEY (nationality_id) REFERENCES rg_nationality (id_nationality);
ALTER TABLE rg_score ADD CONSTRAINT FK_CC254181296CD8AE FOREIGN KEY (team_id) REFERENCES rg_team (id_team);
ALTER TABLE rg_score ADD CONSTRAINT FK_CC2541812ABEACD6 FOREIGN KEY (match_id) REFERENCES rg_tennis_match (id_tennis_match);
ALTER TABLE rg_team_players ADD CONSTRAINT FK_1C015B89296CD8AE FOREIGN KEY (team_id) REFERENCES rg_team (id_team);
ALTER TABLE rg_team_players ADD CONSTRAINT FK_1C015B8999E6F5DF FOREIGN KEY (player_id) REFERENCES rg_person (id_person);
ALTER TABLE rg_tennis_match ADD CONSTRAINT FK_B026B86F33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES rg_tournament (id_tournament);
ALTER TABLE rg_tennis_match ADD CONSTRAINT FK_B026B86F4A087CA2 FOREIGN KEY (referee_id) REFERENCES rg_person (id_person);
ALTER TABLE rg_tennis_match ADD CONSTRAINT FK_B026B86F7BCDB375 FOREIGN KEY (tennis_court_id) REFERENCES rg_tennis_court (id_tennis_court);
ALTER TABLE rg_tournament ADD CONSTRAINT FK_3C85F387AE437799 FOREIGN KEY (tournament_type_id) REFERENCES rg_tournament_type (id_tournament_type);