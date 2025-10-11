<?php

date_default_timezone_set('Europe/Paris');

function displayFreeGiftsCard($cardTitle, $cardDescription, $timeLastUsed): string
{
    var_dump(strtotime($timeLastUsed));
    var_dump(time());
    var_dump(time() - strtotime($timeLastUsed));
    if((time() - strtotime($timeLastUsed)) >= 7200) {
            return '
            <div class="card m-3">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">' . $cardTitle . '</h5>
                            <p class="card-text">'. $cardDescription.'</p>
                            <button class="btn btn-primary">GRATUIT</button>
                        </div>
                    </div>
                </div>
            </div>
    ';
    } else {
           return '
            <div class="card m-3">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">' . $cardTitle . '</h5>
                            <p class="card-text">'. $cardDescription.'</p>
                            <button class="btn btn-outline-secondary">Non disponible</button>
                            <p>Prochain cadeau dans ''</p>
                            <p class="hidden-data"></p>
                        </div>
                    </div>
                </div>
            </div>
    ';

    }
}

?>