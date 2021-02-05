<?php
session_start();

class ArticleSelectionne
{
    public $nom;
    public $prix;
    public $quantite;
}

$total = 0;

$tableau;
if (isset($_SESSION['tableau_tou_bo']))
{
    $tableau = $_SESSION['tableau_tou_bo'];
}
else
{
    $tableau = [];
}

if (isset($_GET['btn-moto']))
// Si le paramètre 'btn-moto' est dans l'URL 
{
    // On crée un nouvel article vide
    $article = new ArticleSelectionne();

    // On renseigne les champs pour 1 moto
    $article->nom = 'Moto';
    $article->prix = 1234.50;
    $article->quantite = 1;

    // On ajoute l'article dans le tableau des articles
    $tableau[] = $article;
}

if (isset($_GET['btn-livre']))
// Si le paramètre 'btn-moto' est dans l'URL 
{
    // On crée un nouvel article vide
    $article = new ArticleSelectionne();

    // On renseigne les champs pour 1 moto
    $article->nom = 'Livre';
    $article->prix = 250.50;
    $article->quantite = 1;

    // On ajoute l'article dans le tableau des articles
    $tableau[] = $article;
}

if (isset($_GET['btn-voiture']))
// Si le paramètre 'btn-moto' est dans l'URL 
{
    // On crée un nouvel article vide
    $article = new ArticleSelectionne();

    // On renseigne les champs pour 1 moto
    $article->nom = 'Voiture de ouf';
    $article->prix = 5050.50;
    $article->quantite = 1;

    // On ajoute l'article dans le tableau des articles
    $tableau[] = $article;
}

for ($i = 0; $i < count($tableau); ++$i)
{
    // 1. On répère chaque article du tableau, pourquoi "chaque" ?? Ben parce que
    // la variable $i change voyons !
    $article_courant = $tableau[$i];

    // 2. Ben on calcule le prix total de l'article en cours
    // = quantite * prix
    $prix_total_du_produit = $article_courant->quantite * $article_courant->prix;

    // 3. On accumule le prix total de l'article dans la variable $total
    $total = $total + $prix_total_du_produit;
}

$_SESSION['tableau_tou_bo'] = $tableau;

include __DIR__.'/index.html.php';

?>