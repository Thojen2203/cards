<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'php/head.php'; ?>
    <title>Document</title>
</head>
<body>
    <?php require_once 'php/header.php'; ?>
    <?php require_once 'php/navbar.php'; ?>
    <?php 
    session_start();
    if(isset($_SESSION['userid']))
    
    ?>
    <?php require_once 'php/footer.php'; ?>
</body>
</html>