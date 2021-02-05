<?php

$connection = new PDO('mysql:host=challenge.xonatis.academy;dbname=wf3_621', 'wf3_621', 'tropbien');
$resultat = $connection->query("SELECT * FROM exo1_categories");
while ($ligne = $resultat->fetch())
{
    var_dump($ligne);
}
?>