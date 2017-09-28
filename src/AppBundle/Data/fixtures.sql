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
  (28, "SVK", "Slovaquie"),
  (29, "SER", "Serbe"),
  (30, "AUT", "Autriche"),
  (31, "BUL", "Bulgarie"),
  (32, "CAN", "Canada"),
  (33, "AFS", "Afrique du sud")
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
  (19, "P", false, 4, "Rafael", "Nadal"),
  (20, "P", false, 9, "Roger", "Federer"),
  (21, "P", false, 3, "Andy", "Murray"),
  (22, "P", false, 2, "Alexander", "Zverev"),
  (23, "P", false, 24, "Marin", "Cilic"),
  (24, "P", false, 29, "Novak", "Djokovic"),
  (25, "P", false, 30, "Dominic", "Thiem"),
  (26, "P", false, 31, "Grigor", "Dimitrov"),
  (27, "P", false, 9, "Stan", "Wawrinka"),
  (28, "P", false, 4, "Pablo", "Carreno Busta"),
  (29, "P", false, 32, "Milos", "Raonic"),
  (30, "P", false, 8, "David", "Goffin"),
  (31, "P", false, 4, "Roberto", "Bautista Agut"),
  (32, "P", false, 13, "Kei", "Nishikori"),
  (33, "P", false, 33, "Kevin", "Anderson"),
  (34, "P", false, 18, "Sam", "Querrey"),
  (35, "P", false, 18, "John", "Isner"),
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
INSERT INTO rg_tournament_type (id_tournament_type, tournament_type_name, tournament_type_number)
VALUES
  (1, "Homme", 1),
  (2, "Femme", 2),
  (3, "Mixte", 3)
;

# Tournament
INSERT INTO rg_tournament (id_tournament, class_name, tournament_name, nb_set_max, tournament_type_id, tournament_simple)
VALUES
  (1, "t-simple-h", "Simple messieurs", 5, 1, true),
  (2, "t-simple-f", "Simple dames", 3, 2, true),
  (3, "t-double-h", "Double messieurs", 5, 1, false),
  (4, "t-double-f", "Double dames", 3, 2, false),
  (5, "t-double-mixte", "Double mixte", 3, 3, false),
  (6, "t-simple-j", "Simple juniors mixte", 3, 3, true),
  (7, "t-double-j", "double juniors mixte", 3, 3, false)
;

# TennisCourt
INSERT INTO rg_tennis_court (id_tennis_court, tennis_court_name, tennis_court_number)
VALUES
  (1, "Court N°1", 1),
  (2, "Court Philippe-Chatrier", 2),
  (3, "Court Suzanne-Lenglen", 3)
;

# Team
INSERT INTO rg_team (id_team)
VALUES
  (1),
  (2),
  (3),
  (4),
  (5),
  (6),
  (7),
  (8),
  (9),
  (10),
  (11),
  (12),
  (13),
  (14),
  (15),
  (16),
  (17),
  (18),
  (19),
  (20),
  (21),
  (22),
  (23),
  (24),
  (25),
  (26),
  (27),
  (28),
  (29),
  (30),
  (31),
  (32),
  (33),
  (34),
  (35),
  (36),
  (37),
  (38),
  (39),
  (40)
;

# Team <=> Player
INSERT INTO rg_team_players (team_id, player_id)
VALUES
  (1, 10),
  (2, 11),
  (3, 9),
  (4, 14),
  (5, 17),
  (6, 24),
  (7, 25),
  (8, 31),
  (9, 42),
  (10, 37),
  (11, 50),
  (12, 38),
  (13, 49),
  (14, 39),
  (15, 48),
  (16, 40),
  (17, 12),
  (18, 13),
  (19, 15),
  (20, 16),
  (21, 18),
  (22, 19),
  (23, 20),
  (24, 21),
  (25, 42),
  (26, 43),
  (27, 44),
  (28, 45),
  (29, 46),
  (30, 47),
  (31, 48),
  (32, 49),
  (33, 9),
  (33, 16),
  (34, 11),
  (34, 37),
  (35, 12),
  (35, 22),
  (36, 13),
  (36, 27),
  (37, 16),
  (37, 19),
  (38, 34),
  (38, 35),
  (39, 18),
  (39, 19),
  (40, 20),
  (40, 21)
