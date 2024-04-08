<?php
require '../models/Producto.php';

$producto = new Producto();

$id = $_GET['id'];

$result = $producto->findById($id)->fetchAll(PDO::FETCH_ASSOC);

$row = '';
if ($result) {
    $row = $result[0];
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

<body class="py-3">
    <main class="container">
        <div class="row">
            <div class="col">
                <h4>NUEVO REGISTRO</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form method="post" action="GuardarProducto.php" class="row g-4" autocomplete="off">
                    <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                    <div class="col-md-4">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" id="codigo" name="codigo" class="form-control"
                            value="<?php echo $row['codigo']; ?>" require autofocus>
                    </div>

                    <div class="col-md-8">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control"
                            value="<?php echo $row['descripcion']; ?>" require autofocus>
                    </div>

                    <h5>Inventario</h5>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="inventariable" id="inventariable"
                                <?php
                                if ($row['inventariable']) {
                                    echo 'checked';
                                }
                                ?>>
                            <label for="inventariable" class="form-check-label">Usa Inventario</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Cantidad Productos</label>
                        <input type="number" id="stock" name="stock" class="form-control"
                            value="<?php echo $row['stock']; ?>">
                    </div>
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="activo" id="activo" <?php
                            if ($row['activo']) {
                                echo 'checked';
                            }
                            ?>>
                            <label for="activo" class="form-check-label">Activo</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="../../index.php">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>