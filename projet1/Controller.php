<?php

include __DIR__.'/Identifiant.php';

class Controller
{
    public function index()
    {
        $identifiant = new Identifiant();

        $identifiant->email = '';
        $identifiant->mdp = '';
        
        if ( isset($_GET['email']) )
        {
            $identifiant->email = $_GET['email'];
        }
        
        if ( isset($_GET['mdp']) )
        {
            $identifiant->mdp = $_GET['mdp'];
        }
        
        if ($identifiant->email == '' && $identifiant->mdp == '')
        {
            include __DIR__.'/index.html.php';
        }
        
        if ($identifiant->email == 'admin@admin.com' && $identifiant->mdp == 'admin')
        {
            header('LOCATION: result.html.php');
        }
        else
        {
            http_response_code(401);
        }
    }
}

?>