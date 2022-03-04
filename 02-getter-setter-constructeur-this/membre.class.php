<?php 

class Membre{

    // ces 2 propriétés snt private. Ce snt ls champs que vnt remplir ls utilisateurs, jre dois ls protéger pr que ls infos qui vnt transiter ne soient pas diff de ce que j attends 
    private $prenom;
    private $nom;

    // 7 methode va servir à controler ce qui va transmettre dns ls champs du formulaire. 
    // 1 setter sert de controleur en POO 
    // le nom que je lui donne n a pas d importance. Ce  n est ps 1 fonction prédéfinie. Mais par convention, 1 setter commencera par le mot set, suivi du nom du champs qu il controle 
    // 1 setter reçoit obligatoirement dns sa parenthèse 1 argument (la donnée qu il doit controler)  
    public function setPrenom($newPrenom){

        // condition qui va verifier si la donnée recue (mon argument/$newPrenom) est bien de type String 
        if(is_string($newPrenom)){
            // si la condition est verifiée, alors, grace à $this -> la propriété $prenom de l objet va recevoir la valeur véhiculée dns $newPrenom
            // $this représente tjrs l objet en cours (celui qui vient d etre crée, l instance de ma classe)
            // il pointe dnc avc -> pr atteindre la propriété de mon objet (celui en cours)
            $this -> prenom = $newPrenom;
        }else{
            // dns le cas ou la condition n est pas respectée, alors j affiche 1 msg d erreur à l utilisateur pr lui dire qu il doit ecrire autre chose 
            // ce msg est volontairement "moche". J'aurai pu faire comme en procédural, 1 msg beaucoup pls agréable à l affichage 
            // je ne fais que montrer 1 manière de générer 1 msg d erreur
            trigger_error('cela ne correspond ps à ce qui est attendu pr ce champ', E_USER_ERROR);  

        }
    }

    // getter recup la valeur que j affecte (la propriété prenom)
    public function getPrenom(){
        return $this -> prenom;
    }

    public function setNom($newNom){

        if (is_string($newNom)) {
            
            $this->nom = $newNom;
        }else{

            trigger_error("sdfgrf ", E_USER_ERROR);
        }
    }

    public function getNom(){

        return $this->nom;
    }

}

// j instancie ma class membre en créant 1 objet $membre
// $this va etre sn représentant dns la classe (ligne 20 de ce fichier)
$membre = new Membre;
// pr donner 1 valeur à la propriété $prenom de l objet, je dois utiliser la fonction setPrenom(). Je lui donne entre parenthèses, l argument qu elle attend obligatoirement. Sinon, erreur, le code ne s execute pas. Cet servira de valeur, si la condition est respectée (condition ligne 16) 

$membre -> setPrenom('Makan');
// var dump confirme que la valeur a bien affectée $prenom de l objet
echo '<pre>'; var_dump($membre); echo '</pre>'; 

// nvl instance de ma class, avc 1 nvl objet crée
$membre2 = new Membre;
// var dump qui indique que la valeur précédement envoyée n impacte que l objet $membre, et nn ps $membre2
$membre2 -> setPrenom('Makan');
echo '<pre>'; var_dump($membre2); echo '</pre>'; 

// echo $membre -> $prenom;
// il faut dnc passer par la method getPrenom qui va faire le trvail de recup de la valeur pr pouvoir  l afficher
echo 'mon prénom est ' . $membre -> getPrenom() . '<br>'; 

$membre3 = new Membre;
$membre4 = new Membre;

$membre3->setNom('Macalou');
$membre4->setNom('Moussa');
echo '<pre>'; var_dump($membre3); echo '</pre>'; 
echo 'mon nom est ' . $membre3->getNom() . $membre4->getNom(); echo '<br>'; 











?>