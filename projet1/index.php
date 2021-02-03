<?php

class Controller
{
    public function index()
    {
        $email = '';
        $mdp = '';
        
        if ( isset($_GET['email']) )
        {
            $email = $_GET['email'];
        }
        
        if ( isset($_GET['mdp']) )
        {
            $mdp = $_GET['mdp'];
        }
        
        if ($email == '' && $mdp == '')
        {
            include __DIR__.'/index.html.php';
        }
        
        if ($email == 'admin@admin.com' && $mdp == 'admin')
        {
            header('LOCATION: result.html.php');
        }
        else
        {
            http_response_code(401);
        }
    }
}

$controller = new Controller();
$controller->index();

?>