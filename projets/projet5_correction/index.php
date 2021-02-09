<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/functions.php';
include __DIR__.'/Article.php';

$messageErreur = null;

if (isset($_POST['btn-valider']))
{
    $messageErreur = verifierPayloadPourCreerArticle();
    if ($messageErreur === null)
    {
        enregistrerFichierEnvoye();
        $article = convertirPayloadEnArticle();
        insererDansBdd($article);
    }
}

$tableau = recupererTousLesArticles();

include __DIR__.'/index.html.php';

?>