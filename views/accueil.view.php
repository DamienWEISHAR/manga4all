<?php 
ob_start(); //permet de mettre en temporisation du code qui sera utilisé plus tard
?>
<br><h2 class="text-center text-primary">C'est l'occasion d'échanger</h2>
<br><p class="text-center lead">Trouvez votre bonheur!</p>
<img id="banniere" src="public/images/banniere2.jpg" alt="banniere">
<div class="typewriter">
  <p>Prenez part à une expérience unique </p> <br>
  <p>et inscrivez-vous!</p>
</div>

<?php

$content = ob_get_clean();// permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Bienvenue sur Manga4all";
require "template.php";

?>