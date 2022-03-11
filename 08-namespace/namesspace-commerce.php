<?php 
// 1er maniére de déclarer 1 namespace la pls habituelle
namespace Commerce1;

// seconde manière de déclarer 1 namespace, mois utilisée, avc ds accolades, puis à lintérieur tt le code concerné par sn namespace
// --------------------------------------------------------
// namespace Commerce1{

//     class Boutique{

//     }


// }
// -----------------------------------------------------------
// class Commande qui appartient au namespace Commerce1
class Commande{

    public $nbCommandes = 3;

}

// declaration d1 second namespace, je ne suis plus dns celui de Commerce1
// normalement, on ne déclare ps 2 namespace dns 1 mm fichier (comme on ne declare pas 2 classes dns 1 mm fichier)
// mais, pr les besoins de ce test, pr aller pls vite, je ne vais pas respecter 7 convention 
namespace Commerce2;

class Produit{

    public $nbProduits = 22;

}

// declaration d1 3eme namespace 
namespace Commerce3; 

class Panier{

    public $nbProduitsPanier = 4;

}

// 7 class a le mm nom que celle qui est dns le namespace Commerce2, mais cela ne pose pas de problèmes. Tant qu elles ne snt ps declaré dns  le mm namespace
class Produit{

    public $nbProduits = 5;

}




?>