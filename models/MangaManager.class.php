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

    //pour ajouter un manga au tableau
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
            if($this->mangas[$i]->getId() == $id){
                return $this->mangas[$i];
            }
        }
    }

    //ajout d'un manga à la BDD par un user
    public function ajoutMangaBd($titre, $edition, $image){
        $req = " INSERT INTO mangas (titre, edition, image) VALUES (:titre, :edition, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":edition",$edition, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor(); 

    
       if($resultat >0){
        $manga = new Manga($this->getBdd()->lastInsertId(), $titre, $edition,$image);
        $this->ajoutManga($manga);
       }
    }


    public function suppressionMangaBD($id){
        $req ='DELETE FROM mangas WHERE id = :idManga';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idManga", $id, PDO ::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat >0){
            $manga = $this->getMangaById($id);
            unset($manga);
        }
    }

    public function modificationMangaBD($id,$titre,$edition,$image){
        $req= "UPDATE mangas SET titre = :titre, edition = :edition, image = :image WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO ::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO ::PARAM_STR);
        $stmt->bindValue(":edition", $edition, PDO ::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO ::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat >0){
            $this->getMangaById($id)->setTitre($titre);
            $this->getMangaById($id)->setEdition($edition);
            $this->getMangaById($id)->setImage($image);


        }
    }

}
 






?>