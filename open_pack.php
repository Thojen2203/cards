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
                if($rarity_id == 1) $coinsToAdd = 2;
                else if($rarity_id == 2) $coinsToAdd = 5;
                else if($rarity_id == 3) $coinsToAdd = 10;
                else if($rarity_id == 4) $coinsToAdd = 25;
                else if($rarity_id == 5) $coinsToAdd = 75;
                else if($rarity_id == 6) $coinsToAdd = 150;

                $updateCardAmount = $db -> prepare("update user set user_coins = user_coins + :amount where user_id = :user_id");
                $updateCardAmount -> execute([
                    "amount" => $coinsToAdd,
                    "user_id" => $user_id,
                ]);

                echo "Vous avez déjà cette carte. Vous recevez $coinsToAdd pièces à la place.";
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
    $q = $db -> prepare("SELECT * from card_rate_drop where pack_id = 3");
    $q -> execute();
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