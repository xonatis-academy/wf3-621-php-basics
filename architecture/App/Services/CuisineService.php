<?php

// 1. Créer une classe avec le nom du fichier
class CuisineService
{
    public $pouletFournisseur;
    public $tomateFournisseur;

    // 2. Quelles sont ses dépendances ? Sauvegarder les dépendances dans des propriétés
    // pour les réutiliser en dehors du constructeur
    public function __construct(PouletProvider $fournisseur1, TomateProvider $fournisseur2)
    {
        $this->pouletFournisseur = $fournisseur1; 
        $this->tomateFournisseur = $fournisseur2;
    }

    // 3. Quels sont les comportements/actions de cette classe ?
    public function cuisinerPouletALaTomate()
    {

        // 4. Quel est le résultat de cette action ?

        // 4.1 Récupération des éléments des fournisseurs
        $pouletDuFournisseur = $this->pouletFournisseur->fournit();
        $tomateDuFournisseur = $this->tomateFournisseur->fournit();

        // 4.2 Création d'un résultat vide
        $plat = new PlatCuisine();

        // 4.3 Remplissage du résultat
        $plat->tomate = $tomateDuFournisseur;
        $plat->poulet = $pouletDuFournisseur;
        $plat->nom = 'Poulet a la tomate';
        $plat->prix = 13.50;

        // 4.4 Retourner le résultat
        return $plat;
    }
}

?>