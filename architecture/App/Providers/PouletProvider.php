<?php

// 1. Créer une classe avec le nom du fichier
class PouletProvider
{
    // 2. Quels sont les comportements/actions de cette classe ?
    public function fournit()
    {
        // 3. Quel est le résultat de cette action ?
        $toto = new Poulet();
        return $toto;
    }
}

?>