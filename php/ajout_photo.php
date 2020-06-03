<?php
include_once('bdd.php');
session_start();

$uploaddir = "/".$_SESSION['pseudo']."/";
if (isset($_FILES['file']))
{
    $folder = ($_SESSION['pseudo']);
    
    if (!file_exists($folder)) 
    {
        mkdir($folder);
    }

    $infofichier = pathinfo($_FILES['file']['name']);
    $extension = $infofichier['extension'];
    $name = basename($_FILES['file']['name']);
    $filename = $_SESSION['pseudo'].'.'.$extension;
    $filename = str_replace(' ', '_', $filename);
    $filepath = $folder.'/'.$filename;

    if (! file_exists($folder . '/' . $filename)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "$folder/$filename");
        $query1 = $pdo->prepare("UPDATE membres SET photo = :photo WHERE pseudo_membre='" . $_SESSION['pseudo'] . "'");
        $query1->bindParam(':photo', $filepath);
        $query1->execute();
        $_SESSION['fichier'] = TRUE;
       
        header('Location: http://localhost:8080/TP/Projet_WEB/php/profil.php');
        exit;
    } else {
    header('Location: http://localhost:8080/TP/Projet_WEB/php/profil.php');
    exit;
    }
}