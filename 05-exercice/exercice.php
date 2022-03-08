<?php 

/*
------------------------------
| Voiture |
------------------------------
| $litresEssence |
------------------------------
| setLitresEssence |
------------------------------
| getLitresEssence |
------------------------------
------------------------------
| Pompe |
------------------------------
| $litresEssence |
------------------------------
| setLitresEssence |
------------------------------
| getLitresEssence |
------------------------------
| donnerLitresEssence |
------------------------------
1 Créer voiture1
2 Lui donner de l'essence (5 litres)
3 Afficher cette quantité
4 Créer pompe1
5 Lui donner de l'essence (500 litres)
6 Afficher cette quantité
7 La pompe donne 50 litres à la voiture
8 Afficher la nouvelle quantité d'essence dans la voiture
9 Afficher la nouvelle quantité d'essence dans la pompe
10 Faire en sorte que le réservoir de la voiture ne puisse contenir plus de 50
litres
*/


// class Voiture{

//     private $litresEssence;

//     public function setLitresEssence($newLitresEssence){

//         $this->litresEssence = $newLitresEssence;

//     }

//     public function getLitresEssence(){
      
//         return $this->litresEssence;
//     }


// }

// $voiture1 = new Voiture;
// $voiture1->setLitresEssence(5);
// echo 'je mets ' . $voiture1->getLitresEssence() . ' dns ma voiture <br>'; 

// class Pompe extends Voiture{


// }

// $pompe1 = new Pompe;
// $pompe1->setLitresEssence(500);
// echo 'je mets ' . $pompe1->getLitresEssence() . ' dns ma voiture'; 

class Voiture{

    // propriété private qui va necessiter de coder les setter et getter
    private $litresEssence;

    // le setter reçoit en argument une valeur (le nombre de litres d'essence)
    public function setLitresEssence($litres){
        // si la valeur reçue est validée (avec un if que l'on a pas codé), alors cette valeur va aller affecter la propriété de l'objet $litresEssence
        $this->litresEssence = $litres;
    }

    // le getter pour récupérer la valeur stockée dans ^litresEssence
    public function getLitresEssence(){
        // pour récupérer la valeur, je pointe avec $this vers la propriété de l'objet $litresEssence
        return $this->litresEssence;
    }

}

// la classe pompe hérite de la classe Voiture
class Pompe extends Voiture{

    // dns 7 methode, qui appartient à la class Pompe, je donne 2 arguments 
    // le 1er cst le nom de la class (Voiture) dnt sera issu l objt a relier ($voiture). Le second argument, $vehicule, sera le représentant de cet 
    public function donnerLitresEssence(Voiture $vehicule){
        // calcul pr avoir combien de litres d essences sernt send dns le reservoir de l objt voiture (représenté par $vehicule)
        // $this représente l objt en cours de la class. Je suis dns la class Pompe, $this représente dnc l objt $pompe
        // je fais en 1er appel a setLitresessence pr modifier la valeur du nombre de litres dns la pompe
        // pr la modifier je dois savoir combien il ya (je le sais avc sn getter, cst 500)
        // je vais dnc soustraire aux 500 litres actuels, ce que je dois donner au reservoir de la voiture.
        // Ce que je donne au reservoir de la pompe , cst 50 litres (pr faire le plein), ce qu il ya déjà dns le reservoir (pr qu il ne déborde pas). je sais ce qu il ya dns la voiture grace a sn getter (5 litres).
        // ceci me donnera le calcul suivant: 500 litres - (50 litres - 5 litres)
        // 500 litres - 45 qui me laisse dns le reservoir de la pompe 455    
        //  jappel l objt courant de la class $pompe
        $this->setLitresEssence($this->getLitresEssence() - (50 - $vehicule->getLitresEssence()));  
                                                                                //500 
        // calcul pour faire le plein du reservoir de la voiture 
        // je fais appel à $vehicule qui représente m'objet $voiture
        // je passe par son setter pour modifier la valeur contenu dans le reservoir de la voiture
        // pour savoir combien de litres je dois, je peux envoyer dans le reservoir, je dois savoir au préalable combien il y a dans le reservoir
        // je le sais avec son getter (5)
        // a présent, je sais que je peux envoyer 50 litres, moins ce qu'il ya déjà dans le reservoir (5 litres)
        // 50 - 5 = 45 litres
        $vehicule->setLitresEssence($vehicule->getLitresEssence() + (50 - $vehicule->getLitresEssence())); //5 litres  + (50 - 5 litres) = 45   
        // 5 litres       + (50 - 5 litres) = 45
        // var_dump pour afficher ce que contient $vehicule
        echo '<pre>'; var_dump($vehicule);  echo '</pre>';  
        
        echo $this->getLitresEssence();
    }

}

// je crée un objet $voiture, de ma classe Voiture. c'est une instance de ma classe Voiture
$voiture = new Voiture;
// j'execute ma méthode setLitresEssence en lui donnant en argument le nombre de litres d'essence
$voiture->setLitresEssence(5);
// j'affiche cette même valeur en executant ma méthode
echo 'Ma voiture a dans son reservoir ' . $voiture->getLitresEssence() . " litres d'essence <br>";

$pompe = new Pompe;
$pompe->setLitresEssence(500);
echo 'Ma pompe a dans son reservoir ' . $pompe->getLitresEssence() . " litres d'essence <br>";

// je reli mes 2 objts
$pompe->donnerLitresEssence($voiture);


?>