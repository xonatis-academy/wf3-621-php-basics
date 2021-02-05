<?php

class Produit
{
    public $nom;
    public $prix;
    public $image;
}

$tableau = [];

// On se connecte a la base de données
$connection = new PDO('mysql:host=challenge.xonatis.academy;dbname=wf3_621', 'wf3_621', 'tropbien');
// On lance une requete SQL vers la base de données
$resultat = $connection->query('SELECT * FROM michael_projet4_produits');
// Pour chaque ligne
while ($ligne = $resultat->fetch())
{
    // On crée un produit
    $produit = new Produit();
    $produit->nom = $ligne['nom'];
    $produit->prix = $ligne['prix'];
    $produit->image = 'https://via.placeholder.com/150';

    // On ajoute le produit au tableau pour qu'il soit visible à l'affichage
    // Synonyme : $tableau[] = $produit;
    array_push($tableau, $produit);
}

include __DIR__.'/index.html.php';

?>