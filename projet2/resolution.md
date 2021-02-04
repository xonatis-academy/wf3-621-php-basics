# Partie facile

1. On a déjà des fichiers HTML et les renomme
2. Ajouter le fichier index.php
    - C'est le point d'entrée parce qu'il s'appelle "index....."
3. Ajouter un include
```php
include __DIR__.'/index.html.php';
```
# Partie hard-core

On fait le service demandé. On lit énoncé ? Plusieurs fois ?

1. Développement front
    - Modifier la `<form>` pour envoyer des informations du front
        - `method`
        - `action` on dirige la requete vers un fichier
        - on ajoute les `name` sur les boutons ou les inputs
    - TESTER : Gagné ! On peut maintenant envoyer des infos du front vers le back !
    - Rendre dynamique le front
        - voir les éléments qui sont fixes par rapport à ceux qui changent
        - Faire le mix entre une variable du backend et du code PHP dans le front

        ```php
        <?php
        for ($i = 0; $i < 10; ++$i)
        {
        ?>

        <tr>
            <td>Livre</td>
            <td>1</td>
            <td>250.0</td>
        </tr>

        <?php
        }
        ?>
        ```
        - Il y a une boucle `for`, ca veut dire que ca pue le tableau !
        - Vous pensez dictionnaire ? ca veut dire que ca pue la classe (exemple : `ArticleSelectionne`). Mettez les bonnes propriétés !
        - Il y a une classe ? Il faut un objet, instancier la classe avec l'opérateur `new`
        ```php
        $article1 = new ArticleSelectionne();
        ```