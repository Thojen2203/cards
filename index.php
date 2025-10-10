<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'php/head.php'; ?>
    <title>Connexion</title>
</head>
<body>
    <?php require_once 'php/header.php'; ?>
    <?php require_once 'php/navbar.php'; ?>
    <?php 
    session_start();
    if(!isset($_SESSION['userid']))
        header("Location: login.php");
    else
        echo "<h1 class='text-center my-4'>Bienvenue, " . htmlspecialchars($_SESSION['username']) . " !</h1>";

    require_once 'php/database.php';
    global $db;

    $q = $db -> prepare("select * from user_cards
    right join cards on user_cards.card_id = cards.card_id
    and user_id = :user_id
    left join rarity on cards.card_rarity = rarity.rarity_id");
    $q -> execute([
        "user_id" => $_SESSION['userid']
    ]);
    $res = $q -> fetchAll();
    ?>

    <div class="container text-center">
        <div class="row row-cols-2">

    <?php
    require_once 'php/cards/cardInIndex.php';
    foreach($res as $card){
        displayCard($card, $card['user_id'] !== null, $card['rarity_name']);
    }
    ?>

        </div>
    </div>

    <?php require_once 'php/footer.php'; ?>
</body>
</html>