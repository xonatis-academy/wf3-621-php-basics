<?php

class CuisineService
{
    public $pouletFournisseur;
    public $tomateFournisseur;

    public function __construct(PouletProvider $fournisseur1, TomateProvider $fournisseur2)
    {
        $this->pouletFournisseur = $fournisseur1;  
        $this->tomateFournisseur = $fournisseur2; 
    }

    public function cuisinerPouletALaTomate()
    {
        // Récupération des éléments des fournisseurs
        $pouletDuFournisseur = $this->pouletFournisseur->fournit();
        $tomateDuFournisseur = $this->tomateFournisseur->fournit();

        // Création d'un résultat vide
        $plat = new PlatCuisine();

        // Remplissage du résultat
        $plat->tomate = $tomateDuFournisseur;
        $plat->poulet = $pouletDuFournisseur;
        $plat->nom = 'Poulet a la tomate';
        $plat->prix = 13.50;

        // Retourner le résultat
        return $plat;
    }
}

?>