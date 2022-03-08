<?php  

// 7 méthode est abstraite car j ai déclaré à l intérieur 2 méthodes abstraites. si je n ecris ps abstract class, j aurai 1 erreur PHP 
abstract class Joueur{

    protected $pseudo;
    protected $age;

    // method pr s inscrire qui doit faire appel à 1 méthode etreMajeur (si on n est pas majeur, on ne peut pas s inscrire pr jouer en ligne)
    public function inscription(){

        return $this->etreMajeur(); 
    }

    // methode abstraite pr savoir si on est majeur
    abstract function etreMajeur();

    // methode abstraite pr déterminer la devise que va utiliser le joueur en ligne, selon sn pays 
    abstract function devise(); 
}

// je déclare la class JoueurFr qui hérite de Joueur
class JoueurFr extends Joueur{

    // je suis obligé d implémenter ls 2 class abstraites dnt a hérité la class Joueurfr.
    // tt au moins, je suis obligé de ls déclarer, mm si je ne leur donne d instructions a exécuter 
    public function etreMajeur(){

        return 18;
    }

    // je ne peux pas instancier 1 class abstraite (Joueur). Je ne pourrais créer d objets que des classes qui en hérité (JoueurFr)
    public function devise(){

        return '€';
    }
}

$joueurFr = new JoueurFr; 
echo "en France l age légal pr s inscrire sur 1 site de jeux en ligne est de " . $joueurFr->etreMajeur() . ' ans ';
echo "pr jouer sur 1 site de jeux ligne, en France, on doit utiliser ds " . $joueurFr->devise() . '<br>'; 

class JoueurUs extends JoueurFr{

    public function etreMajeur(){

        return 21;
    }

    public function devise(){

        return '$'; 
    }

}

$joueurUs = new JoueurUs; 
echo "Aux USA l age légal pr s inscrire sur 1 site de jeux en ligne est de " . $joueurUs->etreMajeur() . ' ans ';
echo "pr jouer sur 1 site de jeux ligne, aux USA, on doit utiliser ds " . $joueurUs->devise() . '<br>'; 

?>