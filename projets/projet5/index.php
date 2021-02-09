<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/functions.php';
include __DIR__.'/Article.php';

if (isset($_POST['btn-valider']))
{
    $cheminDuFichier = enregistrerFichierSoumis();
    $article = recupererDonneesDepuisFront();
    insererDansLaBase($article);
}

$tableau = recupererTableProduitEnTableauPhp();

include __DIR__.'/index.html.php';

?>