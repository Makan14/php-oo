<?php  

class Panier {
    
    public $nbProduits;

    public function ajouterPanier(){
        return "le produit a bien été ajouté <br>";
    }

    protected function retirerDuPanier(){
        return "le produit a bien été retiré <br>";
    }

    public function test(){
        return $this -> retirerDuPanier();
    }

    private function afficherProduits(){
        return "voici la page qui affiche ls produits <br>";
    }


}

$panier = new Panier;

echo '<pre>'; var_dump($panier); echo '<pre>';

echo '<pre>'; print_r(get_class_methods($panier)); echo '<pre>';

echo $panier->nbProduits = 5;

echo '<pre>'; var_dump($panier); echo '<pre>';

echo 'il ya ' . $panier->nbProduits . ' produits dns le panier' . '<br>';

echo $panier->ajouterPanier() . '<br>';

$panier2 = new Panier;
echo '<pre>'; var_dump($panier2); echo '<pre>';

class Produit extends Panier{
    public function test(){
        return $this->retirerDuPanier();
    }
}



?>