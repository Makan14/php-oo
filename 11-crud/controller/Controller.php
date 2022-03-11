<?php

namespace controller;

class Controller{

    // propriété privée qui servira de lien entre ce qui sera codé dans la class EntityRepository et la class Controller
    // elle servira par exemple a récupérer toutes les données qui serviront à se connecter a notre BDD
    // 1 fois la class EntityRepository instanciée elle sera 1 objet de 7 class, permettant de recup ses propriétés comme méthodes  
    private $dbEntityRepository; 

    // constructeur de la class Controller qui va instancier la class EntityRepository et créer dnc 1 objet dbEntityRepository qui ns servira à recup ttes ls propriétés et méthodes de la class EntityRepository
    public function __construct(){
        // echo "Instanciation de la classe Controller ok"; 

        // je crée 1 objt dbEntityRepository de ma class EntityRepository (en passant par sn namespace pr qu elle soit disponible)
        // pr etre l objet de la class EntityRepository 
        $this->dbEntityRepository = new \model\EntityRepository;
    }

    // 7 méthode va permettre de gérer l action de l utilisateur 
    // 7 utilisateur voudra t-il ajouter 1 employé ? Voir la fiche d 1 employé ? Supprimer sa fiche etc..
    // le controller avc 7 méthode va faire le pivot entre l action du user (en front sur ls vues) et les requetes dnt je vais avoir besoin, codée dns EntityRepository  
    public function handleRequest(){

        // condition ternaire pr vérifier si  1 donnée à transiter dns l URL. Si cst TRUE, je déclare 1 variable $choixUser qui va contenir 7 valeur recup dns l URL 
        $choixUser = isset($_GET['choixUser']) ? $_GET['choixUser'] : NULL ;
        // if(isset($_GET['choixUser'])){
        //     $choixUser = $_GET['choixUser']; 
        // }

        try{

            // si le user veut add ou modif la fiche d1 employé 
            if($choixUser == 'add' || $choixUser == 'update'){
                // je coderais 1 méthode save()
                $this->save($choixUser); 
                // je coderais 1 méthode save() 

                // si le user veut voir la fiche d1 seul employé
            }elseif($choixUser == 'select'){
                // je coderais 1 méthode select()
                $this->select();

                // si le user veut supp la fiche d1 seul employé
            }elseif($choixUser == 'delete'){
                $this->delete();
                // je coderais 1 méthode delete()

            }else{
                $this->selectAll();  
            }

        }

        catch(\Exception $erreur){

            echo "Impossible de recup le contenu du fichier xml" . $erreur->getMessage() . "<br> il ya une erreur à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . '<br>';
        }
    }

    // méthode render va gérer l affichage sur mn site
    // elle va gérer trois parametres:
    // le layout: cst l affichage global de mon site, ttes ls pages en auront besoin. 
    // les templates: ça sera l affichage particulier pr chaque page. Ils trouveront leur place dns le layout global
    // Le contenu qui sera formé de diverses données. Comme dns l exemple de l affichage d un tableau. On recup ds données en BDD pr les afficher dns leur template 
    public function render($layout, $template, $parameters = array()){

        // extract est 1 fonction prédéfinie qui permet d extraire ds données d1 tableau sans passer par le nom du tableau puis crocheter à l indice voulu.
        // Exemple: $parameters['prenom'] deviendra $prenom. $parameters['nom'] deviendra $nom etc.. 
        extract($parameters); 

        // mise en place d1 procédure pr send ls diverses infos sur 1 page.
        // je dois dnc send 1 layout, 1 template et ds données. Comme ttes ls infos ne s affichent pas en mm temps (en tant que développeur, pas pr l utilisateur. Pour ce dernier, tt s affichera en mm temps)

        // ce processus de mise en mémoire commence avc ob start 
        // je fais 1 require once pr recup le template dnt j aurais besoin, pr l insérer dns le layout gabarit 
        ob_start();
        require_once("view/$template");
        // comme ce template ne va pas s afficher en mm temps que mon layout, je le conserve dns 1 variable ($content) 
        $content = ob_get_clean();

        // je recommence le processus de mise en mémoire pr le layout 
        ob_start();
        // je fais aussi appel à require once pr le recup dns le dossier view. Par contre, pas besoin pr lui de le conserver dns 1 variable, il sera déployé en premier, immédiatement
        require_once("view/$layout"); 

        // je fais 1 return avc la fonction prédefinie ob end flush pr libérer 7 affichage sur le navigateur.
        // cst la fin de ce  processus de mise en mémoire de divers éléments nécessaires à l affichage de ma page 
        return ob_end_flush(); 
    }

    // méthode qui va permettre l affichage du tableau regroupant ts ls employés
    public function selectAll(){
        
        // echo "Méthode selectAll() | Affichage de ts ls employés";
        // $resultat = $this->dbEntityRepository->selectAllEntityRepo(); 
        // echo '<pre>';
        // print_r($resultat);
        // echo '</pre>';

        // j utilise ma méthode render()
        // je renseigne ls arguments dnt elle à besoin, cst à dire le nom du layout qu elle doit utiliser, le nom du template qu elle doit utiliser
        // En dernier ss forme de tableau, différentes données. Je nomme 1 indice 
        // je peux en déclare autant que je veux. Autant que nécessaire  
        $this->render('layout.php', 'affichage-employes.php', [

            'title' => 'Affichage de tous les employés', 
            'data' => $this->dbEntityRepository->selectAllEntityRepo(),
            'fields' => $this->dbEntityRepository->getFields() 

        ]);
 
    }

    // méthode qui va permettre l affichage de la fiche d1 seul employé
    public function select(){

        echo "méthode select() | affichage d1 seul employé"; 
    }

    // méthode qui va permettre l affichage du formulaire d ajout ou de modification de la fiche d un employé
    public function save(){

        echo "méthode save() | affichage de formulaire d ajout ou modification"; 
    }

    // méthode qui va permettre la suppression de la fiche d1 employé (démissionné, retraite etc..)
    public function delete(){

        echo "méthode delete() | suppression de la fiche employé"; 
    }

}