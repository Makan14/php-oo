<?php  

class Personnage{

    protected function deplacement(){

        return 'je me deplace très vite !';

    }

    public function saut(){

        return 'je saute très haut !'; 

    }


}

// avc le mot clé extends Mario hérite de tts ls propriétés et  méthodes de lma class Personnage
// elle pt hériter de la méthode protected, cst 1 niveau de visibilité qui le permet. Public aussi, qui est encore pls visible.
// par contre, pas private.
class Mario extends Personnage{

    public function quiSuisJe(){
        
        // je recup dns 7 affichage ls méthodes dnt hérite la class enfant, mm la protected
        return 'Je suis Mario, ' . $this->deplacement() . ' et ' . $this->saut() . '<br>';

    }

}


class Bowser extends Personnage{

    public function quiSuisJe(){

        return 'Je suis Mario, ' . $this->deplacement() . ' et ' . $this->saut() . '<br>';

    }

    public function saut(){

        return 'je ne saute pas très haut';

    }

}

// j instance ma class 
$mario = new Mario;
// 1 print r pr visualiser si je recup tt le contenu de Personage en héritage 
// la méthode public apparait, mais la protrected non, cst 1 comportement normal, il ne peut l afficher mais la class en hérite tt de mm  
echo '<pre>'; print_r(get_class_methods($mario)); echo '</pre>'; 

// j'affiche le contenu de la méthode codée à la ligne 19
echo $mario->quiSuisJe(); 

// j instancie la class Bowser pr crée 1 objt
$bowser = new Bowser;
//je fais 1 affichage pr vérifier qu elle valeur je recup. Celle de la class mère ou la nouvelle
echo $bowser->quiSuisJe();
// cela a fonctionné, je recup la nvl valeur. J'ai surchargé la méthode saut() et cela a fonctionné 
// cst 1 technique dnt je pourrai avoir besoin de temps en temps 

?>