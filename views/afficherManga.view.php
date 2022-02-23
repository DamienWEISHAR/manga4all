<?php 
ob_start();//permet de mettre en temporisation du code qui sera utilisé plus tard
?>
  
<div class="row">
    <div class="col-6">
        <img src="<?=URL?>public/images/<?= $manga->getImage();?>" alt="">
    </div>
    <div class="col-6">
        <h3>Informations</h3>
        <p>Titre: <?=$manga->getTitre();?></p>
        <p>Edition: <?=$manga->getEdition();?></p>
    </div>

</div>
<?php

$content = ob_get_clean();// permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = $manga->getTitre();
require "template.php";

?>