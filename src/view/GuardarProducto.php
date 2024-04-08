<?php
require '../models/Producto.php';

$producto = new Producto();

$tamoBien = false;

/**
 * si encuentra el id, entonces esta en tabla
 * si esta, entonces se actualiza
 * (depende si presiona en editar o nuevo)
 */
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $codigo = $_POST["codigo"];
    $descripcion = $_POST["descripcion"];

    $stock = $_POST["stock"];
    if ($stock == '') {
        $stock = 0;
    }

    $inventariable = 0;
    if (isset($_POST["inventariable"])) {
        $inventariable = 1;
    }

    $activo = 0;
    if (isset($_POST["activo"])) {
        $activo = 1;
    }
    $params = [$codigo, $descripcion, $inventariable, $stock, $activo, $id];
    $result = $producto->updateProduct($params);

    if ($result) {
        $tamoBien = true;
    }

} else {
    // si no esta, entonces se crea.
    $codigo = $_POST["codigo"];
    $descripcion = $_POST["descripcion"];

    $stock = $_POST["stock"];
    if ($stock == '') {
        $stock = 0;
    }

    $inventariable = 0;
    if (isset($_POST["inventariable"])) {
        $inventariable = 1;
    }

    $activo = 0;
    if (isset($_POST["activo"])) {
        $activo = 1;
    }

    //los parametros
    $params = [$codigo, $descripcion, $inventariable, $stock, $activo];

    $result = $producto->createProduct($params);

    if ($result) {
        $tamoBien = true;
    }

}


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
    <?php if ($tamoBien) { ?>
        <h3>registro guardado perrin</h3>
    <?php } else { ?>
        <h3>no se guardo loco</h3>
    <?php } ?>
    <a class="btn btn-secondary" href="../../index.php">Regresa cochino</a>

</body>

</html>