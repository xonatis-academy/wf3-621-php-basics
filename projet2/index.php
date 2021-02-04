<?php
class ArticleSelectionne
{
    public $nom;
    public $prix;
    public $quantite;
}

$total = 1236;

$article1 = new ArticleSelectionne();
$article1->nom = 'Test test';
$article1->prix = 9999.0;
$article1->quantite = 12;

$article2 = new ArticleSelectionne();
$article2->nom = 'Testo';
$article2->prix = 11111.0;
$article2->quantite = 99;

$tableau = [
    $article1,
    $article2
];

include __DIR__.'/index.html.php';

?>