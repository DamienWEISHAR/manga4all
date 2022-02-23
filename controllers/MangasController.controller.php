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
        require "./views/afficherManga.view.php";
    }

    public function ajouterManga(){
        require "./views/ajoutManga.view.php";
    }
}


?> 