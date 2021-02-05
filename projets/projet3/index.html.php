<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="w-50 mx-auto mt-5">
            <h1 class="display-4">Votre panier</h1>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($tableau); ++$i)
                    {
                    ?>

                    <tr>
                        <td><?php echo $tableau[$i]->nom; ?></td>
                        <td><?php echo $tableau[$i]->quantite; ?></td>
                        <td><?php echo $tableau[$i]->prix; ?></td>
                    </tr>

                    <?php
                    }
                    ?>

                    <tr>
                        <td class="font-weight-bold">Total</td>
                        <td></td>
                        <td class="font-weight-bold"><?php echo $total; ?></td>
                    </tr>
                </tbody>
            </table>
            <form method="get" action="index.php">
                <button name="btn-livre" type="submit" class="btn btn-primary">Ajouter un livre</button>
                <button name="btn-voiture" type="submit" class="btn btn-primary">Ajouter une voiture</button>
                <button name="btn-moto" type="submit" class="btn btn-primary">Ajouter une moto</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>