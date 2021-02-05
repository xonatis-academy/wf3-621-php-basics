# Projet 3

Bienvenue dans ce projet 3 sur la découverte de PHP qui consiste en 1 page de panier.
Les étapes de ce projet sont décrites ci-dessous.

## 1. Implémenter une architecture MVC

Veuillez implémenter une architecture MVC (Modèle, Vue, Controller), ainsi qu'une layered architecture (c'est-à-dire ajoutez la couche de services et la couche des providers).

## 2. Service demandé

- Veuillez ajouter des fonctionnalités aux boutons d'ajout afin d'ajouter des articles au panier sans vous préoccupez des quantités.
Pour ajouter un élément dans un tableau, vous pourrez utiliser cette instruction PHP :

```php
// ajoute la variable $element à la fin du tableau
$tableau[] = $element;
```

- Le tableau devra être stocké dans les cookies

```php
setcookie('panier', ...);
```

Comme le cookie ne supporte que le stockage des chaines de caractères, il faudra sérializer et désérializer l'objet du panier. Pour ce faire, nous vous proposons de le sérializer et le désérializer au format JSON.

```php
// Sérialisation : transformation objet en chaine de caracteres
$text = json_encode($panier);
```

```php
// Désérialisation : transformation d'une chaine de caracteres en objet
$panier = json_decode($text);
```

- Veuillez modifier le code afin de prendre en charge la fusion des quantités.
Afin de vous aider, vous pouvez vous aider de la fonction `isset` pour savoir si une élément est présent dans le tableau :

```php
if (isset($tableau['cle']))
{

}
```