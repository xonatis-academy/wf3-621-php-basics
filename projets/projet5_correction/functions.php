<?php

define('DOSSIER_UPLOADS', 'uploads');

/**
 * convertirLigneBddEnArticle
 * @param ligneDeBdd : une ligne de la base de données
 * @return article : un nouvel article qui contient id, nom, prix et image de la ligne bdd correspondante
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
 * recupererTousLesArticles
 * @param rien
 * @return tableau : tableau d'articles qui contient id, nom, prix et image à partir de la table projet5_produits
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
 * recupererUnSeulArticleAvecId
 * @param id : un identifiant d'un article
 * @return article : l'article correspondant à l'id en question en base de données
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
 * verifierPayloadPourCreerArticle
 * @param rien
 * @return message : message d'erreur s'il manque quelque chose pour créer un article dans le payload, 
 * sinon s'il ne manque rien, ca retoure null
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
 * determinerCheminFichierEnregistre
 * @param rien
 * @return chemin : chemin d'un ficher dans le dossier, composé de l'heure courante et de l'extension du fichier envoyé
 */
function determinerCheminFichierEnregistre()
{
    $timestamp = strval(time());
    $extension = pathinfo(basename($_FILES["product-photo-file"]["name"]), PATHINFO_EXTENSION);
    $chemin = DOSSIER_UPLOADS . '/' . $timestamp . '.' . $extension;
    return $chemin;
}

/**
 * enregistrerFichierEnvoye
 * @param rien
 * @return chemin : chemin d'un ficher dans le dossier, composé de l'heure courante et de l'extension du fichier envoyé
 */
function enregistrerFichierEnvoye()
{
    $chemin = determinerCheminFichierEnregistre();
    move_uploaded_file($_FILES["product-photo-file"]["tmp_name"], $chemin);
    return $chemin;
}

/**
 * convertirPayloadEnArticle
 * @param rien
 * @return article : un article qui comporte nom, prix et image qui viennent du payload
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
 * insererDansBdd
 * @param article : un article à insérer dans la base de données
 * @return null
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
 * supprimerDansBdd
 * @param article : un article à supprimer dans la base de données
 * @return null
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