<?php 

class A {

    public function test1(){

        return "j affiche test1";
    }

}

class B extends A{

    public function test2(){

        return "j affiche test2";
    }

}

class C extends B {

    public function test3(){

        return "j affiche test3"; 
    }

}

// B hérite de A et C hérite de B. Je veux savoir si C va hériter de A par répercution (via B)
// j instancie ma class C
$c = new C;
// je fais 1 get class methods pr voir quel methode $c il contient
echo '<pre>'; print_r(get_class_methods($c)); echo '<pre>';

// affichage pls conventionnel
echo $c->test1() . '<br>';
echo $c->test2() . '<br>';
echo $c->test3() . '<br>';


?>