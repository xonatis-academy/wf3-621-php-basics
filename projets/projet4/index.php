<?php

class Produit
{
    public $nom;
    public $prix;
    public $image;
}

$tableau = [];

$connection = new PDO('mysql:host=challenge.xonatis.academy;dbname=wf3_621', 'wf3_621', 'tropbien');
$resultat = $connection->query('SELECT * FROM michael_projet4_produits');
while ($ligne = $resultat->fetch())
{
    $produit = new Produit();
    $produit->nom = $ligne['nom'];
    $produit->prix = $ligne['prix'];
    $produit->image = 'https://via.placeholder.com/150';

    $tableau[] = $produit;
}

include __DIR__.'/index.html.php';

?>