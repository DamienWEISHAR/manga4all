<?php
session_start();

require_once "./controllers/Visiteur.controller.php";
$visiteurController = new VisiteurController;
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
            default: throw new Exception("La page n'existe pas");
        }
    }
}catch(Exception $e){
   echo $e->getMessage();
}


// require_once './controler_series.php';
// $controler_serie = new Controler_series();

// require_once './controler_auteurs.php';
// $controler_auteur = new Controler_auteurs();

// require_once './controler_editions.php';
// $controler_edition = new Controler_editions();

// try {
//     if (empty($_GET['page'])){
//         require './vue/vue_accueil.php';
//     } else {
        
//         // J'explose le contenu de GET page sous forme de tableau
//         // Chaque sous URL correspondra à un index du tableau
//         // FILTER_SANITIZE_URL permet de supprimer tous les caractères sauf les lettres/chiffres/certains caractères spéciaux
//         // et permet d'être un peu plus sécurisé sur ce qui est envoyé à travers l'url
//             $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

//             switch($url[0]){
//             case "accueil":
//                 require './vue/vue_accueil.php';
//             break;

//             case "series":
//                 //si il n'y a rien après series dans l'url
//                 if(empty($url[1])){
//                     $controler_serie->afficherSeries();
                                   
//                     //sinon, si il y a:
//                 } else if ($url[1] === "s"){
//                     //appel de la fonction afficherUneSerie avec en parametre l'id qu'on veut (en l'occurence, l'id de $url[2])
//                     // $controler_serie->afficherUneSerie($url[2]); 
//                     echo "afficher une serie";

//                 } else if ($url[2] === "aj"){
//                     // echo $controler_serie->ajouterUneSerie($url[2]); 
//                     echo "ajouter une serie";

//                 } else if ($url[2] === "mo"){
//                     // echo $controler_serie->modifierUneSerie($url[2]); 
//                     echo "modifier une serie";

//                 } else if ($url[2] === "su"){
//                     // echo $controler_serie->supprimerUneSerie($url[2]); 
//                     echo "supprimer une serie";

//                 }else { //dans le cas où il y a autre chose d'écrit
//                     throw new Exception ("La page que vous demandez n'existe pas");
//                 }
//             break;

//             case "auteurs":
//                 //si il n'y a rien après auteurs dans l'url
//                 if(empty($url[1])){
//                     $controler_auteur->afficherAuteurs();
                
//                     //sinon, si il y a: (on va reprendre la même structure)
//                 } else if ($url[1] === "a"){
//                 //    $controler_auteur->afficherUnAuteur($url[2]);
//                     echo "afficher un auteur";
//                 } else if ($url[1] === "aj"){
//                 //     $controler_auteur->ajouterUnAuteur($url[2]);
//                     echo "ajouter un auteur";
//                 } else if ($url[1] === "mo"){
//                 //     $controler_auteur->modifierUnAuteur($url[2]);
//                     echo "modifier un auteur";
//                 } else if ($url[1] === "su"){
//                 //     $controler_auteur->supprimerUnAuteur($url[2]);
//                     echo "supprimerr un auteur";
//                 }else {
//                     throw new Exception ("La page que vous demandez n'existe pas");
//                 }
//                 break;
            

//             case "editions":
//                 //si il n'y a rien après editions dans l'url
//                 if(empty($url[1])){
//                     $controler_edition->afficherEditions();
                
//                     // sinon, si il y a: (on va reprendre la même structure)
//                 } else if ($url[1] === "e"){
//                 //   $controler_edition->afficherUneEdition($url[2]);
//                     echo "afficher une edition";
//                 } else if ($url[1] === "aj"){
//                 //     $controler_edition->ajouterEditions($url[2]);
//                     echo "ajouter une edition";   
//                 } else if ($url[1] === "mo"){
//                 //     $controler_edition->modifierEditions($url[2]);
//                     echo "modifier une edition";
//                 } else if ($url[1] === "su"){
//                 //     $controler_edition->supprimerEditions($url[2]);
//                     echo "supprimer une edition";
//                 }else {
//                     throw new Exception ("La page que vous demandez n'existe pas");
//                 }
//                 break;
//             case "inscription":
//                 if(empty($url[1])){
//                     require './vue/vue_inscription.php';
//                 }else {
//                     throw new Exception ("La page que vous demandez n'existe pas");
//                 }
//             break;
//             default: throw new Exception (require './vue/vue_error.php');
//         }
//     }
// }catch (Exception $e) {
//     //affichera le message présent dans le default
//     echo $e->getMessage();
    
// }
?>