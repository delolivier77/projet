-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 27 Septembre 2016 à 11:31
-- Version du serveur :  5.7.9
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_a` int(11) NOT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_a`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_co` int(11) NOT NULL AUTO_INCREMENT,
  `id_p` int(11) DEFAULT NULL,
  `id_et` int(11) DEFAULT NULL,
  `note` int(5) DEFAULT NULL,
  `commentaire` longtext,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id_co`),
  KEY `fk_commentaire_particulier1_idx` (`id_p`),
  KEY `fk_commentaire_etudiant1_idx` (`id_et`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_co`, `id_p`, `id_et`, `note`, `commentaire`, `date_commentaire`) VALUES
(1, 32, 2, 5, 'Il s''agit d''un excellent professeur, de très bon avis . Il convient parfaitement aux adolescents. Il a su motiver et faire progresser mon fils pour l''épreuve du bac à laquelle il a eu de très bons résultats.', '2016-01-09 13:54:52'),
(2, 33, 3, 4, 'Grâce aux stages organisés en webcam, mon fils a obtenu son bac avec une mention Très Bien et un 19 en Maths. Excellent professeur avec de bonnes méthodes.', '2016-08-09 12:06:23'),
(3, 34, 4, 4, 'C''est un bon professeur que nous recommandons, il est agréable et pédagogue. Notre fille a bien progressé.', '2016-08-09 12:06:41'),
(4, 35, 5, 4, 'Professeur à l''écoute et vraiment sérieux qui sait s''adapter aux exigences de tout un chacun. Je le recommande vivement !', '2016-01-13 20:20:28'),
(5, 36, 6, 5, 'Très bon professeur, il a su s''adapter aux attentes de mon fils et proposer des cours en suivant les objectifs. Il a également un emploi du temps très flexible et est très arrangeant.', '2016-08-06 23:54:50'),
(6, 37, 4, 2, 'Bon professeur. Nous regrettons cependant son manque de ponctualité.', '2016-07-14 19:08:59'),
(7, 38, 3, 3, 'Professeur qui connaît bien sa matière, mais qui peut-être ne sait pas assez se mettre au niveau de l''élève.', '2016-05-03 06:12:24'),
(8, 39, 2, 4, 'Très bon professeur. A conseiller !', '2016-05-08 20:26:13'),
(9, 40, 5, 5, 'Excellent professeur, très sérieux et à l''écoute de l''élève. A recommander !', '2016-01-21 17:28:19'),
(10, 41, 6, 4, 'J''ai beaucoup apprécié ce professeur, je vous le recommande pour son écoute. Il sait être pédagogue. De plus son emploi du temps est très flexible.', '2016-07-30 11:55:44'),
(11, 32, 18, 3, 'Je recommande Amaury, les notes de mon fils se sont améliorées!', '2016-09-27 11:21:35');

-- --------------------------------------------------------

--
-- Structure de la table `connaissance`
--

DROP TABLE IF EXISTS `connaissance`;
CREATE TABLE IF NOT EXISTS `connaissance` (
  `id_cn` int(11) NOT NULL AUTO_INCREMENT,
  `id_m` int(11) NOT NULL,
  `id_et` int(11) NOT NULL,
  `id_s_min` int(11) NOT NULL,
  `id_s_max` int(11) NOT NULL,
  PRIMARY KEY (`id_cn`),
  KEY `fk_connaissance_matiere1_idx` (`id_m`),
  KEY `fk_connaissance_etudiant1_idx` (`id_et`),
  KEY `fk_connaissance_scolarite1_idx` (`id_s_min`),
  KEY `id_s_max` (`id_s_max`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `connaissance`
--

INSERT INTO `connaissance` (`id_cn`, `id_m`, `id_et`, `id_s_min`, `id_s_max`) VALUES
(1, 31, 2, 1, 12),
(2, 29, 3, 6, 12),
(3, 8, 4, 3, 12),
(4, 8, 5, 1, 6),
(5, 29, 6, 4, 9),
(6, 8, 7, 9, 12),
(7, 14, 8, 6, 12),
(8, 29, 9, 3, 12),
(9, 33, 10, 1, 12),
(10, 34, 11, 1, 5),
(11, 36, 12, 6, 12),
(12, 2, 13, 9, 12),
(13, 2, 14, 6, 12),
(14, 2, 15, 1, 5),
(15, 12, 16, 1, 12),
(16, 8, 17, 6, 12),
(17, 29, 18, 3, 12),
(18, 38, 19, 6, 12),
(19, 16, 20, 4, 9),
(20, 23, 21, 3, 12),
(21, 29, 22, 1, 12),
(22, 12, 23, 1, 5),
(23, 12, 24, 6, 12),
(24, 13, 25, 1, 5),
(25, 9, 26, 6, 12),
(26, 10, 27, 4, 9),
(27, 33, 28, 1, 12),
(28, 16, 29, 6, 12),
(29, 6, 30, 4, 9),
(30, 21, 31, 1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id_en` int(11) NOT NULL AUTO_INCREMENT,
  `id_p` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_en`),
  KEY `fk_enfant_particulier1_idx` (`id_p`),
  KEY `fk_enfant_scolarite1_idx` (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`id_en`, `id_p`, `id_s`, `prenom`, `date_naissance`) VALUES
(1, 32, 12, 'Adrien', '1995-01-15'),
(2, 33, 10, 'Alain', '1995-02-14'),
(3, 34, 11, 'Béatrice', '1996-03-02'),
(4, 35, 4, 'Bruno', '2005-06-28'),
(5, 36, 6, 'Cédric', '2002-04-07'),
(6, 37, 12, 'Charlotte', '2005-05-24'),
(7, 38, 11, 'Denis', '2002-04-07'),
(8, 39, 7, 'Edouard', '2001-02-03'),
(9, 40, 5, 'Emmanuel', '2003-03-08'),
(10, 41, 8, 'Hélène', '2004-11-28');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_et` int(11) NOT NULL,
  `civilite` enum('M.','Mme') NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `num_etudiant` varchar(30) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `dispo` tinyint(1) NOT NULL DEFAULT '1',
  `detail_dispo` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `niveau_etude` varchar(45) NOT NULL,
  `tarif` int(11) NOT NULL,
  `type_rdv` enum('faceface','webcam','both') NOT NULL DEFAULT 'faceface',
  PRIMARY KEY (`id_et`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id_et`, `civilite`, `date_naissance`, `photo`, `num_etudiant`, `adresse`, `cp`, `ville`, `tel`, `dispo`, `detail_dispo`, `description`, `niveau_etude`, `tarif`, `type_rdv`) VALUES
(2, 'M.', '1991-05-22', '01-etudiant.jpg', '16971017-0227', '2 Rue d''Arras', 75005, 'Paris', '0192246635', 1, 'Je suis disponible le vendredi de 17h00 à 19h00.', 'Ancien élève de Classe Préparatoire ECE au lycée Henri IV à Paris, diplômé d’HEC Paris, professeur agrégé de Philosophie (reçu 8e), interrogateur en Prépa au Lycée Louis le Grand, également titulaire d’un M1 de Lettres Modernes. Grande expérience des cours particuliers et sachant m''adapter à chacun : j''ai permis à des élèves de Terminale de progresser rapidement et ayant enseigné plusieurs années au lycée j’ai une bonne connaissance de leurs difficultés et des méthodes adaptées. J''ai aussi aidé des élèves de prépa à réussir leurs concours d’école de commerce.', 'Bac +4', 18, 'faceface'),
(3, 'M.', '1997-10-18', '02-etudiant.jpg', '16451206-8349', '17 Rue de l''École Polytechnique', 75005, 'Paris', '0138166263', 1, 'Je suis disponible le samedi de 10h00 à 12h00.', 'Jeune étudiant titulaire d''un diplôme de Master 2 en Physique de la Matière Condensée et Nano-physique avec la mention assez bien, ayant 5 ans d’expérience en cours particuliers à domicile, je vous propose des cours tout au long de l''année scolaire et pendant les vacances scolaires, stage de remise à niveau, préparation aux contrôles, aux devoirs maison et préparation aux examens du Brevet et du BAC. Je suis une personne sérieuse, rigoureuse, pédagogue ayant une expérience assez solide et tous mes élèves ont connu une progression notable et de très bons résultats.', 'Bac +5 (ou +)', 21, 'webcam'),
(4, 'M.', '1988-09-12', '03-etudiant.jpg', '16950516-1266', '14 Rue de Savoie', 75006, 'Paris', '0119574521', 1, 'Je suis disponible le lundi de 17h00 à 20h00.', 'Bonjour, je suis étudiant en troisième année Vétérinaire. J''ai choisi cette filière car elle m''a permis de découvrir de nombreuses applications aux matières scientifiques. J''aime transmettre ma passion pour ces sujets et j''illustre au maximum mes cours avec des exemples d''application pour intéresser mes élèves. N''hésitez pas à me contacter pour convenir d''un rendez-vous ou pour me poser des questions.', 'Bac +2', 26, 'both'),
(5, 'Mme', '1987-11-11', '04-etudiant.jpg', '16310619-5187', '199 Boulevard Saint-Germain', 75007, 'Paris', '0163932917', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je suis actuellement Professeur en lycée depuis plus de cinq ans. Mon expérience pédagogique, celle d''un vrai professionnel de l''enseignement (préparation de sujet, correction, oraux prépas, stage...), m''a permis de contribuer aux succès d''élèves aux niveaux, aux filières et aux objectifs très variés. Je me tiens à votre disposition et je vous invite à me contacter par mail ou par téléphone pour toutes questions ou renseignements.', 'Bac +4', 28, 'faceface'),
(6, 'M.', '1992-06-08', '05-etudiant.jpg', '16060723-2550', '15 Rue de la Glacière', 75013, 'Marseille', '0143252244', 1, 'Je suis disponible le mercredi de 14h00 à 16h00.', 'Je prépare un master en Chimie. J''aime enseigner aux enfants et je suis très pédagogue. J’évalue l''élève afin d''identifier ses points forts et ses points faibles de façon à mieux cibler les exercices et leçons à étudier, j''adapte ensuite mon enseignement à la progression et aux besoins de l''élève. Mes cours se baseront sur la méthodologie, une explication du cours, des exercices d''application et d''approfondissement mais aussi des fiches explicatives comportant plusieurs astuces.', 'Bac +4', 26, 'both'),
(7, 'Mme', '1996-04-29', '06-etudiant.jpg', '16361012-4616', '14 Rue de l''Université', 75007, 'Paris', '0181779494', 1, 'Je suis disponible le lundi de 19h00 à 21h00.', 'Persuadée que la maîtrise parfaite de la langue n''est pas la seule garantie pour offrir des cours de qualité, j''ai suivi une formation de professeur d''espagnol langue étrangère à l''institut Cervantes. J''essaie toujours de m''adapter aux goûts et à la personnalité de chaque élève, en travaillant sur des sujets qui leur permettent de regagner confiance en eux et, le plus souvent, de prendre conscience de tout ce qu''ils savent déjà.', 'Bac +1', 20, 'webcam'),
(8, 'M.', '1990-02-17', '07-etudiant.jpg', '16301106-1706', '9 Rue Duguesclin', 13001, 'Marseille', '0451722081', 1, 'Je suis disponible le jeudi de 19h00 à 20h00.', 'Je prépare un Deug de Mathématiques. J''aime enseigner aux enfants et je suis très pédagogue. J’ai l''habitude de m''adapter à la personnalité et aux capacités de chacun. N''hésitez pas à me contacter, je répondrai avec plaisir à vos questions.', 'Bac +1', 17, 'faceface'),
(9, 'M.', '1989-12-28', '08-etudiant.jpg', '16030917-8242', '31 Rue Quintin', 33000, 'Bordeaux', '0557335529', 1, 'Je suis disponible le mercredi de 15h00 à 17h00.', 'Je prépare une maîtrise de Physique. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 25, 'faceface'),
(10, 'M.', '1986-08-20', '09-etudiant.jpg', '16030202-8063', '7 Rue du Professeur Démons', 33000, 'Bordeaux', '0597812858', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je prépare un Deug de Musicologie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +1', 16, 'both'),
(11, 'Mme', '1986-01-08', '10-etudiant.jpg', '16930304-2825', '43 Rue de Sèvres', 75006, 'Paris', '0138204241', 1, 'Je suis disponible le mecredi de 15h00 à 18h00.', 'Je prépare une licence de Langues étrangères. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +2', 22, 'webcam'),
(12, 'Mme', '1992-02-25', '11-etudiant.jpg', '16631003-5800', '15 Rue des Bernardins', 75005, 'Paris', '0140294679', 1, 'Je suis disponible le jeudi de 19h00 à 20h00.', 'Je prépare une maîtrise d''Anglais à l''Université de la Sorbonne. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 18, 'faceface'),
(13, 'Mme', '1989-08-10', '12-etudiant.jpg', '16780809-0323', '9 Rue de la Santé', 75013, 'Paris', '0182554146', 1, 'Je suis disponible le mecredi de 08h00 à 12h00.', 'Je prépare une maîtrise d''Anglais à l''Université de la Sorbonne. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 30, 'webcam'),
(14, 'M.', '1990-06-10', '13-etudiant.jpg', '16190218-1310', '167 Rue Lecocq', 33000, 'Bordeaux', '0555529971', 0, 'Je suis disponible le mercredi de 11h00 à 12h00.', 'Je prépare une maîtrise de Droit. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 21, 'faceface'),
(15, 'M.', '1986-05-30', '14-etudiant.jpg', '16251106-1299', '105 Cours d''Albret', 33000, 'Bordeaux', '0579618648', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je prépare un master en Sciences Politiques. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +4', 27, 'webcam'),
(16, 'M.', '1988-06-23', '15-etudiant.jpg', '16350407-5627', '43 Rue Servandoni', 31000, 'Toulouse', '0526271880', 1, 'Je suis disponible le jeudi de 19h00 à 20h00.', 'Je prépare un master en Chimie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +5 (ou +)', 24, 'faceface'),
(17, 'Mme', '1987-10-26', '16-etudiant.jpg', '16450410-1736', '6 Rue Cassini', 75014, 'Paris', '0175706242', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je prépare une licence d''Economie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +2', 24, 'faceface'),
(18, 'M.', '1997-11-15', '17-etudiant.jpg', '16930316-7903', '95 Rue Charras', 13007, 'Marseille', '0474512351', 1, 'Je suis disponible le jeudi de 19h00 à 20h00.', 'Je fais des études de Médecine. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +5 (ou +)', 22, 'faceface'),
(19, 'M.', '1991-02-04', '18-etudiant.jpg', '16940317-6861', '3 Rue Peyronnet', 13007, 'Marseille', '0449499547', 1, 'Je suis disponible le jeudi de 17h00 à 19h00.', 'Je prépare une maîtrise en Etudes Littéraires. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 27, 'faceface'),
(20, 'M.', '1990-01-17', '19-etudiant.jpg', '16150925-0492', '47 Rue du Pech', 31100, 'Toulouse', '0587731583', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je prépare une maîtrise de Psychologie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 19, 'faceface'),
(21, 'M.', '1994-01-21', '20-etudiant.jpg', '16130123-5790', '20 Rue Saint-Philippe', 69003, 'Lyon', '0437453076', 1, 'Je suis disponible le vendredi de 17h00 à 19h00.', 'Je prépare un master en Informatique. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +5 (ou +)', 30, 'faceface'),
(22, 'Mme', '1987-07-17', '21-etudiant.jpg', '16270127-1419', '3 Rue Perrinet Pey', 13007, 'Marseille', '0415965323', 0, 'Je suis disponible le vendredi de 17h00 à 19h00.', 'Je prépare un Deug de Mathématiques. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +1', 18, 'faceface'),
(23, 'Mme', '1995-10-15', '22-etudiant.jpg', '16781021-1701', '31 Rue Sénac de Meilhan', 13001, 'Marseille', '0476265230', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je prépare un master en Droit. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +5 (ou +)', 22, 'webcam'),
(24, 'Mme', '1993-11-27', '23-etudiant.jpg', '16290901-1922', '75 Rue de Campeyraut', 33000, 'Bordeaux', '0563265451', 1, 'Je suis disponible le vendredi de 17h00 à 19h00.', 'Je prépare une licence d''Economie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +2', 20, 'faceface'),
(25, 'Mme', '1994-09-20', '24-etudiant.jpg', '16451028-9541', '9 Avenue Alain Gerbault', 31100, 'Toulouse', '0555651112', 1, 'Je suis disponible le vendredi de 18h00 à 20h00.', 'Je prépare un Deug de Langues étrangères. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +1', 15, 'webcam'),
(26, 'Mme', '1995-05-26', '25-etudiant.jpg', '16520701-4100', '7 Rue Buffon', 31100, 'Toulouse', '0541437666', 1, 'Je suis disponible le jeudi de 19h00 à 20h00.', 'Je prépare une licence de Mathématiques. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +2', 24, 'both'),
(27, 'Mme', '1991-01-07', '26-etudiant.jpg', '16050630-8469', '18 Rue Pierre Bénech', 31100, 'Toulouse', '0527499861', 0, 'Je suis disponible le lundi de 19h00 à 21h00.', 'Je prépare un master en Chimie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +4', 29, 'faceface'),
(28, 'Mme', '1987-03-28', '27-etudiant.jpg', '16020802-3184', '17 Rue du Dr Crestin', 69007, 'Lyon', '0452923677', 1, 'Je suis disponible le vendredi de 17h00 à 19h00.', 'Je prépare un master en Droit. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +5 (ou +)', 27, 'faceface'),
(29, 'Mme', '1994-07-19', '28-etudiant.jpg', '16500509-7273', '67 Rue Domer', 69007, 'Lyon', '0486453764', 1, 'Je suis disponible le jeudi de 19h00 à 20h00.', 'Je prépare un Deug de Langues étrangères. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +1', 15, 'faceface'),
(30, 'Mme', '1997-10-14', '29-etudiant.jpg', '16920906-1176', '7 Rue Saint-Maximin', 69003, 'Lyon', '0485203671', 1, 'Je suis disponible le mardi de 18h00 à 20h00.', 'Je prépare une maîtrise de Biochimie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +3', 18, 'webcam'),
(31, 'Mme', '1991-06-12', '30-etudiant.jpg', '16171009-0786', '2 Rue des Lilas', 69008, 'Lyon', '0461435445', 1, 'Je suis disponible le samedi de 14h00 à 16h00.', 'Je prépare un master en Histoire-Géographie. J''aime enseigner aux enfants et je suis très pédagogue.', 'Bac +4', 26, 'faceface');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_m` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id_m`, `nom`) VALUES
(1, 'Allemand'),
(2, 'Anglais'),
(3, 'Arabe'),
(4, 'Basse'),
(5, 'Batterie'),
(6, 'Biologie'),
(7, 'Chant'),
(8, 'Chimie'),
(9, 'Chinois'),
(10, 'Comptabilité'),
(11, 'Dessin'),
(12, 'Droit'),
(13, 'Economie'),
(14, 'Espagnol'),
(15, 'Finance'),
(16, 'Français'),
(17, 'Géographie'),
(18, 'Gestion'),
(19, 'Grec ancien'),
(20, 'Guitare'),
(21, 'Histoire'),
(22, 'Histoire de l''art'),
(23, 'Informatique et sciences du numérique'),
(24, 'Internet'),
(25, 'Italien'),
(26, 'Latin'),
(27, 'Lettres modernes'),
(28, 'Marketing'),
(29, 'Mathématiques'),
(30, 'Peinture'),
(31, 'Philosophie'),
(32, 'Photographie'),
(33, 'Physique'),
(34, 'Piano'),
(35, 'Programmation'),
(36, 'Russe'),
(37, 'Saxophone'),
(38, 'Sciences de la vie et de la Terre (SVT)'),
(39, 'Sciences de l''ingénieur'),
(40, 'Sciences et laboratoire'),
(41, 'Solfège'),
(42, 'Statistiques'),
(43, 'Théâtre'),
(44, 'Violon');

-- --------------------------------------------------------

--
-- Structure de la table `particulier`
--

DROP TABLE IF EXISTS `particulier`;
CREATE TABLE IF NOT EXISTS `particulier` (
  `id_p` int(11) NOT NULL,
  `civilite` enum('M.','Mme') NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `particulier`
--

INSERT INTO `particulier` (`id_p`, `civilite`, `adresse`, `cp`, `ville`, `tel`) VALUES
(32, 'Mme', '12 Rue Jonquoy', 75014, 'Paris', '0154357788'),
(33, 'M.', '9 Rue Mathurins', 75009, 'Paris', '0165176880'),
(34, 'Mme', '7 Rue Mathis', 75019, 'Paris', '0146802552'),
(35, 'Mme', '33 Rue Hameau', 75015, 'Paris', '0165090992'),
(36, 'M.', '5 Rue Fourcade', 75015, 'Paris', '0100992767'),
(37, 'Mme', '43 Rue des Plantes', 75014, 'Paris', '0101628352'),
(38, 'Mme', '21 Rue Guinée', 13006, 'Marseille', '0417391350'),
(39, 'Mme', '41 Rue Solférino', 33000, 'Bordeaux', '0508230631'),
(40, 'M.', '12 Rue Bayard', 31000, 'Toulouse', '0589108967'),
(41, 'Mme', '64 Rue Domer', 69007, 'Lyon', '0440060039');

-- --------------------------------------------------------

--
-- Structure de la table `scolarite`
--

DROP TABLE IF EXISTS `scolarite`;
CREATE TABLE IF NOT EXISTS `scolarite` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `scolarite`
--

INSERT INTO `scolarite` (`id_s`, `nom`) VALUES
(1, 'CP'),
(2, 'CE1'),
(3, 'CE2'),
(4, 'CM1'),
(5, 'CM2'),
(6, '6e'),
(7, '5e'),
(8, '4e'),
(9, '3e'),
(10, '2de'),
(11, '1re'),
(12, 'Terminale');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `statut` enum('actif','inactif','banni') NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_u`, `nom`, `prenom`, `email`, `mdp`, `date_inscription`, `statut`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-01 01:30:36', 'actif'),
(2, 'Lacroix', 'Benoît', 'benoit.lacroix@outlook.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-09 13:54:39', 'actif'),
(3, 'Bisaillon', 'Paul', 'paul.bisaillon@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-08-09 12:06:10', 'actif'),
(4, 'Querry', 'Jean', 'jean.querry@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-03-19 02:23:53', 'actif'),
(5, 'Chaloux', 'Claire', 'claire.chaloux@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-13 20:20:15', 'actif'),
(6, 'Dupont', 'Louis', 'louis.dupont@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-29 23:00:14', 'actif'),
(7, 'Tessier', 'Patricia', 'patricia.tessier@free.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-02-08 22:26:52', 'actif'),
(8, 'Devost', 'Yves', 'yves.devost@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-01 19:18:47', 'actif'),
(9, 'Pinneau', 'Pierre', 'pierre.pinneau@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-01 19:18:48', 'actif'),
(10, 'Theriault', 'Serge', 'serge.theriault@outlook.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-02-17 02:33:50', 'actif'),
(11, 'Brisay', 'Sylvie', 'sylvie.brisay@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-02-13 04:03:08', 'actif'),
(12, 'Martin', 'Sophie', 'martine.martin@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-08-26 23:24:56', 'actif'),
(13, 'Turgeon', 'Odile', 'odile.turgeon@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-03-26 20:16:38', 'actif'),
(14, 'Marseau', 'Justin', 'justin.marseau@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-02-11 18:54:48', 'actif'),
(15, 'Piedalue', 'Marc', 'marc.piedalue@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-07-18 18:51:44', 'actif'),
(16, 'Bourgeois', 'Luc', 'luc.bourgeois@orange.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-05 03:36:24', 'actif'),
(17, 'Laforest', 'Pascale', 'pascale.laforest@orange.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-04-05 09:22:36', 'actif'),
(18, 'Parizeau', 'Amaury', 'amaury.parizeau@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-04-05 19:52:48', 'actif'),
(19, 'Camus', 'Baptiste', 'baptiste.camus@outlook.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-04-17 09:17:05', 'actif'),
(20, 'Pomerleau', 'Eric', 'eric.pomerleau@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-07 15:28:32', 'actif'),
(21, 'Marchesseault', 'Arnaud', 'arnaud.marchesseault@orange.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-07-13 13:57:08', 'actif'),
(22, 'Duchemin', 'Isabelle', 'isabelle.duchemin@free.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-20 03:48:04', 'actif'),
(23, 'Bilodeau', 'Maria', 'maria.bilodeau@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-03-18 08:13:22', 'actif'),
(24, 'Desforges', 'Sandra', 'sandra.desforges@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-14 08:03:53', 'actif'),
(25, 'Pinneau', 'Katia', 'katia.pinneau@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-04-15 06:00:25', 'actif'),
(26, 'Aucoin', 'Laurence', 'laurence.aucoin@orange.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-04-29 04:02:45', 'actif'),
(27, 'Desroches', 'Nathalie', 'nathalie.desroches@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-03-18 23:15:50', 'actif'),
(28, 'Barjavel', 'Emilie', 'emilie.barjavel@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-04-09 10:46:26', 'actif'),
(29, 'Duhamel', 'Camille', 'camille.duhamel@free.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-02-26 09:57:27', 'actif'),
(30, 'Brochu', 'Estelle', 'estelle.brochu@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-02-03 09:08:52', 'actif'),
(31, 'Pinneau', 'Elodie', 'elodie.pinneau@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-04 18:57:03', 'actif'),
(32, 'Durand', 'Emilie', 'emilie.durand@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-03-10 17:34:18', 'actif'),
(33, 'Beauchesne', 'Patrick', 'patrick.beauchesne@yahoo.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-21 03:54:40', 'actif'),
(34, 'Dupont', 'Agathe', 'agathe.dupont@free.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-08-10 06:56:17', 'actif'),
(35, 'Leroux', 'Mathieu', 'mathieu.leroux@outlook.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-06-18 15:30:24', 'actif'),
(36, 'Martin', 'Rémi', 'remi.martin@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-06-12 01:28:34', 'actif'),
(37, 'Chouinard', 'Justine', 'justine.chouinard@sfr.fr', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-12 09:43:21', 'actif'),
(38, 'Parizeau', 'Lola', 'lola.parizeau@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-07-27 02:11:44', 'actif'),
(39, 'Asselin', 'Catherine', 'catherine.asselin@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-05-24 19:03:40', 'actif'),
(40, 'Bouchard', 'Nathan', 'nathan.bouchard@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-01-22 18:43:29', 'actif'),
(41, 'Vaillancour', 'Elsa', 'elsa.vaillancour@gmail.com', '$2y$10$rfi71w1lKxLfsyjUM2aegeTtV51OZo1.Nwmh6.7GAOB3yl79q4kYi', '2016-06-09 22:25:54', 'actif');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `user` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `particulier` (`id_p`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_et`) REFERENCES `etudiant` (`id_et`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `connaissance`
--
ALTER TABLE `connaissance`
  ADD CONSTRAINT `connaissance_ibfk_1` FOREIGN KEY (`id_et`) REFERENCES `etudiant` (`id_et`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `connaissance_ibfk_2` FOREIGN KEY (`id_m`) REFERENCES `matiere` (`id_m`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `connaissance_ibfk_3` FOREIGN KEY (`id_s_min`) REFERENCES `scolarite` (`id_s`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `connaissance_ibfk_4` FOREIGN KEY (`id_s_max`) REFERENCES `scolarite` (`id_s`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `particulier` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enfant_ibfk_2` FOREIGN KEY (`id_s`) REFERENCES `scolarite` (`id_s`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_et`) REFERENCES `user` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `particulier`
--
ALTER TABLE `particulier`
  ADD CONSTRAINT `particulier_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `user` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
