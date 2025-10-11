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

    date_default_timezone_set('Europe/Paris');

    session_start();

    if(!isset($_SESSION['userid']))
        header("Location: login.php");

    else
        echo "<h1 class='text-center my-4'>Ouverture de pack</h1>";

    function giveCardToUser($user_id, $card_id, $rarity_id){
        try{
            require_once 'php/database.php';
            global $db;
            $hasCard = $db -> prepare("select * from user_cards where user_id = :user_id and card_id = :card_id");
            $hasCard -> execute([
                "user_id" => $user_id,
                "card_id" => $card_id
            ]);
            if($hasCard -> rowCount() > 0){
                $coinsToAdd = 0;
                if($rarity_id == 1) $coinsToAdd = 1;
                else if($rarity_id == 2) $coinsToAdd = 2;
                else if($rarity_id == 3) $coinsToAdd = 5;
                else if($rarity_id == 4) $coinsToAdd = 10;
                else if($rarity_id == 5) $coinsToAdd = 50;
                else if($rarity_id == 6) $coinsToAdd = 150;

                $updateCardAmount = $db -> prepare("update user set user_coins = user_coins + :amount where user_id = :user_id");
                $updateCardAmount -> execute([
                    "amount" => $coinsToAdd,
                    "user_id" => $user_id,
                ]);

                // echo "Doublon : $coinsToAdd pièces ajoutées !";
            }
            else{
                $insert = $db -> prepare("insert into user_cards (user_id, card_id, quantity) values (:user_id, :card_id, :quantity)");
                $insert -> execute([
                    "user_id" => $user_id,
                    "card_id" => $card_id,
                    "quantity" => 1
                ]);
            }   
        }catch(Exception $e){
            echo 'Une erreur est survenue. Merci de réessayer plus tard.', $e->getMessage();
        }
    }


    require_once 'php/database.php';
    global $db;

    $q = $db -> prepare("select user_coins, user_diamonds from user where user_id = :user_id");
    $q -> execute(["user_id" => $_SESSION['userid']]);
    $res = $q -> fetch();

    if(isset($_GET['pack_id'])){
        $packId = $_GET['pack_id'];
        $p = $db -> prepare("select pack_price, price_currency from purchasablepacks join packs using(pack_id) where purchasablepacks.pack_id = :pack_id");
        $p -> execute(["pack_id" => $packId]);
        $packPrice = $p -> fetch();
        if($packPrice['price_currency'] == 'coins'){
            if($res['user_coins'] < $packPrice['pack_price']){
                header("Location: shop.php?error=not_enough_coins");
                die();
            }
            $u = $db -> prepare("update user set user_coins = user_coins - :price where user_id = :user_id");
            $u -> execute([
                "price" => $packPrice['pack_price'],
                "user_id" => $_SESSION['userid']
            ]);
        }
        else if($packPrice['price_currency'] == 'diamonds'){
            if($res['user_diamonds'] < $packPrice['pack_price']){
                header("Location: shop.php?error=not_enough_diamonds");
                die();
            }
            $u = $db -> prepare("update user set user_diamonds = user_diamonds - :price where user_id = :user_id");
            $u -> execute([
                "price" => $packPrice['pack_price'],
                "user_id" => $_SESSION['userid']
            ]);
            die();
        }
    } else {
        if(isset($_GET['gift'])){
            if($_GET['gift'] == '2h'){
                $v = $db -> prepare("select last_2h_gift from user where user_id = :user_id");
                $v -> execute(["user_id" => $_SESSION['userid']]);
                $lastUsed = $v -> fetch();
                if((time() - strtotime($lastUsed['last_2h_gift'])) < 7200){
                    header("Location: shop.php?error=too_soon");
                    die();
                }
                $packId = 1;
                $u = $db -> prepare("update user set last_2h_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
                $c = $db -> prepare("update user set user_coins = user_coins + 10 where user_id = :user_id");
                $c -> execute(["user_id" => $_SESSION['userid']]);
            }
            else if($_GET['gift'] == 'daily'){
                $v = $db -> prepare("select last_24h_gift from user where user_id = :user_id");
                $v -> execute(["user_id" => $_SESSION['userid']]);
                $lastUsed = $v -> fetch();
                if((time() - strtotime($lastUsed['last_24h_gift'])) < 86400){
                    header("Location: shop.php?error=too_soon");
                    die();
                }
                $packId = 2;
                $u = $db -> prepare("update user set last_24h_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
                $c = $db -> prepare("update user set user_coins = user_coins + 30 where user_id = :user_id");
                $c -> execute(["user_id" => $_SESSION['userid']]);
            }
            else if($_GET['gift'] == '3d'){
                $v = $db -> prepare("select last_3d_gift from user where user_id = :user_id");
                $v -> execute(["user_id" => $_SESSION['userid']]);
                $lastUsed = $v -> fetch();
                if((time() - strtotime($lastUsed['last_3d_gift'])) < 259200){
                    header("Location: shop.php?error=too_soon");
                    die();
                }
                $packId = 3;
                $u = $db -> prepare("update user set last_3d_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
                $c = $db -> prepare("update user set user_coins = user_coins + 50 where user_id = :user_id");
                $c -> execute(["user_id" => $_SESSION['userid']]);
            }
            else if($_GET['gift'] == '7d'){
                $v = $db -> prepare("select last_7d_gift from user where user_id = :user_id");
                $v -> execute(["user_id" => $_SESSION['userid']]);
                $lastUsed = $v -> fetch();
                if((time() - strtotime($lastUsed['last_7d_gift'])) < 604800){
                    var_dump(time() - strtotime($lastUsed['last_7d_gift']));
                    var_dump(strtotime($lastUsed['last_7d_gift']));
                    //header("Location: shop.php?error=too_soon");
                    die();
                }
                $packId = 4;
                $u = $db -> prepare("update user set last_7d_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
                $c = $db -> prepare("update user set user_coins = user_coins + 100 where user_id = :user_id");
                $c -> execute(["user_id" => $_SESSION['userid']]);
            }
            else{
                header("Location: shop.php");
                die();
            }
        }
    }

    $p = $db -> prepare("select * from purchasablepacks join packs using(pack_id) where purchasablepacks.pack_id = :pack_id");

    $q = $db -> prepare("SELECT * from card_rate_drop where pack_id = :packId order by drop_in_pack_number desc");
    $q -> execute(["packId" => $packId]);
    $res = $q -> fetchAll();

    require_once 'php/cards/cardInIndex.php';

    $rarity = 0;
    $card=null;
    foreach($res as $row){
        // echo $row['drop_in_pack_number'] . " "
        // . $row['common_drop_rate']
        // . " " . $row['uncommon_drop_rate']
        // . " " . $row['rare_drop_rate']
        // . " " . $row['epic_drop_rate']
        // . " " . $row['mythic_drop_rate']
        // . " " . $row['legendary_drop_rate']
        // . "<br>";
        $randomMax = 1000000;
        $random = rand(1,1000000);
        if($random <= $row['common_drop_rate']*$randomMax){ 
            // echo "Carte commune débloquée !";
            $c = $db -> prepare("select * from cards where card_rarity = 1 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 1);
            $rarity = 1;
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate'])*$randomMax){
            // echo "Carte peu commune débloquée !";
            $c = $db -> prepare("select * from cards where card_rarity = 2 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 2);
            $rarity = 2;
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate'])*$randomMax){
            // echo "Carte rare débloquée !";
            $c = $db -> prepare("select * from cards where card_rarity = 3 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 3);
            $rarity = 3;
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate']+$row['epic_drop_rate'])*$randomMax){
            // echo "Carte épique débloquée !";
            $c = $db -> prepare("select * from cards where card_rarity = 4 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 4);
            $rarity = 4;
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate']+$row['epic_drop_rate']+$row['mythic_drop_rate'])*$randomMax){
            // echo "Carte mythique débloquée !";
            $c = $db -> prepare("select * from cards where card_rarity = 5 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 5);
            $rarity = 5;
        }
        else{
            // echo "Carte légendaire débloquée !";
            $c = $db -> prepare("select * from cards where card_rarity = 6 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 6);
            $rarity = 6;
        }
        // echo "<br>";
        displayCardInPackOpening($card, $card['card_id'], $rarity, $row['pack_id']);
        // echo "<br>";
    }

    if(isset($_GET['gift']))
        echo "<a href='shop.php'>Retour à la boutique</a>";

    ?>
    <script src="js/packOpeningAnimation.js"></script>
    <?php require_once 'php/footer.php'; ?>
</body>
</html>