<?php
$arttools = new ARTTools();
?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-responsive-accordion-tabs="tabs accordion large-accordion medium-tabs" id="example-tabs">
                <?php echo utf8_encode($arttools->affichageTitres()); ?>
            </ul>
        </div>
        <div class="cell medium-9">
            <div class="tabs-content" data-tabs-content="example-tabs">
                <?php echo utf8_encode($arttools->affichageFiches()); ?>
            </div>
        </div>
    </div>
</div>