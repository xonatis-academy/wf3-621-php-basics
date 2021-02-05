<?php

include __DIR__.'/index.html.php';
// Inclus dans le dossier courant, le fichier index.html.php

$email = '';
// Crée une variable $email avec '' dedans

$mdp = '';
// Crée une variable $mdp avec '' dedans

if ( isset($_GET['email']) )
// Si le paramètre email est dans l'URL
{
    $email = $_GET['email'];
    // Récupère le paramètre email dans l'URL et met le dans $email
}

if ( isset($_GET['mdp']) )
// Si le paramètre mdp est dans l'URL
{
    $mdp = $_GET['mdp'];
    // Récupère le paramètre mdp dans l'URL et met le dans $mdp
}

if ($email == 'admin@admin.com' && $mdp == 'admin')
// Si la variable $email est strictement égale à admin@admin.com et que la variable 
// $mdp est strictement égale à admin
{
    header('LOCATION: result.html.php');
    // Dis au client de se rediriger vers le fichier result.html.php
}
else
// Sinon
{
    http_response_code(401);
    // Répond un code réponse 401
}

?>