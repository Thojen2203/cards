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

                echo "Doublon : $coinsToAdd pièces ajoutées !";
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

    $q = $db -> prepare("select user_coins from user where user_id = :user_id");
    $q -> execute(["user_id" => $_SESSION['userid']]);
    $res = $q -> fetch();

    if(isset($_GET['pack_id']))
        $packId = $_GET['pack_id'];
    else{
        if(isset($_GET['gift'])){
            if($_GET['gift'] == '2h'){
                $packId = 1;
                $u = $db -> prepare("update user set last_2h_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
            }
            else if($_GET['gift'] == 'daily'){
                $packId = 2;
                $u = $db -> prepare("update user set last_24h_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
            }
            else if($_GET['gift'] == '3d'){
                $packId = 3;
                $u = $db -> prepare("update user set last_3d_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
            }
            else if($_GET['gift'] == '7d'){
                $packId = 4;
                $u = $db -> prepare("update user set last_7d_gift = now() where user_id = :user_id");
                $u -> execute(["user_id" => $_SESSION['userid']]);
            }
            else{
                header("Location: shop.php");
                die();
            }
        }
    }

    $p = $db -> prepare("select * from purchasablepacks join packs using(pack_id) where purchasablepacks.pack_id = :pack_id");

    $q = $db -> prepare("SELECT * from card_rate_drop where pack_id = :packId");
    $q -> execute(["packId" => $packId]);
    $res = $q -> fetchAll();

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
            echo "Carte commune débloquée !";
            $c = $db -> prepare("select card_id from cards where card_rarity = 1 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 1);
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate'])*$randomMax){
            echo "Carte peu commune débloquée !";
            $c = $db -> prepare("select card_id from cards where card_rarity = 2 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 2);
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate'])*$randomMax){
            echo "Carte rare débloquée !";
            $c = $db -> prepare("select card_id from cards where card_rarity = 3 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 3);
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate']+$row['epic_drop_rate'])*$randomMax){
            echo "Carte épique débloquée !";
            $c = $db -> prepare("select card_id from cards where card_rarity = 4 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 4);
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate']+$row['epic_drop_rate']+$row['mythic_drop_rate'])*$randomMax){
            echo "Carte mythique débloquée !";
            $c = $db -> prepare("select card_id from cards where card_rarity = 5 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 5);
        }
        else{
            echo "Carte légendaire débloquée !";
            $c = $db -> prepare("select card_id from cards where card_rarity = 6 order by rand() limit 1");
            $c -> execute();
            $card = $c -> fetch();
            giveCardToUser($_SESSION['userid'], $card['card_id'], 6);
        }
        echo "<br>";
    }

    ?>
    <?php require_once 'php/footer.php'; ?>
</body>
</html>