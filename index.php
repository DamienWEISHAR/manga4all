<?php


require_once './controllers/MangasController.controller.php';
$mangaController = new MangasController;//pas de constructeur donc pas de ();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));



try{
    if (empty($_GET['page'])){
        require './views/accueil.view.php';
        
    } else {
        /* J'explose le contenu de GET page sous forme de tableau
        Chaque sous URL correspondra à un index du tableau
        FILTER_SANITIZE_URL permet de supprimer tous les caractères sauf les lettres/chiffres/certains caractères spéciaux
        et permet d'être un peu plus sécurisé sur ce qui est envoyé à travers l'url */
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch($url[0]){
            case "accueil":
                require './views/accueil.view.php';
              
            break;
            case "mangas":
                if(empty($url[1])){
                    $mangaController->afficherMangas();
                } else if ($url[1]==="l"){
                   $mangaController->afficherUnManga($url[2]);
                } else if ($url[1]==="a"){
                    $mangaController->ajouterManga();
                } else if ($url[1]==="m"){
                    $mangaController->modificationManga($url[2]);
                } else if ($url[1]==="s"){
                    $mangaController->suppressionManga($url[2]);
                } else if ($url[1]==="av"){
                    $mangaController->ajoutMangaValidation();
                } else if ($url[1]==="mv"){
                    $mangaController->modificationMangaValidation();
                } else {
                    throw new Exception("La page n'existe pas");
                }      
            break;
            case "inscription":
                require './views/inscription.view.php';
            break;
            case "connexion":
                require './views/connexion.view.php';
            break;
            default: throw new Exception("La page n'existe pas");
        }
    }
}catch(Exception $e){
   echo $e->getMessage();
}

?>