;

# TennisMatch Simple planned
INSERT INTO rg_tennis_match (id_tennis_match, tournament_id, tennis_court_id, referee_id)
VALUES
  (1, 1, 1, 1),
  (2, 1, 2, 3),
  (3, 1, 3, 4),
  (4, 1, 1, 8),
  (5, 2, 1, 2),
  (6, 2, 1, 5),
  (7, 2, 2, 6),
  (8, 2, 3, 7)
;

# Score of TennisMatch Simple planned
INSERT INTO rg_score (id_score, nb_set_win, team_id, match_id, win)
VALUES
  (1, null, 1, 1, false),
  (2, null, 2, 1, false),
  (3, null, 3, 2, false),
  (4, null, 4, 2, false),
  (5, null, 5, 3, false),
  (6, null, 6, 3, false),
  (7, null, 7, 4, false),
  (8, null, 8, 4, false),
  (9, null, 9, 5, false),
  (10, null, 10, 5, false),
  (11, null, 11, 6, false),
  (12, null, 12, 6, false),
  (13, null, 13, 7, false),
  (14, null, 14, 7, false),
  (15, null, 15, 8, false),
  (16, null, 16, 8, false)
;

# TennisMatch Simple planned and scored
INSERT INTO rg_tennis_match (id_tennis_match, tournament_id, tennis_court_id, referee_id, tennis_match_date, duration)
VALUES
  (9, 1, 1, 1, "2017-06-02 09:45", "03h42"),
  (10, 1, 2, 3, "2017-06-02 09:50", "02h15"),
  (11, 1, 3, 4, "2017-06-02 09:55", "02h25"),
  (12, 1, 1, 8, "2017-06-03 14:00", "02h54"),
  (13, 2, 1, 2, "2017-06-04 14:15", "03h59"),
  (14, 2, 1, 5, "2017-06-05 14:00", "02h04"),
  (15, 2, 2, 6, "2017-06-03 13:55", "01h47"),
  (16, 2, 3, 7, "2017-06-03 13:30", "02h32")
;

# Score of TennisMatch Simple planned and scored
INSERT INTO rg_score (id_score, nb_set_win, team_id, match_id, win)
VALUES
  (17, 3, 1, 9, true),
  (18, 0, 2, 9, false),
  (19, 2, 3, 10, false),
  (20, 3, 4, 10, true),
  (21, 1, 5, 11, false),
  (22, 3, 6, 11, true),
  (23, 0, 7, 12, false),
  (24, 3, 8, 12, true),
  (25, 2, 9, 13, true),
  (26, 1, 11, 13, false),
  (27, 2, 10, 14, true),
  (28, 0, 12, 14, false),
  (29, 0, 13, 15, false),
  (30, 2, 14, 15, true),
  (31, 2, 15, 16, true),
  (32, 1, 16, 16, false)
;

# TennisMatch Double planned
INSERT INTO rg_tennis_match (id_tennis_match, tournament_id, tennis_court_id, referee_id)
VALUES
  (17, 3, 1, 2),
  (18, 3, 2, 3)
;

# Score of TennisMatch Double planned
INSERT INTO rg_score (id_score, nb_set_win, team_id, match_id, win)
VALUES
  (33, null, 33, 17, false),
  (34, null, 34, 17, false),
  (35, null, 35, 18, false),
  (36, null, 36, 18, false)
;

# TennisMatch Double planned and scored
INSERT INTO rg_tennis_match (id_tennis_match, tournament_id, tennis_court_id, referee_id, tennis_match_date, duration)
VALUES
  (19, 3, 3, 7, "2017-06-06 14:30", "03h16"),
  (20, 3, 3, 6, "2017-06-06 12:50", "02h53")
;

# Score of TennisMatch Double planned and scored
INSERT INTO rg_score (id_score, nb_set_win, team_id, match_id, win)
VALUES
  (37, 3, 37, 19, true),
  (38, 2, 38, 19, false),
  (39, 1, 39, 20, false),
  (40, 3, 40, 20, true)
;