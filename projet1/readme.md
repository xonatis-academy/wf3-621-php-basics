# Projet 1

Bienvenue dans ce projet 1 sur la découverte de PHP qui consiste en 1 page de login ainsi qu'1 page de résultat (qui s'ffichera si le login a échoué ou est en succès).
Les étapes de ce projet sont décrites ci-dessous.

## 1. Implémenter une architecture MVC

Veuillez implémenter une architecture MVC (Modèle, Vue, Controller), ainsi qu'une layered architecture (c'est-à-dire ajoutez la couche de services et la couche des providers).

## 2. Service demandé

L'utilisateur doit pouvoir se connecter avec l'adresse email `admin@admin.com` et le mot de passe `admin`.
Si l'authentification réussie, alors l'utilisateur est redirigé à la page `result.html` avec une réponse de redirection :

```php
header('LOCATION: result.html');
```

Si l'authentification échoue, l'utilisateur recevera un code erreur `401`.

```php
http_response_code(401);
```
