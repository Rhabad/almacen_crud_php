<?php
require_once __DIR__ . '/../../config/DB.php';

class Producto
{
    private $db;

    //inyectamos dependendia.
    public function __construct()
    {
        $this->db = new DB();
    }

    // CRUD de tabla producto

    public function findById($id)
    {
        $query = "select * from producto where id=?";
        $params = [$id];

        return $this->db->ejecutarQuery($query, $params);
    }
    public function getAllProduct()
    {
        $query = "select * from producto";
        return $this->db->ejecutarQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($params = [])
    {
        $query = "
        insert into producto (codigo, descripcion, inventariable, stock, activo) 
        values
        (?,?,?,?,?)";

        return $this->db->ejecutarQuery($query, $params);
    }

    public function updateProduct($params = [])
    {
        $query = "update producto set codigo = ?, descripcion =?, inventariable=?, stock=?, activo=? where id=?";

        return $this->db->ejecutarQuery($query, $params);
    }

    public function deleteProduct($id)
    {
        $query = "delete from producto where id = ?";
        $params = [$id];

        return $this->db->ejecutarQuery($query, $params);
    }


}