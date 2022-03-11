<?php

class Autoload{

    // du fait qu'elle soit statique, cette méthode appartient à sa classe et non à un objet crée de cette même classe. Elle ne sera pas modifiable via l'instance de la classe, mais seulement par sa classe
    //                              controller/Controller
    public static function inclusionAuto($classname){
        // La constante magique __DIR__ me récupère le chemin vers mon fichier.
        // elle récupère l'intégralité du chemin vers mon projet, qu'il soit en local...comme plus tard en ligne, ce qui sera très interessant. Je n'aurais de modification a faire lors de ce changement là
        require_once __DIR__ . '/' . str_replace('\\', '/', $classname . '.php') ;
        // echo "require_once" . __DIR__ . '/' . str_replace('\\', '/', $classname . '.php <br>') ; 
    }

}

spl_autoload_register(array('Autoload', 'inclusionAuto')); 

// $controller = new controller\Controller;
// echo __DIR__ ;