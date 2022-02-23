<?php 
ob_start(); //permet de mettre en temporisation du code qui sera utilisé plus tard
?>
 <form method="POST" action="<?=URL?>mangas/mv" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titre">Nom du manga</label>
    <input type="texte" class="form-control" id="titre" name="titre" value="<?= $manga->getTitre()?>">
  </div>
  <div class="form-group">
    <label for="edition">Edition</label>
    <input type="text" class="form-control" id="edition" name="edition" value="<?= $manga->getEdition()?>">
  </div>
  <h3>Image actuelle:</h3>
  <img src="<?=URL?>public/images/<?= $manga->getImage()?>" alt="">
  <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?=$manga->getId();?>">
  <br>
  <button type="submit" class="btn btn-primary">Valider</button>
</form> 
<?php

$content = ob_get_clean();// permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Modification de ".$manga->getTitre();
require "template.php";

?>