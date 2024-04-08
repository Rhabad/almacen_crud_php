<?php
require '../models/Producto.php';

$producto = new Producto();

$id = $_GET['id'];

$result = $producto->deleteProduct($id);

if ($result) {
    echo "Eliminado";
} else {
    echo "No Eliminado";
}
