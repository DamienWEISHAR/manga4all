<?php

require_once './config/Connexion.class.php';
require_once './models/Manga.class.php';

class MangaManager extends Connexion{

     /*********************
        ATTRIBUTS
    **********************/
    private $mangas; //tableau de manga

    /**********************
        CONSTRUCTEUR
    ***********************/
    

    /***********************
        GETTER & SETTER
    ************************/

    public function getMangas(){
        return $this->mangas; //permet de retourer le tableau de manga
    }

    /**********************
          METHODES
    ***********************/

    //pour ajotuer un manga
    public function ajoutManga($manga){
        $this->mangas[] = $manga;
    }

    //pour récupérer tous les mangas
    public function chargementMangas(){
        $req = $this->getBdd()->prepare('SELECT * FROM mangas'); //par l'id et du + petit au + grand
        $req->execute();
        $mesMangas = $req->fetchAll(PDO::FETCH_ASSOC);//permet d'éviter les doublons, la variable $mesMangas est le tableau associatif contenant tous les mangas
        $req->closeCursor();

        //on veut générer un objet de type $manga, sous forme de tableau associatif
        foreach($mesMangas as $manga){
            $m = new Manga($manga['id'],$manga['titre'],$manga['edition'],$manga['image']);
            $this->ajoutManga($m);
        }
    }

    //pour récupérer un manga par l'id
    public function getMangaById($id){
        for($i=0; $i < count($this->mangas); $i++){
            if($this->mangas[$i]->getId()===$id){
                return $this->mangas[$i];
            }
        }
    }
}
 






?>