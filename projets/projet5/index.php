<?php

class Article
{
    public $nom;
    public $prix;
    public $image;
}

$tableau = [];

$connection = new PDO('mysql:host=challenge.xonatis.academy;dbname=wf3_621', 'wf3_621', 'tropbien');
$resultat = $connection->query('SELECT * FROM michael_projet5_produits');
while ($ligne = $resultat->fetch())
{
    $article = new Article();
    $article->nom = $ligne['nom'];
    $article->prix = $ligne['prix'];
    $article->image = $ligne['image'];

    array_push($tableau, $article);
}

include __DIR__.'/index.html.php';

?>