<?php

namespace controller;

class Controller{

    // propriété privée qui servira de lien entre ce qui sera codé dans la class EntityRepository et la class Controller
    // elle servira par exemple a récupérer toutes les données qui serviront à se connecter a notre BDD
    private $dbEntityRepository;

    public function __construct(){
        // echo "Instanciation de la classe Controller ok";
    }

}