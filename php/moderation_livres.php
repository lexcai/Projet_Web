<?php
include_once('bdd.php');
session_start();
  $query1 = $pdo->prepare('SELECT * FROM livres');
  $query1->execute();
  $liste = $query1->fetchAll(); 
?>

<!DOCTYPE html>
<html>
<body>
 <h1>Liste des livres</h1>
 <table>
   <thead>
     <tr>
       <th>Titre</th>
       <th>Auteur</th>
     </tr>
   </thead>
   <input type="button" name="home" value="Retour" onclick="self.location.href='./home.php'">
   <br>
   <h2>Suppresion livres :</h2>
   <form action="suppresion_livre.php" method="post">
            <input type="text" name="titre" placeholder="Nom du livre"/>
            <button type="submit" name="supp_l">Supprimer un livre</button>
        </form>
    <br>
    <h2>Modification livre :</h2>
            <form action="form_modif_livre.php" method="post">
            <input type="text" name="titre" placeholder="Nom du livre"/>
            <button type="submit" name="modif_l">Modifier un livre</button>
            </form>
    <br>
    <br>
   <tbody>
     
      <tr>
          <?php foreach ($liste as $donnees) { ?>
       <td><?php echo $donnees['titre']; ?></td>
       <td><?php echo $donnees['auteur']; ?></td> <br>
       </tr>
    <?php
    }
    ?>
    
   </tbody>
 </table>
</body>

</html>