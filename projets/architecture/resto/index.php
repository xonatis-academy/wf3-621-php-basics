<?php
include __DIR__.'/../App/include.inc.php';

// 1. Construire le controller avec ses dépendances
$pouletFournisseur = new PouletProvider();
$tomateFournisseur = new TomateProvider();
$service = new CuisineService($pouletFournisseur, $tomateFournisseur);
$controller = new PlatController($service);

// 2. Appeler l'action du controller
$controller->recevoir_commande();
?>

