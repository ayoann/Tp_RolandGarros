# Nationality
INSERT INTO rg_nationality (id_nationality, short_name, nationalty_name)
VALUES
  (1, "FRA", "France"),
  (2, "GER", "Allemagne"),
  (3, "ANG", "Angleterre"),
  (4, "ESP", "Espagne"),
  (5, "SWE", "Suède"),
  (6, "DAN", "Danemark"),
  (7, "RUS", "Russie"),
  (8, "BEL", "Belgique"),
  (9, "SUI", "Suisse"),
  (10, "SCO", "Écosse"),
  (11, "POR", "Portugal"),
  (12, "CHI", "Chine"),
  (13, "JAP", "Japon"),
  (14, "BOL", "Bolivie"),
  (15, "ARG", "Argentine"),
  (16, "BRE", "Brésil"),
  (17, "MEX", "Mexique"),
  (18, "USA", "États-Unis"),
  (19, "CAN", "Canada"),
  (20, "POL", "Pologne"),
  (21, "KOW", "Koweït"),
  (22, "AUS", "Australie"),
  (23, "ITA", "Italie"),
  (24, "CRO", "Croatie"),
  (25, "ROU", "Roumanie"),
  (26, "UKR", "Ukraine"),
  (27, "CZE", "République Tchèque"),
  (28, "SVK", "Slovaquie")
;

# Referee
INSERT INTO rg_person (id_person, type, firstname, lastname)
VALUES
  (1, "R", "Rudy", "Cordier"),
  (2, "R", "Quentin", "Karren"),
  (3, "R", "Allison", "Davies"),
  (4, "R", "Léo", "Dubois"),
  (5, "R", "Sandrine", "Mazilu"),
  (6, "R", "MAZILU", "Meunier"),
  (7, "R", "Jean-François", "Rizzo"),
  (8, "R", "Michael", "Wili")
;

# male players
INSERT INTO rg_person (id_person, type, female, nationality_id, firstname, lastname)
VALUES
  (9, "P", false, 4, "Nicolas", "Almagro"),
  (10, "P", false, 7, "Alen", "Avidzba"),
  (11, "P", false, 18, "Brian", "Baker"),
  (12, "P", false, 2, "Andre", "Begemann"),
  (13, "P", false, 9, "Marco", "Chiudinelli"),
  (14, "P", false, 23, "Matteo", "Donati"),
  (15, "P", false, 5, "Thomas", "Enqvist"),
  (16, "P", false, 4, "David", "Ferrer"),
  (17, "P", false, 15, "Axel", "Geller"),
  (18, "P", false, 1, "Maxime", "Hamou"),
  (19, "P", false, 1, "Rafael", "Nadal"),
  (20, "P", false, 1, "Roger", "Federer"),
  (21, "P", false, 1, "Andy", "Murray"),
  (22, "P", false, 1, "Alexander", "Zverev"),
  (23, "P", false, 1, "Marin", "Cilic"),
  (24, "P", false, 1, "Novak", "Djokovic"),
  (25, "P", false, 1, "Dominic", "Thiem"),
  (26, "P", false, 1, "Grigor", "Dimitrov"),
  (27, "P", false, 1, "Stan", "Wawrinka"),
  (28, "P", false, 1, "Pablo", "Carreno Busta"),
  (29, "P", false, 1, "Milos", "Raonic"),
  (30, "P", false, 1, "David", "Goffin"),
  (31, "P", false, 1, "Roberto", "Bautista Agut"),
  (32, "P", false, 1, "Kei", "Nishikori"),
  (33, "P", false, 1, "Kevin", "Anderson"),
  (34, "P", false, 1, "Sam", "Querrey"),
  (35, "P", false, 1, "John", "Isner"),
  (36, "P", false, 1, "Jo-Wilfried", "Tsonga")
;

# female players
INSERT INTO rg_person (id_person, type, female, nationality_id, firstname, lastname)
VALUES
  (37, "P", true, 4, "Garbine", "Muguruza"),
  (38, "P", true, 25, "Simona", "Halep"),
  (39, "P", true, 26, "Elina", "Svitolina"),
  (40, "P", true, 27, "Karolina", "Pliskova"),
  (41, "P", true, 18, "Venus", "Williams"),
  (42, "P", true, 6, "Caroline", "Wozniacki"),
  (43, "P", true, 3, "Johanna", "Konta"),
  (44, "P", true, 7, "Sveltana", "Kuznetsova"),
  (45, "P", true, 28, "Dominika", "Sveltana"),
  (46, "P", true, 28, "Jelena", "Ostapenko"),
  (47, "P", true, 18, "Madison", "Keys"),
  (48, "P", true, 2, "Angelique", "Kerber"),
  (49, "P", true, 20, "Agnieszka", "Radwanska"),
  (50, "P", true, 27, "Petra", "Kvitova")
;

# TournamentType
INSERT INTO rg_tournement_type (id_tournament_type, _tournament_type_name, tournament_type_number)
VALUES
  (1, "Homme", 1),
  (2, "Femme", 2),
  (3, "Mixte", 3)
;

# Tournament
INSERT INTO rg_tournement (id_tournament, tournament_name, nb_set_max, tournament_type_id)
VALUES
  (1, "Simple messieurs", 5, 1),
  (2, "Simple dames", 3, 2),
  (3, "Double messieurs", 5, 1),
  (4, "Double dames", 3, 2),
  (5, "Double mixte", 3, 3),
  (6, "Simple juniors mixte", 3, 3),
  (7, "double juniors mixte", 3, 3)
;

# Team
INSERT INTO rg_team (id_team)
VALUES
  (1),
;

# Team <=> Player
INSERT INTO rg_team_players (team_id, player_id)
VALUES
  (1),
;

# Score
INSERT INTO rg_score (id_score, nb_set_win, team_id, match_id)
VALUES
  (1),
;

# TennisMatch Simple planned
INSERT INTO rg_tennis_match (id_tennis_match, tournament_id, referee_id)
VALUES
  (),