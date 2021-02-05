<?php

include __DIR__.'/Identifiant.php';

class Controller
{
    public function index()
    {
        $identifiant = new Identifiant();

        $identifiant->email = '';
        $identifiant->mdp = '';
        
        if ( isset($_POST['email']) )
        {
            $identifiant->email = $_POST['email'];
        }
        
        if ( isset($_POST['mdp']) )
        {
            $identifiant->mdp = $_POST['mdp'];
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