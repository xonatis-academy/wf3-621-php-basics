# Partie facile

1. Ouvrir le localhost sur le dossier du projet
2. Renommer les fichiers html en html.php
3. Ajouter un fichier `index.php` -> nouveau point d'entrée car le fichier s'appelle `index.*`
4. Ajouter l'include `include __DIR__.'/index.html.php';` dans le fichier `index.php`
5. On teste

# Partie développement Front

1. Il n'y a pas pas d'information à envoyer du front vers le back, donc on ne travaille pas avec du `POST` ou du `GET`
2. Cibler les élements dynamiques et les associés à des `variables PHP`
    - S'il y a un simili-tableau, alors probablement les **lignes (`<tr>` ou des `<div>`) sont dynamiques, donc on va les associer à un `$tableau PHP` avec une boucle `for`
    - Déclarer les variables PHP dans le fichier `index.php` **avant l'include
    - Tester dans le navigateur
    - Pour remplir le tableau, on se pose la question des **Modèles : que doit contenir mon tableau ? On veut une réponse en 1 mot
    - Créer une classe avec la réponse précédente, je mets les propriétés qu'on affiche dans la vue (c'est-à-dire que l'on affiche dans le fichier html.php)
    ```php
    class Produit
    {
        public $nom;
        public $prix;
        public $image;
    }
    ```
    - Créer des objets à partir de cette classe `new` en PHP dans le fichier index.php avec des noms atypiques pour les tests
    ```php
    $produit1 = new Produit();
    $produit1->nom = 'Test test test';
    $produit1->prix = 9999;
    $produit1->image = 'https://via.placeholder.com/150';
    ```
    - Mettre cet objet dans le tableau
    - Dynamisez le front en utilisant les propriétés de l'objet
    - On teste pour voir si on voit les valeurs de cet objet