# Partie facile

1. Ouvrir le localhost sur le dossier du projet
2. Renommer les fichiers html en html.php
3. Ajouter un fichier `index.php` -> nouveau point d'entrée car le fichier s'appelle `index.*`
4. Ajouter l'include `include __DIR__.'/index.html.php';` dans le fichier `index.php`

# Partie développement Front

1. Cibler les éléments du formulaire que le front doit envoyer au backend
    - Ajouter un attribut `method="get"` et `action` au formulaire `<form>`
    - Ajouter un attribut `name` aux inputs, boutons etc.
    - Tester pour voir si les paramètres sont bien envoyés par le front end
2. Cibler les élements dynamiques et les associés à des `variables PHP`
    - S'il y a un tableau, alors probablement les **lignes (`<tr>`) sont dynamiques, donc on va les associer à un `$tableau PHP` avec une boucle `for`
    ```php
    <?php
    for ($i = 0; $i < count($tableau); ++$i)
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
    - Faire les autres éléments dynamiques
    - Déclarer les variables PHP dans le fichier `index.php` **avant l'include
    - Tester dans le navigateur
    - On se pose la question des **Modèles : que doit contenir mon tableau ? On veut une réponse en 1 mot
    - Créer une classe avec la réponse précédente, je mets les propriétés qu'on affiche dans la vue (c'est-à-dire que l'on affiche dans le fichier html.php)
    - Ajouter des objets dans le tableau `new` en PHP dans le fichier index.php avec des noms atypiques pour les tests
    ```php
    $article1 = new Article();
    $article1->nom = 'Test test test';
    $article1->prix = 999.0;
    $article1->quantite = 99;
    ```
    - Si cela n'apparait pas, c'est qu'il y a probablement un affiche en dur (statique) dans l'HTML -> il faut le dynamiser
    ```html
    <td><?php echo $tableau[$i]->nom; ?></td>
    <td><?php echo $tableau[$i]->quantite; ?></td>
    <td><?php echo $tableau[$i]->prix; ?></td>
    ```
    - Si tout a été dynamiser : donc tout ne dépend plus que du PHP, on va travailler sur le backend

# Partie développement backend

1. Relire l'énoncé pour savoir ce qu'il faut faire
2. Si on veut ajouter une fonctionnalité lié à une donnée qui vient du front :
```php
if (isset($_XXXX['YYYY']))
{
    
}
```
XXXX c'est la super global, YYYY c'est la clé pour retrouver la donnée
soit XXXX = POST si les données sont dans payload soit XXXX = GET si les données sont dans l'URL
3. On vient de faire `Veuillez ajouter des fonctionnalités aux boutons d'ajout` sauf que la fonctionnalité est vide
4. On relit l'énoncé pour voir ce qu'il faut faire pour la fonctionnalité. Le panier, c'est le `$tableau` qui contient des articles