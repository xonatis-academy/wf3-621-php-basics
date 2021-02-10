<?php

define('DOSSIER_UPLOADS', 'uploads');

/**
 * 
 * @param
 * @return 
 */
function convertirLigneBddEnArticle($ligneDeBdd)
{
    $article = new Article();
    $article->id = $ligneDeBdd['id'];
    $article->nom = $ligneDeBdd['nom'];
    $article->prix = $ligneDeBdd['prix'];
    $article->image = $ligneDeBdd['image'];
    return $article;
}

/**
 * 
 * @param
 * @return 
 */
function recupererTousLesArticles()
{
    $tableau = [];
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->query('SELECT * FROM projet5_produits');
    while ($ligne = $resultat->fetch())
    {
        $article = convertirLigneBddEnArticle($ligne);
        array_push($tableau, $article);
    }
    return $tableau;
}

/**
 * 
 * @param
 * @return 
 */
function recupererUnSeulArticleAvecId($id)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $tunnel->prepare('SELECT * FROM projet5_produits WHERE id = ?');
    $statement->execute([$id]);
    $ligne = $statement->fetch();

    $article = convertirLigneBddEnArticle($ligne);
    return $article;
}

/**
 * 
 * @param
 * @return 
 */
function verifierPayloadPourCreerArticle()
{
    if (!isset($_POST['product-name']) || $_POST['product-name'] === '')
    {
        return "Vous devez spécifier un nom de produit";
    }

    if (!isset($_POST['product-price']) || $_POST['product-price'] === '')
    {
        return "Vous devez spécifier un prix de produit";
    }

    if (!is_numeric($_POST['product-price']))
    {
        return "Le prix doit être numérique";
    }

    if (!isset($_FILES['product-photo-file']) || $_FILES['product-photo-file']['name'] === '')
    {
        return "Vous devez choisir un fichier";
    }

    if (!in_array($_FILES['product-photo-file']['type'], ['image/webp', 'image/png', 'image/png']))
    {
        return "Le type de fichier " . $_FILES['product-photo-file']['type'] . " n'est pris en charge";
    }

    return null;
}

/**
 * 
 * @param
 * @return 
 */
function determinerCheminFichierEnregistre()
{
    $timestamp = strval(time());
    $extension = pathinfo(basename($_FILES["product-photo-file"]["name"]), PATHINFO_EXTENSION);
    $chemin = DOSSIER_UPLOADS . '/' . $timestamp . '.' . $extension;
    return $chemin;
}

/**
 * 
 * @param
 * @return 
 */
function enregistrerFichierEnvoye()
{
    $chemin = determinerCheminFichierEnregistre();
    move_uploaded_file($_FILES["product-photo-file"]["tmp_name"], $chemin);
    return $chemin;
}

/**
 * 
 * @param
 * @return 
 */
function convertirPayloadEnArticle()
{
    $image = enregistrerFichierEnvoye();
    $article = new Article();
    $article->nom = $_POST['product-name'];
    $article->prix = $_POST['product-price'];
    $article->image = $image;

    return $article;
}

/**
 * 
 * @param
 * @return 
 */
function insererDansBdd($article)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->prepare("INSERT INTO projet5_produits(nom, prix, image) VALUES(?, ?, ?)");
    $resultat->execute([$article->nom, $article->prix, $article->image]);

    return null;
}

/**
 * 
 * @param
 * @return 
 */
function supprimerDansBdd($article)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->prepare("DELETE FROM projet5_produits WHERE id = ?");
    $resultat->execute([$article->id]);

    return null;
}


?>