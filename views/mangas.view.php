<?php 
ob_start();//permet de mettre en temporisation du code qui sera utilisé plus tard
if (!empty($_SESSION['alert'])) :

?>
<div class="alert alert-<?= $_SESSION['alert']['type']?>" role="alert">
    <?= $_SESSION['alert']['msg']?>
</div>
<?php 
unset($_SESSION['alert']);
endif; ?>

<div>
    <button type="button" class="align-middle btn btn-success"> <a class="text-white" href="<?=URL?>mangas/a">Ajouter</a></button>
</div>
    
<table class="table text-center">
    <tr  class="table-info">
        <th>Image</th>
        <th>Nom</th>
        <th>Edition</th>
        <th colspan="2">Modifier/Supprimer</th>
    </tr>

    <!-- permet d'afficher les données en parcourant le tableau $mangas -->
    <?php 
    //récupération du tableau des mangas dans une variable $mangas pour faciliter la lisibilité
    
    for($i=0; $i < count($mangas); $i++) : ?>

    <tr>
        <td class="align-middle"><img src="public/images/<?= $mangas[$i]->getImage(); ?>" alt="" width="150vw"></td>
        <td class="align-middle"><a href="<?=URL?>mangas/l/<?= $mangas[$i]->getId(); ?>"><?= $mangas[$i]->getTitre(); ?></a></td>
        <td class="align-middle"><?= $mangas[$i]->getEdition(); ?></td>
        <td class="align-middle"><a class="btn btn-warning text-white" href="<?= URL ?>mangas/m/<?= $mangas[$i]->getId(); ?>">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?=URL?>mangas/s/<?=$mangas[$i]->getId();?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ce manga?');">
                <button class="btn btn-danger text-white" type="submit">Supprimer</button>
            </form>
            
        </td>
    </tr>
    <?php endfor; ?>
</table>

<?php

    $content = ob_get_clean();// permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
    $titre = "Liste des Mangas";
    require "template.php";
?>