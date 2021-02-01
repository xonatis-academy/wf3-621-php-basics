# Projet 7

Bienvenue dans ce projet 7 sur la découverte de PHP qui consiste en 1 page d'index, 1 page d'ajout de photo ainsi qu'1 page de validation de suppression (qui s'ffichera si l'utilisateur clique sur 'Supprimer').
Les étapes de ce projet sont décrites ci-dessous.

## 1. Implémenter une architecture MVC

Veuillez implémenter une architecture MVC (Modèle, Vue, Controller), ainsi qu'une layered architecture (c'est-à-dire ajoutez la couche de services et la couche des providers).

## 2. Service demandé

- Veuillez agréger les compétences obtenues dans les projets précédents et permettre à l'utilisateur de consulter un portfolio de photo à la partir d'une base de données.

- Vous pourrez stocker les fichiers uploadés sur votre serveur

```php
$targetFolder = "uploads/";
$targetFile = $targetFolder . basename($_FILES["name_file_input"]["name"]);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile);
```
