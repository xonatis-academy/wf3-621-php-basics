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

class PortiqueHumainController
{
    public function filtre(bool $reponseDeLaSecurite)
    {
        // si la reponse de la securite est TRUE
        // ben la page est redirigée vers result.html
        if ($reponseDeLaSecurite == true)
        {
            header('LOCATION: result.html');
        }
        // Sinon, on revoie un status code 401
        else
        {
            http_response_code(401);
        }
    }
}

$email = $_GET['email'];
$motDePasse = $_GET['mdp'];

$william = new SecurityService();
$reponseConcrete = $william->verifie($email, $motDePasse);

$bernadette = new PortiqueHumainController();
$bernadette->filtre($reponseConcrete);
?>