<?php
include_once('bdd.php');
session_start();
  $query1 = $pdo->prepare('SELECT * FROM livres');
  $query1->execute();
  $liste = $query1->fetchAll(); 
?>


<!DOCTYPE html>
<html>
<head>
    <title>Ajout de livre</title>
    <meta name="description" content="Formulaire modification livre"/>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>
</head>
<body>
    <h1>Formulaire Ajout de Livre</h1>
    <button onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/home.php';">Retour</button>
        <form action="ajout_livres.php" method="post">
            <input type="text" name="titre" placeholder="Titre"  /> <br/>
            <input type="text" name="auteur" placeholder="Auteur" /> <br/>
            <input type="text" name="genre" placeholder="Genre" /> <br/>
            <input type="editeur" name="editeur" placeholder="Editeur" /> <br/>
            <input type="text" name="resume" placeholder="Resume"  /> <br/>
            <input type="" name="date_parrution" placeholder="Date de parrution"  /> <br/>
            <input type="text" name="note" placeholder="Note" /> <br/>
            <button type="submit">Modifier</button>
        </form>
        <input type="text" placeholder="Titre d'un livre" id="terms" />
        <button onClick="search()">Rechercher</button>
        <ul id="results">
        </ul>
    <br>
    <br>
   <tbody>
   <table>
   <thead>
     <tr>
       <th>Titre</th>
       <th>Auteur</th>
       <th>Genre</th>
     </tr>
   </thead>
      <tr>
          <?php foreach ($liste as $donnees) { ?>
       <td><?php echo $donnees['titre']; ?></td>
       <td><?php echo $donnees['auteur']; ?></td>
       <td><?php echo $donnees['genre']; ?></td> <br>
       </tr>
    <?php
    }
    ?>
    </tbody>
 </table>
</body>
</html>