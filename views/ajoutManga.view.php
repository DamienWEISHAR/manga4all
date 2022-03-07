<?php 
ob_start();  //permet de mettre en temporisation du code qui sera utilisé plus tard
?>
<!-- enctype permet de récupérer les images uploadées sinon ça ne marche pas -->
<form method="POST" action="<?=URL?>mangas/av" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titre">Nom du manga </label>
    <input type="texte" class="form-control" id="titre" name="titre">
  </div>
  <div class="form-group">
    <label for="edition">Edition</label>
    <input type="text" class="form-control" id="edition" name="edition">
  </div>
  <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
  <br>
  <button type="submit" class="btn btn-primary">Valider</button>
</form> 
<?php

$content = ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Ajout d'un manga";
require "template.php";

?>