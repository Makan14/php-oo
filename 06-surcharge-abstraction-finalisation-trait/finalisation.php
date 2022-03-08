<?php  
// avec le mot-clés final on ne peut pas faire hérité la class par d autres (extends ne fonctionnera pas)
// le développeur considére que le code est abouti, et ne veut pas qu il soit modifiable dns ds classe qui héritent 
 final class application{

    public function executerApplication(){

        return "je fonctionne"; 
    }
}

// cst 1 class que l on peut instancier (contraiterement à abstract)
$app = new Application;
echo $app->executerApplication() . '<br>'; 

class Application2{
    // application2 est 1 class "normale" qui peut contenir 1 méthode final
    final function lancerApplication(){

        return "je fonctionne"; 
    }
}

// extention hérite de application
class Extention extends Application2{

    // la classe hérite de la méthode lancerApplication() (voir le get_class_methods ligne 35), mais je ne pourrai pas la modifier, la surcharger, la redéfinir
    public function lancerApplication(){
        
        return "je marche autrement"; 
    }
}

$ext = new Extention;
echo '<pre>'; print_r(get_class_methods($ext)); echo '</pre>';

?>