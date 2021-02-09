<?php

function creerHydraterArticle($ligneDeBdd)
{
    $nouvelArticle = new Article();
    $nouvelArticle->nom = $ligneDeBdd['nom'];
    $nouvelArticle->prix = $ligneDeBdd['prix'];
    $nouvelArticle->image = $ligneDeBdd['image'];

    return $nouvelArticle;
}
?>