<?php

date_default_timezone_set('Europe/Paris');

function displayFreeGiftsCard($cardTitle, $cardDescription, $timeLastUsed, $timeUntilNextGift, $pageId): string
{
    if((time() - strtotime($timeLastUsed)) >= $timeUntilNextGift){ 
            return '
            <div class="card m-3 w-auto">
                        <div class="card-body">
                            <h5 class="card-title">' . $cardTitle . '</h5>
                            <p class="card-text">'. $cardDescription.'</p>
                            <button class="btn btn-primary" id="free-gift-button' . $pageId . '">GRATUIT</button>
                        </div>
            </div>
    ';
    
    } else {
           return '
            <div class="card m-3 w-auto">
                        <div class="card-body">
                            <h5 class="card-title">' . $cardTitle . '</h5>
                            <p class="card-text">'. $cardDescription.'</p>
                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: ' . ((time() - strtotime($timeLastUsed)) / 7200 * 100) . '%"></div>
                            </div>
                            <p class="free-gift-timer" id="next-gift-timer' . $pageId . '">Prochain cadeau dans </p>
                            <p class="hidden-data" id="last-free-gift' . $pageId . '"> ' . strtotime($timeLastUsed) . '</p>
                            <p class="hidden-data" id="next-free-gift' . $pageId . '"> ' . (strtotime($timeLastUsed) + $timeUntilNextGift) . '</p>
                            <button class="btn btn-outline-secondary" id="free-gift-button' . $pageId . '" disabled>Non disponible</button>
                        </div>
            </div>
    ';

    }
}

?>