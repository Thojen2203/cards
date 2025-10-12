<?php

function displayCardInIndex($card, $isUnlocked, $rarityName){
    echo "
        <div class='card w-auto " . ($isUnlocked ? "" : "opacity-50") . " m-3'>
            <img src='" . htmlspecialchars($card['card_image_link']) . "' class='card-img-top' alt='" . htmlspecialchars($card['card_name']) . "'>
            <div class='card-body carte-rarete-" . htmlspecialchars($rarityName) . "'>
                <h5 class='card-title'>" . htmlspecialchars($card['card_name']) . "</h5>
                <h5 class='card-subtitle mb-2 text-muted'>Rareté : " . htmlspecialchars($rarityName) . "</h5>
                <p class='card-text'>" . htmlspecialchars($card['card_description']) . "</p>
            </div>";
            if(!$isUnlocked) {
                echo "<div class='locked-overlay d-flex flex-column justify-content-center align-items-center'>
    <i class='bi bi-lock-fill fs-1 text-white mb-2'></i>
    <span class='text-white fw-bold'>Verrouillée</span>
  </div>";
    }
    echo "</div>";
}

function displayCardInPackOpening($card, $extraText, $rarityName, $id) {
    echo "
        <div class='card m-3 pack-opening-card' data-card-id='pack-card-". htmlspecialchars($id) ."'>
            <img src='" . htmlspecialchars($card['card_image_link']) . "' class='card-img-top' alt='" . htmlspecialchars($card['card_name']) . "'>
            <div class='card-body carte-rarete-" . htmlspecialchars($rarityName) . "'>
                <h5 class='card-title'>" . htmlspecialchars($card['card_name']) . "</h5>
                <h5 class='card-subtitle mb-2 text-muted'>Rareté : " . htmlspecialchars($rarityName) . "</h5>
                <p class='card-text'>" . htmlspecialchars($card['card_description']) . "</p>
                <p class='card-text'>" . $extraText . "</p>
            </div>";
    echo "</div>";
}
?>