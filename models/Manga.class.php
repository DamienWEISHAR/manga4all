<?php

class Manga{

    /*********************
        ATTRIBUTS
    **********************/
    private $id;
    private $titre;
    private $edition;
    private $image;

 

    /**********************
        CONSTRUCTEUR
    ***********************/
    /*permet de générer un livre,
    $this->id fait référence à l'attribut et $id fait référence au paramètre */
    public function __construct($id,$titre,$edition,$image){
        $this->id = $id; //
        $this->titre = $titre; //
        $this->edition = $edition;
        $this->image = $image;
       
    }
    
    /***********************
        GETTER & SETTER
    ************************/

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function setTitre($titre){
		$this->titre = $titre;
	}

	public function getEdition(){
		return $this->edition;
	}

	public function setEdition($edition){
		$this->edition = $edition;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

}


?>