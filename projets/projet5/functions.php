<?php

function creerHydraterArticle($ligneDeBdd)
{
    $nouvelArticle = new Article();
    $nouvelArticle->nom = $ligneDeBdd['nom'];
    $nouvelArticle->prix = $ligneDeBdd['prix'];
    $nouvelArticle->image = $ligneDeBdd['image'];

    return $nouvelArticle;
}

function recupererTableProduitEnTableauPhp()
{
    $tableau = [];
    $connection = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $resultat = $connection->query('SELECT * FROM projet5_produits');
    while ($ligne = $resultat->fetch())
    {
        $article = creerHydraterArticle($ligne);
        array_push($tableau, $article);
    }
    return $tableau;
}

function recupererDonneesDepuisFront()
{
    $article = new Article();

    if (isset($_POST['product-name']))
    {
        $article->nom = $_POST['product-name'];
    }

    if (isset($_POST['product-price']))
    {
        $article->prix = $_POST['product-price'];   
    }

    $article->image = '';

    return $article;
}

function insererDansLaBase($article)
{
    $connection = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $resultat = $connection->prepare("INSERT INTO projet5_produits(nom, prix, image) VALUES(?, ?, ?)");
    $resultat->execute([$article->nom, $article->prix, $article->image]);

    var_dump($connection->errorinfo());

    return null;
}
?>