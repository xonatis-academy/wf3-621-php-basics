<?php
include __DIR__.'/index.html.php';

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

if ($email == 'admin@admin.com' && $mdp == 'admin')
{
    header('LOCATION: result.html.php');
}
else
{
    http_response_code(401);
}

?>