<?php
include_once('bdd.php');
session_start();
  $query1 = $pdo->prepare('SELECT * FROM membres');
  $query1->execute();
  $liste = $query1->fetchAll(); 
?>

<!DOCTYPE html>
<html>
<body>
 <h1>Liste des membres</h1>
 <table>
   <thead>
     <tr>
       <th>Pseudo</th>
       <th>Rôle</th>
     </tr>
   </thead>
   <input type="button" name="home" value="Retour" onclick="self.location.href='./home.php'">
   <br>
   <h2>Suppresion membre :</h2>
   <form action="suppresion_membre.php" method="post">
            <input type="text" name="pseudo_membre" placeholder="Pseudo du membre"/>
            <button type="submit" name="supp_m">Supprimer un membre</button>
        </form>
    <br>
    <h2>Modification rôle membre :</h2>
            <form action="form_modif_membre.php" method="post">
            <input type="text" name="pseudo" placeholder="Pseudo du membre"/>
            <button type="submit" name="modif_m">Modifier un rôle</button>
            </form>
    <br>
    <br>
   <tbody>
     
      <tr>
          <?php foreach ($liste as $donnees) { ?>
       <td><?php echo $donnees['pseudo_membre']; ?></td>
       <td><?php echo $donnees['role']; ?></td>
       </tr>
    <?php
    }
    ?>
    
   </tbody>
 </table>
</body>

</html>