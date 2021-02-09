<?php

include __DIR__.'/functions.php';
include __DIR__.'/Article.php';

if (isset($_POST['btn-valider']))
{
    $article = recupererDonneesDepuisFront();
    var_dump($article);
}

$tableau = recupererTableProduitEnTableauPhp();

include __DIR__.'/index.html.php';

?>