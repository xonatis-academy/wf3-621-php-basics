<?php

// 1. Créer une classe avec le nom du fichier
class PlatController
{
    // 3. Déduire les dépendances du 2. et les sauvegarder pour les réutiliser en dehors
    // du constructeur
    public $cuisineService;
    public function __construct(CuisineService $service)
    {
        $this->cuisineService = $service;
    }

    // 2. Quels sont les comportements/actions de cette classe ?
    public function recevoir_commande()
    {
        $plat = $this->cuisineService->cuisinerPouletALaTomate();
        include __DIR__.'/../Views/dressage.html.php';
    }
}

?>