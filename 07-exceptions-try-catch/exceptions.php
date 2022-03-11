<?php  

// le but de la fonction recherche est de rechercher, dns 1 tableau (1er agrument attendu), 1 element (second agrument à lui fournir)
function recherche($tab, $element){

    // si le 1er argument n est ps 1 tableau, je génére 1 msg d erreur 
    if(!is_array($tab))
        // throw va permettre d envoyer le msg d erreur dns le bloc catch (que l on a pas encore codé)
        // la class Exception génére 1 msg de type particulier
        throw new Exception("ce n est pas 1 tableau");

    // si le tableau ne contient pas de données, je génére 1 autre msg d erreur 
    // à la place de sizeof, on aurait pu utiliser count()
    if(sizeof($tab) == 0) 
        throw new Exception("ce tableau ne contient pas de données"); 

    // si $tab représente bien 1 tableau et si il contient bien ds données, alors array_search va me retrouver 7 élément dns mn tableau me donner sn indice, que je conserve dns $position 
    $position = array_search($element, $tab);
    // je fais 1 return de $position pr récupérer l indice 
    return $position; 
    

}

$tableau = array(); 
$tabPersonnages = array('Mario', 'Bowser', 'Toad', 'Peach', 'Luigi', 'Yoshi');

// print r du second tableau, pr vérifier ls indices de nos personnages
echo '<pre>'; print_r($tabPersonnages); echo '</pre>';

// bloc try pt tester mn code
try{
    // je teste mn code et je vois si il respecte ls conditions de la fonction recherche
    // celui ci fonctionne, il me retourne l indice du personnage Toad 
    echo "Le personnage de Toad possède l indice " . recherche($tabPersonnages, 'Toad') . '<br>';
    // nouveau test avc le 1er tableau, $tableau.
    echo "Le personnage de Toad possède l indice " . recherche($tableau, 'Toad') . '<br>';
}

// bloc catch qui s execute si le try ne respecte pas ls conditions
catch(Exception $erreur){
    // malgré que le second test n a pas fonctionné je n ai pas reçu de msg d erreur 
    // si je fais 1 print r de $erreur je  maperçois que le msg d erreur codé à la ligne 15 a bien été récupérer dns l argument $erreur
    // je dois en fait codé 1 msg d erreur dns mn bloc catch pr récupérer celui de la ligne 15
    // echo '<pre>'; print_r($erreur); echo '</pre>'; 
    // echo '<pre>'; print_r(get_class_methods($erreur)); echo '</pre>'; 

    // avc le get class methods je vois que l objt $erreur a sa disposition 1 méthode pr récupérer le msg stocké (getMessage), recup la ligne ou l erreur a été commise getLine et recup le nom du fichier ou il ya l erreur (getFile)
    // je peux ainsi générer 1 msg pls précis (à mettre en forme dns le fichier style.css, en lui donnant par exemple 1 bgcolor rouge, centrant le texte, lui donner 1 font weight bold etc etc..) 
    echo "Erreur:" . $erreur->getMessage() . "<br> cela ne respecte pas le code à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . '<br>'; 
    
}

// je teste ma connexion à ma base de données dns try
try{
    // si elle réussi le echo du try va s afficher. 
    $pdo = new PDO('mysql:host=localhost;dbname=makan', 'root', '');
    echo "connexion établie avc la BDD"; 

} 

catch(PDOException $erreur){
    echo '<pre>'; print_r($erreur); echo '</pre>'; 
    echo '<pre>'; print_r(get_class_methods($erreur)); echo '</pre>'; 

    // si ma connexion echoue, ce msg ca s afficher, en me donnant la ligne ou j ai tenté de le faire, que je dvrai aller corriger 
    echo "Erreur BDD inconnue / " . $erreur->getMessage() . "<br> cela ne respecte pas le code à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . '<br>'; 

} 

?>