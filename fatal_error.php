<?php
if(isset($_GET['type']) && isset($_GET['error'])) {
    $type = htmlspecialchars($_GET['type']);
    $error = htmlspecialchars($_GET['error']);

    echo "<h1>Erreur fatale</h1>";
    echo "<p>Type d'erreur : $type</p>";
    echo "<p>Détails de l'erreur : $error</p>";
} else {
    echo "<h1>Erreur fatale</h1>";
    echo "<p>Informations sur l'erreur non disponibles.</p>";
}
?>