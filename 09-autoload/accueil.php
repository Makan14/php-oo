<?php 

// require_once('A.class.php'); 
// require_once('B.class.php');
// require_once('C.class.php');
// require_once('D.class.php');

// je n'ai plus besoin que d'un seul, celui de autoload.php, car il a automatisé la création des require_once
// je l'appelle lui, il me récupère tous les autres 
require_once('autoload.php');

// ttes mes class snt reconnus grace a 1 seul require once 
$a = new A;
$b = new B;
$c = new C;
$d = new D;

echo '<pre>'; var_dump($a); echo '</pre>'; 
echo '<pre>'; var_dump($b); echo '</pre>'; 
echo '<pre>'; var_dump($c); echo '</pre>'; 
echo '<pre>'; var_dump($d); echo '</pre>'; 


?>