<?php

// entrée : il prend UNNNNEE phrase
// sortie : il donne une nouvelle phrase avec est chouette
// nom : rendreChouette
function rendreChouette($phrase)
{
    $chouette = ' est chouette ! =)';
    $nouvelPhrase = $phrase.$chouette;

    return $nouvelPhrase;
}


// entrée : il prend UNNNNEE phrase
// sortie : il donne une nouvelle phrase avec est chouette
// nom : rendreChouette
$text1 = rendreChouette('La formation');
echo $text1;

$text2 = rendreChouette('Les restos');
echo $text2;

?>