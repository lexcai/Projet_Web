PROJET: Bibliothèque de livres en ligne
Equipe de choc:
 - BOUDEAU Axel
 - BOILEAU Marius 
 - MEGY Ilyana

  

Le but de ce site est de permettre à un utilisateur de répertorier des livres qu'il lit, a lu ou prévoit de lire dans une bibliothèque en ligne.
Il pourra rechercher sur notre site un livre en tapant son titre, son auteur ou son genre et l'ajouter dans sa bibliothèque.

L'utilisateur a la possibilité de noter et d'ajouter un commentaire pertinant à l’œuvre et en faire profiter à la communauté du site.
En fonction des livres enregistrés dans la bibliothèque de l'utilisateur, un algorithme pourra lui suggérer des livres qui lui correspondent, se basant sur le genre prisé par le lecteur ou par les autres œuvres d'un auteur apprécié. 

L'utilisateur peut également contribuer au développement de la bibliothèque du site internet en nous proposant des œuvres non répertoriées en nous envoyant un message que nous traiterons. Après un certain nombre de contributions, l'utilisateur pourra obtenir un rang d'administrateur (Super-Membre).De même pour les commentaires pertinants sur les œuvres.

  
Le site se composerait de 7 pages: 
(enfaite on est à 14 pages haha.. )
(update... 21 T^T)


 1. page d'entrée (index.html)
 2. page connexion 
 3.page mot de passe oubli
 4. page inscription

***********************************************

 5. une page d’accueil, avec :
 
    (entête)
 - logo à gauche qui renvoie vers la page d'accueil
 - la possibilité de se connecter/s'inscrire si ce n'est pas fait ou d’accéder à son profil,
 - un bouton pour accéder à la page 'communauté'
 - un bouton pour accéder à la page 'A propos' 
 - un bouton pour accéder au formulaire de recherche de livre
 - bouton pour accéder à la page d’accueil
 - un bouton pour accéder à la page 'messages' 
 
 ...

 - sélection d’œuvres à la mode ce mois-ci (renvoie vers page recherche œuvres ajoutées ce mois-ci et œuvres les mieux notées) (6) 
 - sélection d’œuvres suggérées par notre algorithme (lorsque utilisateur connecté) mix aléatoire genres, auteurs, éditions préférés (6)
 - sélection d’œuvres récemment ajoutées sur le site (avec nom du
   contributeur et date d'ajout) (6)
 - sélection d’œuvres les plus populaires (notation collective toutes œuvres confondues) (6)

    (footer)
 - pied de page avec contact, logo, lien vers page

***********************************************
6. page profil

- entête
- information utilisateur (pseudo, photo, date création, rôle)
- biographie
- statistiques livres lus, livres que je lis, livres que je prévois de lire 
(barre pourcentage en fonction de la quantité totale de livres dans la bibliothèque)
- derniers ajouts
-liens "voir plus" pour accéder aux pages livres lus, livres en cours de lecture et livres à lire.
- footer

***********************************************
7. page livres lus (inachevée)

- entête
- liste livres avec titre et auteur (liens vers page du livre)
- notation personnelle
- supprimer le livre de la sélection
- footer

***********************************************
8. livres en cours de lecture (inachevée)

 - entête
- liste livres avec titre auteur (liens vers page du livre)
- notation personnelle
- supprimer le livre de la sélection
- footer

***********************************************

9. livres à lire (inachevée)

- entête
- liste livres avec titre auteur (liens vers page du livre)
- notation personnelle
- supprimer le livre de la sélection
- footer

***********************************************

10. bibliothèque personnelle (inachevée)

- entête
- liste livres avec titre auteur (liens vers page du livre)
- supprimer le livre de la sélection
- footer

***********************************************

11. page livre

- entête
- titre auteur date publication résumé notation
-lien vers page modération livre
- footer

***********************************************

12. modération livres //admin//

- suppression livre (indiquer titre)
- modifier données d'un livre (lien vers page modification livre)

***********************************************

13. modification livre

- formulaire modification livre (titre auteur genre editeur date parution note résumé)
- bouton valider

***********************************************

14. page communauté:

- entête
- lecteurs aléatoire (6) (liens vers utilisateur)
- permet de chercher un utilisateur avec pseudo(barre de recherche)
- rechercher avec un filtre pays, age, genre...
- bouton pour accéder à la page d'un lecteur
- footer

***********************************************

15. profil lecteur

- entête
- pseudo, image 
- envoyer mp bouton
- stats
- footer
  
***********************************************
16. modération utilisateur //admin//

- suppression du compte d'un utilsateur (renseigner pseudo)
- modification rôle d'un utilisateur (lien vers page de modification de rôle)

***********************************************

17. modification rôle utlisateur

- choix rôle
- bouton valider

***********************************************

18. formulaire recherche livre

- formulaire (titre auteur genre editeur notation)
- bouton qui renvoie vers page résultats de recherche

***********************************************

19. page résultats de recherches:
 
- entête
- si aucun résultat: div conseils pour nouvelle recherche + bouton qui renvoie vers formulaire ajout livre
- si résultats: affichage livres avec photo titre auteur --> lien vers page livre (voir 11.)
- footer 

***********************************************

20. page A propos (inachevée)

- entête
- présentation de notre site internet, objectifs, 
- structure site
- contact
- footer

***********************************************

21. messages (inachevée)

- entête
- même forme qu'un forum (rafraichir la page pour actualiser)
- liens vers discussion
- footer



Ressources:

- Langages: Php MySQL HTML CSS(+Bootstrap) JS
- Logiciels/Services: Phpmyadmin, XAMPP, Virtual Studio Code, Google..., Trello, Github, Adobe XD, Discord, Teams
- Matériels: Ordinateur
- Personnels: BOUDEAU Axel (Php MySQL), BOILEAU Marius (Php JS), MEGY Ilyana (HTML CSS JS framework)

Liens utiles:

https://github.com/lexcai/Projet_Web
https://trello.com/b/rb2t8qWA
https://xd.adobe.com/view/b0d639be-e83c-4a2e-6b92-2a74b32aadef-c6e7/