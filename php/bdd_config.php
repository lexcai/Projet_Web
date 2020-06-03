<?php 
 include_once('bdd.php');

    $query1 = $pdo->prepare('CREATE TABLE IF NOT EXISTS bookclub.root (
        id_root int not null auto_increment,
        pseudo_root varchar(255) not null,
        role varchar(255) not null,
        mail_root varchar(255) not null,
        mdp_root varchar(255) not null,
        pays varchar(255) not null,
        sex varchar(255) not null,
        age int not null,
        date_creation DATE not null,
        photo varchar(255) null,
        bio text null,
        PRIMARY KEY (id_root));');
    $query1->execute();

    $query2 = $pdo->prepare('CREATE TABLE IF NOT EXISTS bookclub.membres (
        id_membre int not null auto_increment,
        pseudo_membre varchar(255) not null,
        role varchar(255) not null,
        mail_membre varchar(255) not null,
        mdp_membre varchar(255) not null,
        pays varchar(255) not null,
        sex varchar(255) not null,
        age int not null,
        date_creation DATE not null,
        photo varchar(255) null,
        bio text null,
        PRIMARY KEY (id_membre));');
    $query2->execute();

    $query3 = $pdo->prepare('CREATE TABLE IF NOT EXISTS bookclub.livres (
        id_livre int not null auto_increment,
        photo varchar(255) not null,
        titre varchar(255) not null,
        auteur varchar(255) not null,
        genre varchar(255) not null,
        editeur varchar(255) not null,
        resume text not null,
        date_parrution DATE not null,
        note int null,
        PRIMARY KEY (id_livre));');
    $query3->execute();

    $query4 = $pdo->prepare('CREATE TABLE IF NOT EXISTS bookclub.bib_perso (
        id_bib int not null auto_increment,
        id_livre int not null,
        id_membre int not null,
        status_livre varchar(255) not null,
        note int null,
        PRIMARY KEY (id_bib),
        FOREIGN KEY (id_livre) 
        REFERENCES membres(id_membre),
        FOREIGN KEY (id_membre) 
        REFERENCES livres(id_livre));');
    $query4->execute();

    $query5 = $pdo->prepare('CREATE TABLE IF NOT EXISTS bookclub.billet (
        id_com int not null auto_increment,
        titre_com varchar(255) not null,
        contenu varchar(255) not null,
        date_creation DATE not null,
        pseudo_membre varchar(255) not null,
        PRIMARY KEY (id_com));');
    $query5->execute();