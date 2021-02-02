<?php

$email = $_GET['email'];
$motDePasse = $_GET['mdp'];

// si l'email est égal à admin@admin.com ET le mot de passe est égal à admin
// ben la page est redirigée vers result.html
if ($email == 'admin@admin.com' && $motDePasse == 'admin')
{
    header('LOCATION: result.html');
}
// Sinon, on revoie un status code 401
else
{
    http_response_code(401);
}

?>