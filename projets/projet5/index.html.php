<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <label>Nom du produit :</label>
        <input type="text" name="product-name" />
        <label>Son prix :</label>
        <input type="text" name="product-price" />
        <label>Son image : </label>
        <input type="file" name="product-photo-file" />
        <button type="submit" name="btn-valider">Valider</button>
    </form>
    
    <table>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Image</th>
        </tr>

        <?php
        for ($i = 0; $i < count($tableau); ++$i)
        {
        ?>

        <tr>
            <td><?php echo $tableau[$i]->nom ?></td>
            <td><?php echo $tableau[$i]->prix ?> euros</td>
            <td>
                <img class="w-50" src="<?php echo $tableau[$i]->image ?>" />
            </td>
        </tr>
        
        <?php
        }
        ?>

    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>