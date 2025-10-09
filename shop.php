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
        <div class="card m-3">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Giga pack</h5>
            <p class="card-text">Ce pack contient 6 cartes, dont 3 communes, 1 inhabituelle à mythique, une rare ou mieux et 1 épique ou mieux.</p>
            <button type="button" class="btn btn-primary">Acheter</button>
          </div>
        </div>
        <div class="card m-3">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Gros pack</h5>
            <p class="card-text">Ce pack contient 4 cartes, dont 2 cartes communes, 1 carte commune à rare et 1 rare ou
              mieux.</p>
            <button type="button" class="btn btn-primary">Acheter</button>
          </div>
        </div>
        <div class="card m-3">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pack Plus</h5>
            <p class="card-text">Ce pack vous donne 1 carte commune, une commune ou inhabituelle et une carte de rareté
              Inhabituelle ou supérieur.</p>
            <button type="button" class="btn btn-primary">Acheter</button>
          </div>
        </div>
        <div class="card m-3">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Small Booster</h5>
            <p class="card-text">Le plus petit des packs ! Un petit pack pour obtenir 1 carte commune et une 2e carte de
              rareté aléatoire.</p>
            <button type="button" class="btn btn-primary">Acheter</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'php/footer.php'; ?>
</body>

</html>