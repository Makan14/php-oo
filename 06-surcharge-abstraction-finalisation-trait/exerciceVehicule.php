<?php  

 abstract class Vehicule{

    final public function demarrer(){
        return 'je demarre';
    }

    abstract function carburant(); 

    public function nombreTestsObligatoires(){
        return 100; 
    } 
}

class Renault extends Vehicule{

    public function carburant(){

        return "diesel";
    }

    public function nombreTestsObligatoires(){
        return 30 + parent::nombreTestsObligatoires(); 
    }

}

class Peugeot extends Vehicule{

    public function carburant(){
        return "l'essence";
    }

    public function nombreTestsObligatoires(){
        return 70 + parent::nombreTestsObligatoires(); 
    }

}


$renault = new Renault;
echo '<pre>'; var_dump($renault); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($renault)); echo '</pre>';
echo "je suis 1 renault " . $renault->demarrer() . " au " . $renault->carburant() . ' et je dois effectuer ' . $renault->nombreTestsObligatoires() . ' test obligatoire <br>';

$peugeot = new Peugeot;
echo '<pre>'; var_dump($peugeot); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($peugeot)); echo '</pre>';
echo "je suis 1 peugeot " . $peugeot->demarrer() . " à " . $peugeot->carburant() . ' et je dois effectuer ' . $peugeot->nombreTestsObligatoires() . ' test obligatoire <br>';


?>