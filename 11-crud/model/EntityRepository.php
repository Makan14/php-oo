<?php

namespace model;

// entity représente une table sql (table en BDD)
// repository représente les classes qui vont contenir les différentes requetes dont aura besoin le site
class EntityRepository{

    // propriété privée qui va stocker toutes les infos liées à la connexion avec la BDD
    private $pdo;

    // propriété public qui permettra de stocker le nom de la table dont on aura besoin pour faire nos requetes
    public $table;

    // méthode qui va permettre de récupérer les informations stockées dans la private $pdo au dessus
    public function getPdo(){

        // elle va d'abord vérifier si on n'est pas connecté (!$this->pdo ...$this ne pointe pas vers la propriété $pdo)
        if(!$this->pdo){
            // Dans ce cas là, on va devoir se connecter à la BDD
            // je vais tester la connexion à ma bdd dans un try / catch
            // cela me permettra de cibler + vite pourquoi je n'ai pas réussi à me connecter à la BDD 
            try{
                $xml = simplexml_load_file('app/config.xml'); 
                // echo '<pre>'; print_r($xml);echo '</pre>'; 
                // je recup la valeur de table dns config.xml pr  l affecter à ma public propriété table (en pointant vers elle avc $this)
                $this->table = $xml->table; 

                try{
                    $this->pdo = new \PDO("mysql:host=$xml->host; dbname=$xml->dbname", "$xml->user", "$xml->password", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                    // echo "connexion etablie"; 
                }

                catch(\PDOException $erreur){
                    echo "Erreur BDD inconnue / " . $erreur->getMessage() . "le prbleme vient pt-être du fichier config.xml. Vérifiez ls données contenues. <br> problème à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . '<br>';  
                }
            }
            // si la connexion ne réussit pas, je récupère un message dans le bloc catch
            // Je récupère une erreur de type Exception et je pourrai récupérer diverses informations (telles que le nom du fichier, le numéro de la ligne ou le bug s'est rpoduit etc...)
            // je mets un anti slash devant Exception, sinon, il ne la reconnait pas. Elle ne se trouve pas dans son namespace, donc il ne la reconnait pas
            // avec le \, je retourne dans l'espace global, ou elle sera reconnue
            catch(\Exception $erreur){
                echo "Impossible de recup le contenu du fichier xml" . $erreur->getMessage() . "<br> il ya une erreur à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . '<br>';

            }
        }
        // si on est déjà connecté (le else), alors on va retourner les informations contenues dans $pdo
        return $this->pdo; 

    }

    public function selectAllEntityRepo(){

        // on pointe vers notre méthode getPdo
        $data = $this->getPdo()->query("SELECT * FROM $this->table"); 

        // equivalent à la syntaxe php procedural ($this->getPdo = $pdo en procedural)
        // $data = $pdo->query("SELECT * FROM employe");

        // after avoir fait le query je fais obligatoirement le fetch pr recup le resultat du query(ligne 55)
        $afficheTousEmployes = $data->fetchAll(\PDO::FETCH_ASSOC);
        // je retourne le résultat 
        return $afficheTousEmployes;
    }

    public function getFields(){

        $data = $this->getPdo()->query("DESC " . $this->table);
        $afficheEntetes = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $afficheEntetes; 
    }

}

$et = new EntityRepository;
$et->getPdo();