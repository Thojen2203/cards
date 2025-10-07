<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'php/head.php'; ?>
    <title>Document</title>
    <style>
        .equal-cols th, .equal-cols td {
            width: 150px;
            min-width: 150px;
            max-width: 150px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php require_once 'php/header.php'; ?>
    <?php require_once 'php/navbar.php'; ?>
    <h1 class="text-center my-4">Taux de drop des cartes</h1>
    <h2 class="text-center my-4">Small Booster Pack</h2>
    <p class="text-center">Contenu du pack : 2 cartes</p>

    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
                <th scope="col">Rareté</th>
                <th scope="col">Cartes garanties</th>
                <th scope="col">Cartes aléatoires (max)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">Commun</td>
                <td>1</td>
                <td>2</td>
            </tr>
            <tr>
                <td scope="row">Inhabituelle</td>
                <td>0</td>
                <td>1</td>
            </tr>
            <tr>
                <td scope="row">Rare</td>
                <td>0</td>
                <td>1</td>
            </tr>
            <tr>
                <td scope="row">Epique</td>
                <td>0</td>
                <td>1</td>
            </tr>
            <tr>
                <td scope="row">Mythique</td>
                <td>0</td>
                <td>1</td>
            </tr>
            <tr>
                <td scope="row">Légendaire</td>
                <td>0</td>
                <td>1</td>
            </tr>
            
        </tbody>
    </table>

    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Carte 1</td>
            <td>100 %</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Carte 2</td>
            <td>50 %</td>
            <td>49 %</td>
            <td>0,7 %</td>
            <td>0,27 %</td>
            <td>0,02 %</td>
            <td>0,01 %</td>
            </tr>
        </table>
    <hr>

    <h2 class="text-center my-4">Pack Plus</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Carte 2</td>
                <td>40 %</td>
                <td>60 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Carte 3</td>
                <td>-</td>
                <td>50 %</td>
                <td>40 %</td>
                <td>9 %</td>
                <td>0,945 %</td>
                <td>0,055 %</td>
            </tr>
        </table>


    <h2 class="text-center my-4">Gros Pack</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Carte 2</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Carte 3</td>
                <td>33 %</td>
                <td>34 %</td>
                <td>33 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Carte 4</td>
                <td>-</td>
                <td>-</td>
                <td>50 %</td>
                <td>40 %</td>
                <td>9 %</td>
                <td>1 %</td>
            </tr>
        </table>

    <h2 class="text-center my-4">Giga Pack</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Carte 2</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Carte 3</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Carte 4</td>
                <td>-</td>
                <td>40 %</td>
                <td>30 %</td>
                <td>20 %</td>
                <td>10 %</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Carte 4</td>
                <td>-</td>
                <td>-</td>
                <td>60 %</td>
                <td>25 %</td>
                <td>12 %</td>
                <td>3 %</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Carte 4</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>70 %</td>
                <td>22 %</td>
                <td>8 %</td>
            </tr>
        </table>

    <h2 class="text-center my-4">Ultra Pack</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Carte 2</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Carte 3</td>
                <td>-</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Carte 4</td>
                <td>-</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Carte 5</td>
                <td>-</td>
                <td>-</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Carte 6</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>100 %</td>
                <td>-</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Carte 7</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>90 %</td>
                <td>8 %</td>
                <td>2 %</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Carte 8</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>80 %</td>
                <td>20 %</td>
            </tr>
        </table>


    <h2 class="text-center my-4">Legendary Lucky Pack</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>50 %</td>
                <td>50 %</td>
            </tr>
        </table>
    <hr>

    <h2 class="text-center my-4">Legendary Pack</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>100 %</td>
            </tr>
        </table>
    <hr>

    <h2 class="text-center my-4">Tiny Booster</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>100 %</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Carte 2</td>
                <td>25 %</td>
                <td>7 %</td>
                <td>3 %</td>
                <td>1 %</td>
                <td>0,4 %</td>
                <td>0,08 %</td>
            </tr>
        </table>
    <hr>

    <h2 class="text-center my-4">Random Booster</h2>
    <table class="table table-sm w-auto mx-auto equal-cols">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Carte</th>
            <th scope="col">Chances commun</th>
            <th scope="col">Inhabituelle</th>
            <th scope="col">Rare</th>
            <th scope="col">Épique</th>
            <th scope="col">Mythique</th>
            <th scope="col">Légendaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Carte 1</td>
                <td>54 %</td>
                <td>27 %</td>
                <td>10 %</td>
                <td>6 %</td>
                <td>2,4 %</td>
                <td>0,6 %</td>
            </tr>
        </table>
    <hr>



    <?php require_once 'php/footer.php'; ?>
</body>
</html>