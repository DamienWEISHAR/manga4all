<?php

require_once "./models/MangaManager.class.php";

class MangasController{

    /*********************
        ATTRIBUTS
    **********************/
    private $mangaManager;


    /**********************
        CONSTRUCTEUR
    ***********************/
    public function __construct(){
        $this->mangaManager = new MangaManager; //pas de constructeur donc pas de ();
        $this->mangaManager->chargementMangas();
    }
        
    


    /***********************
        GETTER & SETTER
    ************************/




    /***********************
            METHODES
    ************************/
    public function afficherMangas(){
        //récupération de tous les livres, dispo dans la variable $mangas
        $mangas = $this->mangaManager->getMangas();
        require './views/mangas.view.php';
       
    }



    public function afficherUnManga($id){
        $manga = $this->mangaManager->getMangaById($id);
        require "views/afficherManga.view.php";
        
    }



    public function ajouterManga(){
        require "./views/ajoutManga.view.php";
    }

   
   
    public function ajoutMangaValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute= $this->ajoutImage($file,$repertoire);

        //rajout du livre en bdd + SECURISATION
        $this->mangaManager->ajoutMangaBd(htmlspecialchars(strip_tags($_POST['titre'])),htmlspecialchars(strip_tags($_POST['edition'])),$nomImageAjoute);


        header ('Location: '. URL . "mangas");
    }
   
    
    
    private function ajoutImage($file, $dir){
        //Vérification et tests divers pour l'image:

        //pour le nom
        if(!isset($file['name']) || empty($file['name'])){
            throw new Exception ("Vous devez indiquer une image!");
        }
        //pour le dossier répertoire pour les images, si il n'existe pas, il le créée
        if(!file_exists($dir)) mkdir($dir,0777);
           
        //récupération de l'extension du fichier
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
           //permet de générer un numéro random qu'on va rajouter dans le nom de l'image
           //cela permet de pouvoir réutiliser la même image, qui aura un nom différent
           //permet d'éviter les doublons et d'écraser les images
            $random = rand(0,99999);
            $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"])){
            throw new Exception ("Le fichier n'est pas une image");
        }
        //pour l'extension
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif"){
            throw new Exception ("L'extension du fichier n'est pas reconnue, utilisez .jpg, .jpeg, .png ou .gif");
        }
        //si le fichier existe déjà ou pas
        if(file_exists($target_file)){
            throw new Exception ("Le fichier existe déjà!");
        }
        //pour le poids de l'image
        if($file['size'] > 500000){
            throw new Exception("Fichier trop volumineux!");
        }
        //pour vérifier que l'ajout de fichier a bien été effectué
        //et de le mettre dans le bon dossier
        if(!move_uploaded_file($file['tmp_name'], $target_file)){
            throw new Exception("Ajout de fichier n'a pas fonctionné");
        }
        else{
            return($random."_".$file['name']);
        }
    }


    public function suppressionManga($id){
        //récupération et suppression de l'image
        $nomImage = $this->mangaManager->getMangaById($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->mangaManager->suppressionMangaBD($id);


        header('Location:'.URL."mangas");
    }


    public function modificationManga($id){
        //récupération du livre à modifier
        $manga =$this->mangaManager->getMangaById($id);
        require "./views/modifierManga.view.php";

    }

    public function modificationMangaValidation(){
        //récupération de l'image + SECURISATION
        $imageActuelle = $this->mangaManager->getMangaById(htmlspecialchars(strip_tags($_POST['identifiant'])))->getImage();
        $file = $_FILES['image'];
        //si modification
        if($file['size'] > 0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->mangaManager->modificationMangaBD(htmlspecialchars(strip_tags($_POST['identifiant'])),htmlspecialchars(strip_tags($_POST['titre'])),htmlspecialchars(strip_tags($_POST['edition'])),$nomImageToAdd);

       

        header('Location: '. URL . "mangas");
    }
}




?> 