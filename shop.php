<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require_once 'php/head.php'; ?>
  <title>Magasin</title>
</head>

<body>
  <?php require_once 'php/header.php'; ?>
  <?php require_once 'php/navbar.php'; ?>
  <h1 class="text-center my-4">Bienvenue dans la boutique Kards !</h1>
  <div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <?php
        try{
          require_once 'php/database.php';
          global $db;
          require_once 'php/shopOffers/card.php';
        }catch(Exception $e){
          echo 'Une erreur est survenue. Merci de réessayer plus tard.';

        }
        $q = $db -> prepare("SELECT * from purchasablepacks join packs using(pack_id)");
        $q -> execute();

        $res = $q -> fetchAll();
        foreach($res as $row){
          echo generateHTMLBoosterPackCard($row["pack_icon_link"],$row['pack_name'], $row['pack_description'], $row['pack_price']);
        }
        ?>
      </div>
    </div>
  </div>
  <?php require_once 'php/footer.php'; ?>
</body>

</html>