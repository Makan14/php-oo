<?php

class Etudiant{

    // propriété privée qui va necessiter de declarer ses setters et getters.
    // Pour chaque propriété privée je devrai le faire, en plus de controller l'envoi de données dans le setter
            // Aziz
    private $prenom;
    private $nom;

    // declaration du contructeur qui attend un argument.
    // Ce n'est pas obligé dans le cadre d'un constructeur. On peut ne donner aucun argument comme devoir en donner plusieurs.
    // un constructeur s'auto exécute dès que l'on instancie la class (crée un objet de cette classe)                       Aziz
    // le constrcteur permet de mettre plsrs argument dns 1 class
    public function __construct($newPrenom, $newNom){
    
        // cet affichage montre que mon constructeur s'est bien exécuté
                                                                    // Aziz
        echo "Durant l'instanciation, nous avons bien reçu la valeur $newPrenom et $newNom <br>";

        // le constructeur doit envoyer la donnée (contenue dans $argument) pour affecter la valeur dans le setter
                         // Aziz
        $this->setPrenom($newPrenom);
        $this->setNom($newNom);
    }
    // le setter reçoit la donnée, il la controle (avec if is_string, par exemple)
                               // Aziz
    public function setPrenom($newPrenom){
        // si le setter valide la donnée, il l'affecte à la propriété de l'objet $prenom
                        // Aziz
        $this->prenom = $newPrenom;
    }

    // le getter récupère la donnée dans la propriété de l'objet $prenom. Elle est désormais disponible pour etre affichée ou autre
    public function getPrenom(){
        return $this->prenom;
    }

    public function setNom($newNom){

        $this->nom = $newNom;
    }

    public function getNom(){

        return $this->nom;
    }


}

// instanciation de ma classe Etudiant, qui va prendre 2 ou 4 ou again pls d arguments (selon cer que attend le constructeur)
$etudiant = new Etudiant('Makan', 'Macalou'); 

// cela m'évite de coder toutes les lignes en-dessous, pour "alimenter" chaque propriété (et je pourrai avoir encore plus de propriétés dans une classe)
// $etudiant->setPrenom('Aziz');
// $etudiant->setNom('Tobbal');
// $etudiant->setAge(53);
// $etudiant->setMail('toto@gmail.com'); 

echo 'Je suis ' . $etudiant->getPrenom() . ' ' . $etudiant->getNom();

// un constructeur est une méthode magique, qui s'auto exécute, qui permet d'automatiser certaines taches.
// On peut le considérer comme un fichier init.php
