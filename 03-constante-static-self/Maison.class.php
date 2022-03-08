<?php  

class Maison{

    // 1 propriété nn static appartient à l objet
    public $couleur = 'blanc';
    // la propriété static appartient à la class et touche tt ls objets
    public static $espaceTerrain = "500m²";

    private static $nbPieces = 7;

    // syntaxe pr déclare 1 constante en procédural
    // define('URL', 'sa valeur');

    // syntaxe pr déclarer 1 constante en POO
    // utilisation du mot clé const, suivi du nom en majuscule(convention), puis lui donne sa valeur;
    // 1 constante appartient automatiquement à sa classe 
    const HAUTEUR = '10m';

    // je fais 1 getter pr recup sa valeur mais pas besoin d 1 setter bcar 1 valeur est déjà affectée
    // le getter sera aussi static 
    public static function getNbPiece(){

        // j utilise self car cst 1 propriété qui appartient à la classe, et nn à l objt 
        return self::$nbPieces; 
    }

}

// j instancie la class, l objet aura par défaut la couleur blanc
$maison = new Maison;
echo '<pre>'; var_dump($maison); echo '</pre>';

// pr changer la couleur
$maison2 = new Maison;
$maison2->$couleur = 'bleu';
echo '<pre>'; var_dump($maison2); echo '</pre>';

// 3eme objts je ne précise rien, sa couleur sera blanc
$maison3 = new Maison;
echo '<pre>'; var_dump($maison3); echo '</pre>';

// j apelle la class Maison et la propriété $espaceTerrain avc Maison::$espaceTerrain
echo "l'espace par défaut est de " . Maison::$espaceTerrain . '<br>';

// je modifie la valeur de la proriété $espaceTerrain 
Maison::$espaceTerrain = '1000 m²';
echo "l'espace terrain par defaut est désormais de " . Maison::$espaceTerrain . '<br>';

echo "le nombre de piece par defaut est de " . Maison::getNbPiece() . '<br>';

// echo $maison3->espaceTerrain . '<br>'; 
// va générer un erreur car je pointe sur une propriété qui appartient à l'objet' avec une classe

// echo Maison::$couleur . '<br>';
// ces deux prochaines ne vont pas générer de message d'erreurs (mettre en commentaires les deux précédents affichage, sinon, il sbloquent le code, vous ne pourrez pas tester)*

echo $maison3->getNbPiece() . '<br>';
// elles devraient générer une erreur car je pointe avec un objet sur des méthodes et propriétés static, qui appartiennt à la classe.
// C'est une trop grande permissivité de PHP. Il aurait du les signaler en tant qu'erreurs comme les deux autres

echo $maison3::$espaceTerrain . '<br>';
// Remarque: lorsque je pointe avec un objet vers une propriété $maison3->couleur, je ne dois pas mettre le signe $
// si je pointe avec ma classe vers sa propriété Maison::$espaceTerrain, je dois mettre le signe $ 

// syntaxe pr recup la valeur de la constante, qui appartient obligatoirement à sa classe (ps besoin de préciser static) 
echo 'Hauteur ss-plafond par défaut: ' . Maison::HAUTEUR . '<br>'; 

?>