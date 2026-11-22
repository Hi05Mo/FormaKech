# formaKech – Application de gestion d’un centre de formation

## 1. Présentation du projet

**formaKech** est une application web de gestion d'un centre de formation, développée dans le cadre d'un travail pratique.

Cette application a pour objectif de faciliter la gestion des formations, des étudiants et des modules au sein d'un établissement de formation.

Elle permet de centraliser les informations et d'effectuer les principales opérations de gestion à travers une interface simple, claire et facile à utiliser.

## 2. Problématique

La gestion manuelle des informations relatives aux formations, aux étudiants et aux modules peut entraîner des difficultés dans l'organisation et le suivi des données.

Pour répondre à ce besoin, formaKech propose une solution informatique permettant de gérer ces différentes informations de manière structurée et organisée.

## 3. Objectifs du projet

Les principaux objectifs de cette application sont :

- Faciliter la gestion des formations.
- Assurer le suivi des étudiants inscrits.
- Organiser les modules associés aux formations.
- Centraliser les informations dans une base de données.
- Simplifier les opérations d'ajout, de consultation, de modification et de suppression.

## 4. Fonctionnalités principales

L'application propose trois espaces principaux :

### 4.1 Gestion des formations

Cet espace permet de :

- Ajouter une nouvelle formation.
- Consulter la liste des formations.
- Modifier les informations d'une formation.
- Supprimer une formation.

Chaque formation possède un libellé, un prix et une durée.

### 4.2 Gestion des étudiants

Cet espace permet de :

- Ajouter un étudiant.
- Consulter la liste des étudiants.
- Modifier les informations d'un étudiant.
- Supprimer un étudiant.
- Associer chaque étudiant à une formation.

Les informations d'un étudiant comprennent son numéro, son nom et son adresse e-mail.

### 4.3 Gestion des modules

Cet espace permet de :

- Ajouter un module.
- Consulter la liste des modules.
- Modifier les informations d'un module.
- Supprimer un module.
- Associer chaque module à une formation.

Chaque module possède un libellé, une durée et une formation associée.

## 5. Organisation et relations entre les données

L'application repose sur trois entités principales :

- **Formation :** représente les formations proposées par l'établissement.
- **Étudiant :** représente les personnes inscrites aux formations.
- **Module :** représente les modules pédagogiques associés aux formations.

Les relations entre ces entités sont les suivantes :

- Une formation peut être associée à plusieurs étudiants.
- Une formation peut contenir plusieurs modules.
- Chaque étudiant est associé à une formation.
- Chaque module appartient à une formation.

Ces relations permettent d'organiser les données et de maintenir leur cohérence dans la base de données.

## 6. Technologies utilisées

Les technologies utilisées pour le développement de l'application sont :

- **HTML5 :** structure des pages web.
- **CSS3 :** mise en forme des interfaces.
- **Bootstrap 5.3.8 :** conception d'une interface responsive et organisée.
- **PHP :** traitement des données et gestion de la logique de l'application.
- **MySQL :** stockage et organisation des données.
- **PDO :** connexion à la base de données et exécution des requêtes SQL.
- **XAMPP :** environnement de développement local.

## 7. Architecture du projet

Le projet est organisé selon la structure suivante :

```text
tp7-crud/
│
├── index.php
│
├── database/
│   └── connexion.php
│
├── formation/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── etudiant/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── module/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
└── README.md
```

### Description de l'organisation

- `index.php` : page d'accueil et tableau de bord de l'application.
- `database/connexion.php` : configuration de la connexion à la base de données.
- `formation/` : fichiers dédiés à la gestion des formations.
- `etudiant/` : fichiers dédiés à la gestion des étudiants.
- `module/` : fichiers dédiés à la gestion des modules.

Dans chaque espace :

- `index.php` : affichage de la liste des enregistrements.
- `create.php` : ajout d'un nouvel enregistrement.
- `edit.php` : modification d'un enregistrement existant.
- `delete.php` : suppression d'un enregistrement.
