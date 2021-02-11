<?php

define('DOSSIER_UPLOADS', 'uploads');

/**
 * verifierPayloadPourCreerProduit
 * @param rien
 * @return message : message d'erreur s'il manque quelque chose pour créer un prduit dans le payload, 
 * sinon s'il ne manque rien, ca retoure null
 */
function verifierPayloadPourCreerProduit()
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

    if (!isset($_POST['product-type']) || $_POST['product-type'] === '')
    {
        return "Vous devez spécifier un prix de produit";
    }

    if (isset($_FILES['product-photo-file']) && $_FILES['product-photo-file']['name'] !== '')
    {
        if (!in_array($_FILES['product-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg']))
        {
            return "Le type de fichier " . $_FILES['product-photo-file']['type'] . " n'est pris en charge";
        }

        if ($_FILES['product-photo-file']['size'] > 10000000)
        {
            return "Le fichier est trop gros: il fait " . $_FILES['product-photo-file']['size']. ' octets';
        }
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
    $chemin = DOSSIER_UPLOADS . '/' . 'produit_' . $timestamp . '.' . $extension;
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

    // si le dossier n'existe pas
    // ben je crée le dossier
    if (file_exists(DOSSIER_UPLOADS) === false)
    {
        mkdir(DOSSIER_UPLOADS);
    }

    move_uploaded_file($_FILES["product-photo-file"]["tmp_name"], $chemin);
    return $chemin;
}

/**
 * convertirPayloadEnProduit
 * @param rien
 * @return produit : un produit qui comporte nom, prix et image qui viennent du payload
 */
function convertirPayloadEnProduit()
{
    $image = enregistrerFichierEnvoye();
    $produit = new Produit();
    $produit->nom = $_POST['product-name'];
    $produit->prix = $_POST['product-price'];
    $produit->image = $image;
    $produit->type = $_POST['product-type'];
    $produit->description = $_POST['product-description'];

    return $produit;
}

/**
 * insererDansBdd
 * @param produit : un produit à insérer dans la base de données
 * @return null
 */
function insererDansBdd($produit)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=exam_1_michael', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->prepare("INSERT INTO produits(nom, prix, photo, type, description) VALUES(?, ?, ?, ?, ?)");
    $resultat->execute([$produit->nom, $produit->prix, $produit->image, $produit->type, $produit->description]);

    return null;
}



// =============================== AFFICHAGE ===============================

/**
 * convertirLigneBddEnProduit
 * @param ligneDeBdd : une ligne de la base de données
 * @return produit : un nouvel produit qui contient id, nom, prix, image, type 
 * et description de la ligne bdd correspondante
 */
function convertirLigneBddEnProduit($ligneDeBdd)
{
    $produit = new Produit();
    $produit->id = $ligneDeBdd['id'];
    $produit->nom = $ligneDeBdd['nom'];
    $produit->prix = $ligneDeBdd['prix'];
    $produit->image = $ligneDeBdd['photo'];
    $produit->type = $ligneDeBdd['type'];
    $produit->description = $ligneDeBdd['description'];
    return $produit;
}

/**
 * recupererTousLesProduits
 * @param rien
 * @return tableau : tableau de produits qui contient id, nom, prix, image, type et description
 * à partir de la table produits
 */
function recupererTousLesProduits()
{
    $tableau = [];
    $tunnel = new PDO('mysql:host=localhost;dbname=exam_1_michael', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->query('SELECT * FROM produits');
    while ($ligne = $resultat->fetch())
    {
        $produit = convertirLigneBddEnProduit($ligne);
        array_push($tableau, $produit);
    }
    return $tableau;
}

/**
 * recupererUnSeulProduitAvecId
 * @param id : un identifiant d'un produit
 * @return produit : le produit correspondant à l'id en question en base de données
 */
function recupererUnSeulProduitAvecId($id)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=exam_1_michael', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $tunnel->prepare('SELECT * FROM produits WHERE id = ?');
    $statement->execute([$id]);
    $ligne = $statement->fetch();

    $produit = convertirLigneBddEnProduit($ligne);
    return $produit;
}

?>