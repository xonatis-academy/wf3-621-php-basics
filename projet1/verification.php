<?php

class SecurityService
{
    public function verifie(string $email, string $mdp)
    {
        // Si c'est bon, alors il retourne true
        // Sinon, il retourne false
        if ($email == 'admin@admin.com' && $mdp == 'admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

$email = $_GET['email'];
$motDePasse = $_GET['mdp'];

$william = new SecurityService();
$reponse = $william->verifie($email, $motDePasse);
// si l'email est égal à admin@admin.com ET le mot de passe est égal à admin
// ben la page est redirigée vers result.html
if ($reponse == true)
{
    header('LOCATION: result.html');
}
// Sinon, on revoie un status code 401
else
{
    http_response_code(401);
}

?>