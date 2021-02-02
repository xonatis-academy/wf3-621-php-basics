<?php
/**
 * STATIC SPACE
 */

// 1. Créer une classe avec le nom du fichier
class TomateProvider
{
    // 2. Quels sont les comportements/actions de cette classe ?
    public function fournit()
    {
        // 3. Quel est le résultat de cette action ?
        $toto = new Tomate();
        return $toto;
    }
}

?>