<?php

function insererNoveau($produit) 
{
    $connection = new PDO('mysql:host=challenge.xonatis.academy;dbname=wf3_621', 'wf3_621', 'tropbien');
    $resultat = $connection->prepare('INSERT INTO produits(nom, prix, photo, type, description) VALUES (?, ?, ?, ?, ?)');
    $resultat->execute([$produit->nom, $produit->prix, $produit->photo, $produit->type, $produit->description]);
}


?>