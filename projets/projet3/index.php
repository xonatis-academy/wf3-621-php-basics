<?php

class Article
{
    public $nom;
    public $prix;
    public $quantite;
}

$tableau;
// Si on trouve 'panier' dans les cookies, 
// on le récupère à la place de partir d'un tableau vide à chaque fois
if (isset($_COOKIE['panier']))
{
    $tableau = json_decode($_COOKIE['panier']);
}
else
{
    $tableau = [];
}

if (isset($_GET['btn-livre']))
{
    // on doit ajouter un livre dans le panier
    // on doit ajouter un livre dans le $tableau
    // on doit ajouter un article avec les propriétés d'un livre dans le $tableau
    // on doit ajouter un objet Article avec les propriétés d'un livre dans le $tableau
    $livre = new Article();
    $livre->nom = 'Livre';
    $livre->quantite = 1;
    $livre->prix = 12.50;

    array_push($tableau, $livre);
}

if (isset($_GET['btn-voiture']))
{
    $voiture = new Article();
    $voiture->nom = 'Voiture';
    $voiture->quantite = 1;
    $voiture->prix = 60000.0;

    array_push($tableau, $voiture);
}

if (isset($_GET['btn-moto']))
{
    $moto = new Article();
    $moto->nom = 'Moto';
    $moto->quantite = 1;
    $moto->prix = 20000.0;

    array_push($tableau, $moto);
}

$contenu = json_encode($tableau);

setcookie("panier", $contenu);

$total = 0;

include __DIR__.'/index.html.php';

?>