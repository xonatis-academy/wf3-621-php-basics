<?php

function verifierDonnees() 
{
    if (!isset($_POST['nom']) || $_POST['nom'] === '') 
    {
        return 'Vous devez spécifier un nom de produit';
    }

    if (!isset($_POST['prix']) || $_POST['prix'] === '') 
    {
        return 'Vous devez spécifier un prix pour le produit';
    }

    /*
    La photo n'est pas obligatoire pour le produit
    if (!isset($_POST['photo']) || $_POST['photo'] === '') 
    {
        return 'Vous devez spécifier une photo pour le produit';
    }
    */

    if (!is_numeric($_POST['prix']))
    {
        return 'Le prix doit être numérique';
    }

    if (isset($_FILES['photo']))
    {
        if ($_FILES['photo']['type'] !== '') 
        {
            if (!in_array($_FILES['photo']['type'], ['image/gif', 'image/png', 'image/jpg']))
            {
                return 'Le type de la photo est incorrect';
            }
        }
    }

    return null;
}

?>