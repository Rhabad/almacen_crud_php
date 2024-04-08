<?php

class DB
{
    private $hostname = "localhost:3306";
    private $db = "almacen";
    private $username = "root";
    private $password = "1234";
    private $charset = "utf8";


    public function conexion()
    {
        try {
            $con = "mysql:host=" . $this->hostname . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($con, $this->username, $this->password, $opt);

            return $pdo;
        } catch (PDOException $e) {
            echo "error de conexion, tontito -> <br>" . $e->getMessage();
        }
    }

    public function ejecutarQuery($query, $param = [])
    {
        $con = $this->conexion()->prepare($query);
        $con->execute($param);

        return $con;
    }


}