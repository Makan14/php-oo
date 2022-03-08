<?php 
// je déclare 1 class. par convention elle a le mm nom de fichier (hormis.class). Par convention 1 fichier a 1 seule class.  
// On ne declare pas plsrs classes dns 1 mm fichier.

class Panier{
    // je declare l attribut(ou propriété) $nbProduits
    // j initialise 1 protection de visibilité public 
    // en POO, propriété est équivalent à variable en procédural 
    public $nbProduits;

    // je declare la method ajouterPanier, visibilité public, qui retourne 1 chaine de caracteres
    //public peut etre utiliser en dehors de la class 
    public function ajouterPanier(){
        return "Le produit a bien été ajouté <br>";  
    }

    // je declare le niveau intermediaire entre public et private avc visibilité protected, qui retourne 1 chaine de caracteres
    //protected ne peut etre utiliser en dehors de la class
    protected function retirerDuPanier(){
        return "Le produit bien été retiré <br>";
    }

    // $this permet de remplacer 1 objet courant (ou en cours si l object n'a ps encore été crée)
    public function test(){
        // ma method protected fonct bien dns sa class
        return $this -> retirerDuPanier();
    }

    // je declare le niveau d invisibilité avc visibilité private qui retourne 1 chaine de caracteres
    private function afficherProduits(){
        return "Voici la page qui affiche ls produits <br>"; 
    }

    // ces 3 diff de visibilité vnt ns permettre de protéger (ou pas) le code 
    // je devrais dnc, selon ls cas de figure, utiliser 1 syntaxe spécifique pr utiliser ms propriétés ou méthodes selon leur visibilité

}

// je ne peux appeler ainsi, directement, 1 propriété ou 1 méthode de ma  classe.
// erreur undefined nbProduit
// echo $nbProduits;

// pr exploiter le contenu de ma class, je dois l instancier. instance = crée l objet
// je dois créer 1 objet de ma classe (se souvenir de $pdo = new PDO)   
$panier = new Panier;

// le var_dump de mn objet m indique que cst dnc bien 1 objet de ma  class Panier. Que lui a été attribué l identifiant #1. Qu'il contient 1 propriété. et que 7 propriété ne réçoit pr l instant aucune valeur (NULL)  
echo '<pre>'; var_dump($panier); echo '</pre>';

// mn pritn_r m indique que mn objet contient une méthode (qui à l'indice 0). Il ne peut me montrer ls 2 autres méthodes car elles ont 1 visibilité protected et private
echo '<pre>'; print_r(get_class_methods($panier)); echo '</pre>';

// pr affecter 1 valeur à la prpriété de l objet, je pointe avc -> vers 7 propriété et je lui affecte 1 valeur avc =
// j ai affecté la valeur de la propriété de  l objet, et ps celle de la classe. La classe ne doit ps etre modifiée. 
echo $panier->nbProduits = 5; 
// desormais sa valeur ne sera pls NULL, mais 5 
echo '<pre>'; var_dump($panier); echo '</pre>';

echo 'il ya ' . $panier -> nbProduits . ' produits dns le panier' . '<br>';

// je peux recup le contenu de 7 methode, en dehors de la classe car elle à 1 visibilité public.
// visibilité public permet d'y accéder dns la classe. Dns 1 classe qui hérite et en dehors de la classe  
echo $panier->ajouterPanier() . '<br>'; 

// je ne peux accéder en dehors de la classe (Panier) aux 2 prochaines méthodes.
// la visibilité protected permet d y acceder à l intérieur de la classe et dns 1 classe qui hérite 
// echo $panier -> retireDuPanier() . '<br>'; 
// la visibilité private ne permet d y acceder qu'à l intérieur de la classe (ps en dehors et pas dns 1 classe qui hérite)
// echo $panier -> afficherProduits() . '<br>'
// echo $panier -> retirerDuPanier() . '<br>'; 

// echo $panier -> afficherProduits() . '<br>'; 

//je crée 1 nvl objet de ma classe. Sn var-dump() m indique que aucune valeur a été affectée à $nbProduits. cst la preuve que la valeur 5 affectée tt à l heure a impacté la propriété de  l objet $panier, et non tte la classe Panier (sa propriété est resté innitialisée, mais tjrs sans aucune valeur)
$panier2 = new Panier;
echo '<pre>'; var_dump($panier2); echo '</pre>';

// extends me permet de dire que la classe Produit hérite de la classe Panier
class Produit extends Panier{
    public function test(){
        // ma method protected fonct bien dns sa class
        return $this -> retirerDuPanier();
        // celle d en dessous n existe pas elle est private 
        // return $this -> afficherProduits();
    } 
}


?>