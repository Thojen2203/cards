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
    and user_id = :user_id");
    $q -> execute([
        "user_id" => $_SESSION['userid']
    ]);
    $res = $q -> fetchAll();
    foreach($res as $card){
        var_dump($card);
        echo "<div class='card m-3' style='width: 18rem; display:inline-block;'>
            <img src='" . htmlspecialchars($card['card_image_link']) . "' class='card-img-top' alt='" . htmlspecialchars($card['card_name']) . "'>
            <div class='card-body'>
                <h5 class='card-title'>" . htmlspecialchars($card['card_name']) . "</h5>
                <p class='card-text'>" . htmlspecialchars($card['card_description']) . "</p>
            </div>
        </div>";
    }
    
    ?>
    <?php require_once 'php/footer.php'; ?>
</body>
</html>