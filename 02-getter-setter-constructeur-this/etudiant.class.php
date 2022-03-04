<?php 

class Etudiant{
    
    private $prenom;

    public function __construct($argument){

        echo "durant l instaciation, ns avns bien reçu la valeur $argument <br>";

        $this->setPrenom($argument);

    }

    public function setPrenom($argument){

        $this->prenom = $argument;
    }

    public function getPrenom(){

        return $this->prenom; 
    }
}

$etudiant = new Etudiant('Makan'); 



?>