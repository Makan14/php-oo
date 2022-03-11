<?php  

namespace model;

// entity représente 1 table sql (table en BDD)
// repository représente ls class qui vnt contenir ls diff requetes dnt aura besoin le site 
class EntityRepository{

    // propriété privée qui va stocker tt ls infos liées à la connexion avc la BDD
    private $pdo;

    // propiété public qui permettra de stocker le nom de la table dnt on aura besoin pr faire nos requetes 
    public $table;

    // getPdo est 1 methode qui va permettre de recup ls infos stckées dns la private $pdo au dessus
    public function getPdo(){

        // elle va d abord verifier si on n est pas connecté (!this->pdo ..ne pointe pas vers la propriété $pdo)
        if(!$this->pdo){
            // dns ce cas là, on va devoir se connecter à la BDD 
            // je vais tester la connexion à ma BDD dns 1 try/catch 
            // cela me permettra de cibler + vite pq je n ai pas réussi à me connecter à la BDD
            try{
                $xml = simplexml_load_file('../app/config.xml');
                echo '<pre>';
                    print_r($xml);
                echo '</pre>';
            }

            // si la connexion ne réussit pas, je recup 1 msg dns le bloc catch ?
            // je recup 1 erreur de type Exception et je pourrai recup diverses infos  (telles que le nom du fichier, le numéro de la ligne ou le bug s est produit etc..)
            // je mets 1 anti slash devant Exception, sinn il le reconnait pas. Elle ne se trouve pas dns sn namespace dnc il ne la reconnait pas
            // avc le \, je retourne dns l espace global, ou elle sera reconnue 
            catch(\Exception $erreur){

            }
        }
        // si on est déjà connecté (le else), alors on va retourner ls infos contenus dns $pdo 
        return $this->pdo;
    }

}

$et = new EntityRepository;
$et->getPdo();


?>