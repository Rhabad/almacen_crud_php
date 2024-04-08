<?php
include 'config/DB.php';
include 'src/models/Producto.php';

$producto = new Producto();

$list = $producto->getAllProduct();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/31317cfdd9.js" crossorigin="anonymous"></script>
</head>

<body>

    <body class="py-3">
        <main class="container">
            <div class="row">
                <div class="col">
                    <h4>PRODUCTOS</h4>
                    <a href="src/view/NuevoProducto.php" class="btn btn-primary float-right">Nuevo</a>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>En inventario</th>
                                <th>Stock</th>
                                <th>Activo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['codigo']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['descripcion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['inventariable']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['stock']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['activo']; ?>
                                    </td>
                                    <td>
                                        <a href="src/view/EditarProducto.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="src/view/EliminarProducto.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></class=></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

    </body>

</html>