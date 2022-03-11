<?php 

namespace Général;

// require_once pr importer le contenu de l autre fichier
require_once('namesspace-commerce.php');

// use me sert à importer le contenu du ou des namespaces inclus dns le fichier appelé avc le require_once 
use Commerce1, Commerce2, Commerce3;

// pr savoir dns quel namespace je me trouve, voici 1 constante magique:
// echo __NAMESPACE__;

// la syntaxe ci dessous ne vas pas fonctionner car la class PDO n existe pas dns le namespace Général 
// $pdo = new PDO('mysql:host=localhost;dbname=makan', 'root', '');
// mettre 1 antislash pr sortir du namespace actuel que la bdd soit dns le namespace global
$pdo = new \PDO('mysql:host=localhost;dbname=makan', 'root', ''); 

// pr instancier la class Commande
$commande = new Commerce1\Commande;
echo '<pre>'; var_dump($commande); echo '</pre>';

// j instancie mes 3 autres class
$produit = new Commerce2\Produit;
echo '<pre>'; var_dump($produit); echo '</pre>';

$panier = new Commerce3\Panier;
echo '<pre>'; var_dump($panier); echo '</pre>';

$produit = new Commerce3\Produit;
echo '<pre>'; var_dump($produit); echo '</pre>';


?>