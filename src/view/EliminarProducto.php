<?php
require '../models/Producto.php';

$producto = new Producto();

$id = $_GET['id'];

$result = $producto->deleteProduct($id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    if ($result) {
        echo "Eliminado";
    } else {
        echo "No Eliminado";
    }
    ?>

    <div class="col-md-12">
        <a class="btn btn-secondary" href="../../index.php">pa' tras cochino</a>
    </div>

</body>

</html>