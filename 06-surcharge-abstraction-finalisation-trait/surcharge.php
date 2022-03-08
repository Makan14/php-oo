<?php  

class A{

    // qlqs propriété protected 
    protected $nombre1;
    protected $nombre2;
    protected $nombre3;

    // 1 method simple qui retourne 1 valeur
    public function calcul(){

        return 10; 
    }

}

// class B qui hérite de la class A 
class B extends A{

    // je surcharge la méthode calcul héritée de la class A
    // j ai besoin de l affiner, comparé a sn comportement initial 
    public function calcul(){
        // pr recup la valeur retourné par la méthod caclcul(10) dns la class parent en utilisant la syntaxe parent::calcul()
        // je l'affecte à 1 variable $nb
        // ici le nom de la méthode doit être similaire a celui de la méthode
        $nb = parent::calcul(); 

        // condition qui va tester la valeur contenue dns ma variable $nb
        // je ne mets ps d accolade pr ce if/else car dns leur bloc d instruction, il n ya qu 1 seule instruction
        // dns ce cas de figure, 7 syntaxe est possible 
        if($nb < 100){
            return "$nb est inf à 100"; 
        }else{
            return "$nb est sup à 100";
        }
    }

}


// j instancie ma class B 
$b = new B;
// get class method() pr voir ce que contient mn objt $b
echo '<pre>'; print_r(get_class_methods($b)); echo '<pre>';
// pr afficher le résultat de la fonction calcul (elle doit porter le nom de la méthode de la class, qui peut-être diff de celui de la méthode héritée de la class parent(A))  
echo $b->calcul(); 

?>