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
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate'])*$randomMax){
            echo "Carte peu commune débloquée !";
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate'])*$randomMax){
            echo "Carte rare débloquée !";
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate']+$row['epic_drop_rate'])*$randomMax){
            echo "Carte épique débloquée !";
        }
        else if($random <= ($row['common_drop_rate']+$row['uncommon_drop_rate']+$row['rare_drop_rate']+$row['epic_drop_rate']+$row['mythic_drop_rate'])*$randomMax){
            echo "Carte mythique débloquée !";
        }
        else{
            echo "Carte légendaire débloquée !";
        }
        echo "<br>";
    }

    ?>
    <?php require_once 'php/footer.php'; ?>
</body>
</html>