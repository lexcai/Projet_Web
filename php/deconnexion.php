<?php
    session_start();

    if (isset($_SESSION['IS_CONNECTED'])) {
        session_destroy();
    }
    header('Location: http://localhost:8080/TP/Projet_Web/html/index.html');
    exit();
?>

