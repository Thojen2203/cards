<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require_once 'php/head.php'; ?>
  <title>Magasin</title>
</head>

<body>
  <?php require_once 'php/header.php'; ?>
  <?php require_once 'php/navbar.php';
          try{
          require_once 'php/database.php';
          global $db;
          require_once 'php/shopOffers/permanentPackCard.php';
        } catch(Exception $e){
          echo 'Une erreur est survenue. Merci de réessayer plus tard.';

        }
?>
  <h1 class="text-center my-4">Boutique&</h1>
  <h2 class="text-center my-4"><?php session_start(); $q = $db -> prepare("SELECT user_coins, user_diamonds from user where user_id = :user_id");
    $q -> execute(["user_id" => $_SESSION['userid']]);
    $res = $q -> fetch();
    echo "<h1 class='text-center'><span class='badge text-bg-secondary m-3'>" . $res['user_coins'] . " <i class='bi bi-coin'></i></span>";
    echo "<span class='badge text-bg-secondary m-3'>" . $res['user_diamonds'] . " <i class='bi bi-gem'></i></span></h1>";
   ?></h2>
  <div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <?php
        $q = $db -> prepare("SELECT * from purchasablepacks join packs using(pack_id)");
        $q -> execute();

        $res = $q -> fetchAll();
        foreach($res as $row){
          if($row['price_currency'] == 'coins')
            $currency = '<i class="bi bi-coin"></i>';
          else if($row['price_currency'] == 'diamonds')
            $currency = '<i class="bi bi-gem"></i>';
          echo generateHTMLBoosterPackCard($row["pack_icon_link"],$row['pack_name'], $row['pack_description'], $row['pack_price'], $currency);
        }
        ?>
      </div>
      <div class="col">
        <?php
        require_once 'php/shopOffers/freeGiftsCard.php';
        $q = $db -> prepare("SELECT last_2h_gift, last_24h_gift, last_3d_gift, last_7d_gift from user where user_id = :user_id");
        $q -> execute(["user_id" => $_SESSION['userid']]);
        $res = $q -> fetch();
        echo displayFreeGiftsCard("Cadeau de 2 h", "Petit pack gratuit toutes les 2 heures", $res['last_2h_gift'], 7200, 1);
        echo displayFreeGiftsCard("Cadeau de 1 j", "Pack Plus gratuit toutes les 24 heures", $res['last_24h_gift'], 86400, 2);
        echo displayFreeGiftsCard("Cadeau de 3 j", "Gros pack gratuit tous les 3 jours", $res['last_3d_gift'], 259200, 3);
        echo displayFreeGiftsCard("Cadeau de 7 j", "Giga pack gratuit tous les 7 jours", $res['last_7d_gift'], 604800, 4);

        ?>
      </div>
    </div>
  </div>
  <script src="js/betterTimer.js"></script>
  <script src="js/freeGiftShopTimer.js"></script>
  <script src="js/shopButtons.js"></script>
  <?php require_once 'php/footer.php'; ?>
</body>

</html>