<?php 

namespace controller;

class Controller{

    // propriété privée qui servira de lien entre ce qui sera codé dns la class EntityRepository.php et la class Controller 
    // elle servira par exemple à recup ttes ls données qui serviront à se connecter à notre BDD
    private $dbEntityRepository;

    public function __construct(){

        // echo "instanciation de la class controller ok"; 
    } 
}





?>