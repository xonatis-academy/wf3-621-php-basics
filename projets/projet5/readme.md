# Projet 5

Bienvenue dans ce projet 5 sur la découverte de PHP qui consiste en 1 page de catalogue.
Les étapes de ce projet sont décrites ci-dessous.

# Exercice 1 : Création d'une base de données

Veuillez modifier cette page de catalogue pour que les articles soient pris directement de la base de données.

- Créez une table dans la base de données préfixée par votre nom ou prenom avec les colonnes/champs suivants, dont les types seront choisis précisément.
La table devra avoir les caractéristiques suivantes :
    - nom de la table suffixé par `projet5_produits`
    - colonnes : `id`, `nom`, `prix`, `image`

# Exercice 2 : Affichage des données

- Afficher les enregistrements de la base de données sous forme de tableau, dans lequel chaque ligne représente un produits.
Vous pouvez utiliser `PDO` ou `mysqli`

# Exercice 3 : Enregistrement des données

1. Créez un formulaire pour pouvoir ajouter des **produits** à la table nommée **produits**.
2. Plusieurs contrôles de saisies sont à prévoir :
- Les champs obligatoires sont : nom, prix
- Le format du prix doit être vérifié et être correct.
- Le champ photo doit permettre un upload de fichier image, les vérifications sont multiples : extension et type de fichier, poids du fichier, etc.
3. Le dossier d'upload de fichier doit être automatiquement créé en PHP.
4. A la validation du formulaire, il faut enregistrer les données dans la table correspondante de la base

- Vous pourrez stocker les fichiers uploadés sur votre serveur avec le code suivant :

```php
$targetFolder = "uploads/";
$targetFile = $targetFolder . basename($_FILES["name_file_input"]["name"]);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile);
```

