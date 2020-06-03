<?php
include_once('bdd.php');
      /* Cree le membre dans la bdd*/
      

    if(empty($_POST['pseudo']) OR empty($_POST['mail']) OR empty($_POST['mdp']) OR empty($_POST['pays']) OR empty($_POST['age'])) {
        echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"../html/index.html\">Réesayer</a>";
    } else {
        if(isset($_POST['inscription_membre'])) {
            $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $pays = htmlspecialchars($_POST['pays']);
            $sexe = htmlspecialchars($_POST['sex']);
            $age = htmlspecialchars($_POST['age']);
            $role = "Membre";
            $pseudo = $_SESSION['pseudo'];
            $date_creation = DATE("Y-m-d");

        $requete = "INSERT INTO bookclub.membres (pseudo_membre, mail_membre, mdp_membre, pays, sex, age, role, date_creation) VALUES (:pseudo, :mail, :mdp, :pays, :sexe, :age, :role, :date_creation)";
            $query1 = $pdo->prepare($requete);
            $query1->bindParam(":pseudo", $pseudo);
            $query1->bindParam(":mail", $mail);
            $query1->bindParam(":mdp", $mdp);
            $query1->bindParam(":pays", $pays);
            $query1->bindParam(":sexe", $sexe);
            $query1->bindParam(":age", $age, PDO::PARAM_INT);
            $query1->bindParam(":role", $role);
            $query1->bindParam(":date_creation", $date_creation);
            $query1->execute();
            header('Location: http://localhost:8080/TP/Projet_Web/html/index.html');
            exit;

    }
}
?>