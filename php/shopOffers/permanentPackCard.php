<?php
function generateHTMLBoosterPackCard($imageSource, $cardTitle, $cardDescription, $buttonText, $currency): string
{
    return '
    <div class="card m-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="' . $imageSource . '" class="card-img-top" alt="' . $cardTitle . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $cardTitle . '</h5>
                    <p class="card-text">'. $cardDescription.'</p>
                    <button type="button" class="btn btn-primary btn-lg">'. $buttonText. ' ' . $currency . '</button>
                </div>
            </div>
        </div>
    </div>
    ';
}
?>