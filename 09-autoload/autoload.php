<?php 

// je déclare 1 méthode qui va prendre 1 argument 
function inclusionAuto($nomDeClasse){
    // le require once ci dessous me permet de recup le fichier ou est declaré la class A, pr effacer l erreur uncaught error: Class "A" not found 
    // require_once('A.class.php');

    // le require once ci dessous de manière dynamique de recup ts ls noms de fichiers (stockés par spl_autoload_register et send dns l argument $nomDeClasse)
    require_once($nomDeClasse . '.class.php');

    // je fais un var dump de largument $nomDeClasse. Je vois qu il a bien receptionné la lettre A 
    // echo '<pre>'; var_dump($nomDeClasse); echo '</pre>'; 
    echo "ma fonction cst bien executer <br>";
}

//spl_autoload_register s execute automatiquement qund elle verra le mot new. Elle recup ce qu'il ya apres new (Vehicule) pr l envoyer dns l argument $nomDeClass 
//  s executera dès que 1 objt est installé (dès qu elle lit le mot new dns notre projet)
// stocker en mémoire tt ce qui suit le mot new (dns cet exemple, la lettre A, mais cela peut etre 1 nom de classe pls long, 1 namespace + sa class etc..) 
// je donne en argument a spl_autoload_register le nom de ma fonction
// ainsi ma fonction va récup dns sn argument ce qu a stocké spl_autoload_register après le mot new.
spl_autoload_register('inclusionAuto'); 

// $a = new A;  






?>