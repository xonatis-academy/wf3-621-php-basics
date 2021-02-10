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
        $article = convertirPayloadEnArticle();
        insererDansBdd($article);
    }
}

if (isset($_POST['btn-action']))
{
    if (isset($_POST['operation']) && isset($_POST['article-id']))
    {
        if ($_POST['operation'] === 'voir-article')
        {
            header('LOCATION: details.php?id='.$_POST['article-id']);
            die();
        }

        if ($_POST['operation'] === 'supprimer-article')
        {
            $article = recupererUnSeulArticleAvecId($_POST['article-id']);
            supprimerDansBdd($article);
        }
    }
}

$tableau = recupererTousLesArticles();

include __DIR__.'/index.html.php';

?>