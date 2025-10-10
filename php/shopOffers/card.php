<?php
function generateHTMLBoosterPackCard($imageSource, $cardName, $cardTitle, $cardDescription, $buttonText): string
{
    $HTML = '
    <div class="card m-3">
        <img src="' . $imageSource . '" class="card-img-top" alt="' . $cardTitle . '">
        <div class="card-body">
            <h5 class="card-title">' . $cardTitle . '</h5>
            <p class="card-text">'. $cardDescription.'</p>
            <button type="button" class="btn btn-primary">'. $buttonText.'</button>
        </div>
    </div>
    ';
}
?>