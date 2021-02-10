# Exercice 1 (2 points) : Hébergement

Créer un compte sur https://fr.000webhost.com/ ou https://infinityfree.net/ ou l’hébergeur de votre choix et uploader vos codes-sources de l’évaluation sur ce serveur.
Vous devrez rendre l’adresse url de votre site web afin que le correcteur puisse évaluer votre travail.
Ne mettez pas de fichier index afin que le correcteur puisse avoir accès à votre listing de fichier. En fin d’évaluation, pensez à uploader l’archive .rar ou .zip de votre projet afin que le correcteur puisse observer votre code-source directement sur le serveur.

# Exercice 2 (3 points) : Création d'une base de données

1. Créez une base de données que vous appellerez **exam_1_[votre prenom]**.
2. A l’intérieur de celle-ci, vous créerez une table que vous appellerez **produit** avec les champs suivants, dont les types seront choisis précisément.

Table : **produits**
Colonnes : id, nom, prix, photo, type ('voiture', 'barbie'), description


# Exercice 3 (5 points) : Enregistrement des données

1. Créez un formulaire pour pouvoir ajouter des **produits** à la table nommée **produits**.
2. Plusieurs contrôles de saisies sont à prévoir :
- Les champs obligatoires sont : nom, prix et type
- Le format du prix doit être vérifié et être correct.
- Le champ photo doit permettre un upload de fichier image, les vérifications sont multiples : extension et type de fichier, poids du fichier, etc.
3. Le champ type doit être géré via un input type radio ou un select.
4. Le dossier d'upload de fichier doit être automatiquement créé en PHP.
5. A la validation du formulaire, il faut enregistrer les données dans la table correspondante de la base

# Exercice 4 (5 points) : Affichage des données

1. Créez une page permettant l’affichage des données saisies, nous devrons y retrouver l’ensemble des **produits** avec leurs informations respectives.
Cet affichage se fera de préférence sous forme de tableau.
2. Il faudra prévoir de couper le texte en ajoutant '...' si la description ou une autre information textuelle est trop longue (supérieur à 25 caractères).
3. Concernant la photo, nous n’afficherons pas le chemin, mais bien la photo en elle-même, toutefois, cela ne doit pas venir perturber la lisibilité de l’internaute.

# Exercice 5 (5 points) : Développements complémentaires

1. Les fichiers uploadés via le champ photo doivent être renommés. C’est-à-dire qu’un fichier nommé : 'monappart.jpg' sera automatiquement renommé 'produit_1558174948.jpg' (le numéro correspond au timestamp).
2. Créer une page permettant l'affichage d'un produit spécifique en passant son id dans l'url.
3. Mettez en place un lien de paiement avec Paypal sur le produit