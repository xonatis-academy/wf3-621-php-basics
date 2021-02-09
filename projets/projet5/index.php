<?php

include __DIR__.'/functions.php';
include __DIR__.'/Article.php';

$tableau = [];

$connection = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
$resultat = $connection->query('SELECT * FROM projet5_produits');
while ($ligne = $resultat->fetch())
{
    $article = creerHydraterArticle($ligne);
    array_push($tableau, $article);
}

include __DIR__.'/index.html.php';

?>