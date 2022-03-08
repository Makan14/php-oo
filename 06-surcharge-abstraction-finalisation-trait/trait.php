<?php  
// pr déclarer 1 trait, on utilise le mot clé: trait
// par convention pr déclarer 1 trait sn nom doit commencer par 1 T majuscule
trait TPanier{
    public $nbProduits; 

    // tt le contenu du trait sera déclaré comme dns 1 class. La syntaxe sera la mm 
    public function afficherProduits(){

        return "j affiche ts ls produits"; 
    }
}

trait TMembre{

    public function afficherMembres(){

        return "j affiche ts ls membres";
    }
}

// je déclare 1 class
class Produit{

    public $prix;
}

// 1 class peut peut hériter d 1 autre class en plus d hériter de plrs traits
class Site extends Produit{

    // use pr hériter des 2 traits (ps de extends)
    use TPanier, TMembre; 
}

// instanciation de la class
$site = new Site;
// var dump et print r pr verifier ce que contient mn objt $site
echo '<pre>'; var_dump($site); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($site)); echo '</pre>'; 

// on ne peut pas instancier un trait (exemple en dessous)
// $membre = new TMembre;


?>