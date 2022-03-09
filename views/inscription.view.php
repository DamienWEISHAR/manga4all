<?php 
ob_start();  //permet de mettre en temporisation du code qui sera utilisé plus tard
?>
<!-- enctype permet de récupérer les images uploadées sinon ça ne marche pas -->
<form method="POST" action="<?=URL?>mangas" enctype="multipart/form-data">
  <div class="form-group  text-center col-sm-8 offset-sm-2">
    <label for="pseudo">Pseudo </label>
    <input type="texte" class="form-control" id="pseudo" name="pseudo">
  </div>
  <div class="form-group text-center col-sm-8 offset-sm-2">
    <label for="mail">Mail </label>
    <input type="mail" class="form-control" id="mail" name="mail">
  </div>
  <div class="form-group text-center col-sm-8 offset-sm-2">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  <br>
  <button type="submit" class="btn btn-primary col-sm-2 offset-sm-5">S'inscrire</button>
</form> 
<?php

$content = ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Inscription";
require "template.php";

?>
