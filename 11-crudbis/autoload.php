<?php 

class Autoload{

    // du fait qu elle soit statique, 7 méthode appartient à sa class et nn à 1 objet crée de 7 mm class. Elle ne sera pas modifiable via l instance de la class, mais seulement par sa class

    //                             controller/Controller 
    public static function inclusionAuto($classname){
        // str_replace sert à remplacer qlq chose dns 1 chaine de caractere
        // le 1er anti slash sert d echapement
        // la constante magique __DIR__ me recup le chemin vers mn fichier.
        // elle recup l intégralité du chemin vers mn projet, qu il soit en local...comme plus tard en ligne, ce qui sera très interessant. Je n aurais de modification a faire lors de ce changement là 
        require_once __DIR__ . '/' . str_replace('\\', '/', $classname . '.php'); 

        // echo __DIR__ . '/' . str_replace('\\', '/', $classname . '.php <br>'); 
    }
}

spl_autoload_register(array('Autoload', 'inclusionAuto'));  

// $controller = new controller\Controller;  
// echo __DIR__;

?>