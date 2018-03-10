-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 10 mars 2018 à 19:05
-- Version du serveur :  5.6.38
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `PulpaColada`
--
DROP DATABASE `PulpaColada`;

CREATE DATABASE `PulpaColada`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE `PulpaColada`;

-- --------------------------------------------------------

--
-- Structure de la table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `id`          INT(11)      NOT NULL,
  `email`       VARCHAR(100) NOT NULL,
  `utilisateur` VARCHAR(20)  NOT NULL,
  `mdp`         CHAR(128)             DEFAULT NULL,
  `prenom`      VARCHAR(20)  NOT NULL,
  `nom`         VARCHAR(50)  NOT NULL,
  `poste`       VARCHAR(30)  NOT NULL,
  `photo`       BLOB,
  `couverture`  BLOB,
  `bio`         TEXT,
  `lienFb`      VARCHAR(255)          DEFAULT NULL,
  `active`      TINYINT(1)   NOT NULL DEFAULT '0'
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `ADMIN`
--

INSERT INTO `ADMIN` (`id`, `email`, `utilisateur`, `mdp`, `prenom`, `nom`, `poste`, `photo`, `couverture`, `bio`, `lienFb`, `active`)
VALUES
  (45, 'rhaddad@ensc.fr', 'rhaddad', 'mdp', 'Rime', 'Haddad', 'Prez', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `AFFINITE`
--

CREATE TABLE `AFFINITE` (
  `joueur`      INT(11) NOT NULL,
  `joueurVoulu` INT(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `EQUIPE`
--

CREATE TABLE `EQUIPE` (
  `numero`   INT(11)   NOT NULL,
  `nom`      VARCHAR(30)    DEFAULT NULL,
  `heureFin` TIMESTAMP NULL DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `EVENEMENT`
--

CREATE TABLE `EVENEMENT` (
  `id`          INT(11)      NOT NULL,
  `nom`         VARCHAR(100) NOT NULL,
  `date`        DATE         NOT NULL,
  `debut`       TIME         NOT NULL,
  `fin`         TIME         DEFAULT NULL,
  `lieu`        VARCHAR(200) DEFAULT NULL,
  `description` TEXT         NOT NULL,
  `lienFb`      VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `JOUEUR`
--

CREATE TABLE `JOUEUR` (
  `id`          INT(11)      NOT NULL,
  `email`       VARCHAR(100) NOT NULL,
  `prenom`      VARCHAR(30)  NOT NULL,
  `nom`         VARCHAR(50)  NOT NULL,
  `surnom`      VARCHAR(20)  NOT NULL,
  `heureZombie` TIMESTAMP    NULL DEFAULT NULL,
  `heureMort`   TIMESTAMP    NULL DEFAULT NULL,
  `equipe`      INT(11)           DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `utilisateur` (`utilisateur`),
  ADD UNIQUE KEY `lienFb` (`lienFb`);

--
-- Index pour la table `AFFINITE`
--
ALTER TABLE `AFFINITE`
  ADD PRIMARY KEY (`joueur`, `joueurVoulu`),
  ADD KEY `joueur2` (`joueurVoulu`);

--
-- Index pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `EVENEMENT`
--
ALTER TABLE `EVENEMENT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `lienFb` (`lienFb`);

--
-- Index pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `surnom` (`surnom`),
  ADD UNIQUE KEY `prenom` (`prenom`, `nom`),
  ADD KEY `equipe` (`equipe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 50;

--
-- AUTO_INCREMENT pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  MODIFY `numero` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `EVENEMENT`
--
ALTER TABLE `EVENEMENT`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `AFFINITE`
--
ALTER TABLE `AFFINITE`
  ADD CONSTRAINT `joueur1` FOREIGN KEY (`joueur`) REFERENCES `JOUEUR` (`id`),
  ADD CONSTRAINT `joueur2` FOREIGN KEY (`joueurVoulu`) REFERENCES `JOUEUR` (`id`);

--
-- Contraintes pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD CONSTRAINT `equipe` FOREIGN KEY (`equipe`) REFERENCES `EQUIPE` (`numero`);
