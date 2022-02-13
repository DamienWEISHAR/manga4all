<?php 
ob_start();
?>
ICI la page d'accueil
<?php

$content = ob_get_clean();
$titre = "Bienvenue sur Manga4all";
require "template.php";

?>