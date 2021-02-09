<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="display-4 text-center">Gestion des produits</h1>

        <?php
        if ($messageErreur !== null)
        {
        ?>
        
        <div class="alert alert-danger" role="alert">
            <?php echo $messageErreur; ?>
        </div>

        <?php
        }
        ?>

        <form method="POST" action="index.php" enctype="multipart/form-data" class="p-5">
            <div class="form-group">
                <label>Nom du produit</label>
                <input type="text" name="product-name" class="form-control">
            </div>
            <div class="form-group">
                <label>Prix du produit</label>
                <input type="text" name="product-price" class="form-control">
            </div>
            <div class="form-group">
                <label>Image du produit</label>
                <input type="file" name="product-photo-file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary" name="btn-valider">Ajouter</button>
        </form>
        <hr />
        <h2 class="text-center">Liste des produits</h2>
        <table class="table table-striped w-75 mx-auto">
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

            <?php
            for ($i = 0; $i < count($tableau); ++$i) {
            ?>

                <tr>
                    <td><?php echo $tableau[$i]->nom ?></td>
                    <td><?php echo $tableau[$i]->prix ?> euros</td>
                    <td>
                        <img class="w-100" src="<?php echo $tableau[$i]->image ?>" />
                    </td>
                    <td>
                        <a href="details.php?id=<?php echo $tableau[$i]->id ?>" class="btn btn-primary">Voir</a>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>