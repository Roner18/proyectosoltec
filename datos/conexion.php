<?php
    class Conexion
    {
        //  Conexion a la base de datos
        public static function conectar()
        {
            try {
                
                $cn = new PDO("mysql:host=localhost;dbname=bdsoltec",
                "root","");
                
                return $cn;

            } catch (PDOException $exe) {
                die($exe->getMessage());
            }
        }
    }

    Conexion::conectar();
?>
