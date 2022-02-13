<?php

//abstract car elle ne sera pas instanciée directement
abstract class Connexion{

    /*********************
        ATTRIBUTS
    **********************/
    //static, accessible uniquement pour les classes qui hériteront de la class Connexion
    private static $connect;

    private static function setBdd(){
        self::$connect = new PDO("mysql:host=localhost;dbname=manga4all;charset=utf8", "root", "");
        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //protected = utilisable par les class enfants, mais pas personne d'autre
    //vérification si $pdo est vide ou non, si elle est nulle, creation d'une connexion avec setBdd()
    //puis on retourne le résultat de $pdo
    protected function getBdd(){
        if(self::$connect === null){
            self::setBdd();
        }
        return self::$connect;
    }
}


?>