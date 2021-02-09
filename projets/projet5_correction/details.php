<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/functions.php';
include __DIR__.'/Article.php';

if (!isset($_GET['id']))
{
    die();
}

$article = recupererUnSeulArticleAvecId($_GET['id']);

include __DIR__.'/details.html.php';

?>