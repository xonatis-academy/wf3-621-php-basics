<?php

include __DIR__.'/functions.php';
include __DIR__.'/Article.php';

$tableau = convertirTableProduitEnTableauPhp();

include __DIR__.'/index.html.php';

?>