<?php
class Article
{
    public $nom;
    public $prix;
    public $image;
}

// 1. Envoyer une requete SQL
$tunnel = new PDO('mysql:host=challenge.xonatis.academy;dbname=wf3_621', 'wf3_621', 'tropbien');
$table = $tunnel->query('SELECT * FROM michael_projet5_produits');

// 2. Transformer la table en $tableau
$tableau = [];
while ($ligne = $table->fetch())
{
    $article = new Article();

    $article->nom = $ligne['nom'];
    $article->prix = $ligne['prix'];
    $article->image = $ligne['image'];

    array_push($tableau, $article);
}

// 3. Afficher le tableau
// avec un include
?>