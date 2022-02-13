<?php 

require_once "./models/MangaManager.class.php";
$mangaManager = new MangaManager; //pas de constructeur donc pas de ();
$mangaManager->chargementMangas();


ob_start();
?>

<div class="div-btn-ajouter">
    <button class="btn-ajouter"> <a href="">Ajouter</a></button>
</div>
    
<table class="tableau">
    <tr >
        <th class="tab-titre">Image</th>
        <th class="tab-titre">Nom</th>
        <th class="tab-titre">Edition</th>
        <th colspan="2"class="tab-titre">Modifier/Supprimer</th>
    </tr>

    <!-- permet d'afficher les données en parcourant le tableau $mangas -->
    <?php 
    //récupération du tableau des mangas dans une variable $mangas pour faciliter la lisibilité
    $mangas = $mangaManager->getMangas();
    for($i=0; $i < count($mangaManager->getMangas()); $i++) : ?>

    <tr class="tab-titre">
        <td class="tab-ligne"><img class="img-manga" src="public/images/<?= $mangas[$i]->getImage(); ?>" alt=""></td>
        <td class="tab-ligne"><?= $mangas[$i]->getTitre(); ?></td>
        <td class="tab-ligne"><?= $mangas[$i]->getEdition(); ?></td>
        <td class="tab-ligne"><button class="btn-modifier"> <a href="">Modifier</a></button></td>
        <td class="tab-ligne"><button class="btn-supprimer"> <a href="">Supprimer</a></button></td>
    </tr>
    <?php endfor; ?>
</table>

<?php

    $content = ob_get_clean();
    $titre = "Liste des Mangas";
    require "template.php";
?>