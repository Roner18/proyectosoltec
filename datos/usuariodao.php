<?php
    include 'conexion.php';
    include '../modelo/usuario.php';

    class UsuarioDao extends Conexion
    {
        protected static $cnx;

        private static function getConexion()
        {
            self::$cnx = Conexion::conectar();
        }

        private static function desconectar()
        {
            self::$cnx = null;
        }

        // Metodo que sirve para validar el login
        public static function login($usuario)
        {
            $query ="SELECT * FROM tusuario WHERE nombusuario = :nombusuario AND contrasena = :contrasena";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindValue(":nombusuario", $usuario->getNombUsuario());
            $resultado->bindValue(":contrasena", $usuario->getContrasena());

            $resultado->execute();

            if($resultado->rowCount() > 0){
                $filas = $resultado->fetch();
                if ($filas["nombusuario"]==$usuario->getNombUsuario()
                && $filas["contrasena"]==$usuario->getContrasena()) {
                    return true;    
                }
            }

            return false;
        }
        
        // Metodo que sirve para obetener un usuario
        public static function getUsuario($usuario)
        {
            $query ="SELECT idusuario,idtipousuario,nombcompleto,nombusuario,telefono,correo,estadousuario 
            FROM tusuario WHERE nombusuario = :nombusuario AND contrasena = :contrasena";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindValue(":nombusuario", $usuario->getNombUsuario());
            $resultado->bindValue(":contrasena", $usuario->getContrasena());

            $resultado->execute();

            $filas = $resultado->fetch();

            $usuario = new Usuario();
            $usuario->setIdUsuario($filas["idusuario"] ?? 'default value');
            $usuario->setIdTipoUsuario($filas["idtipousuario"] ?? 'default value');
            $usuario->setNombCompleto($filas["nombcompleto"] ?? 'default value');
            $usuario->setNombUsuario($filas["nombusuario"] ?? 'default value');
            $usuario->setTelefono($filas["telefono"] ?? 'default value');
            $usuario->setCorreo($filas["correo"] ?? 'default value');
            $usuario->setEstadoUsuario($filas["estadousuario"] ?? 'default value');

            return $usuario;
        }
        
        // Metodo que sirve para registrar usuarios
        public static function registrar($usuario)
        {
            $query ="INSERT INTO tusuario (
                idtipousuario,nombcompleto,nombusuario,contrasena,telefono,correo,estadousuario)
                values (:idtipousuario,:nombcompleto,:nombusuario,:contrasena,:telefono,:correo,:estadousuario)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindValue(":idtipousuario", $usuario->getIdTipoUsuario());
            $resultado->bindValue(":nombcompleto", $usuario->getNombCompleto());
            $resultado->bindValue(":nombusuario", $usuario->getNombUsuario());
            $resultado->bindValue(":contrasena", $usuario->getContrasena());
            $resultado->bindValue(":telefono", $usuario->getTelefono());
            $resultado->bindValue(":correo", $usuario->getCorreo());
            $resultado->bindValue(":estadousuario", $usuario->getEstadoUsuario());

            if ($resultado->execute()) {
                return true;
            }
            return false;
        }

        // Metodo que sirve para obetener un registro
        public static function getregistro($usuario)
        {
            $query ="SELECT idusuario,idtipousuario,nombcompleto,nombusuario,telefono,correo,estadousuario 
            FROM tusuario WHERE nombusuario = :nombusuario AND contrasena = :contrasena";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindValue(":idtipousuario", $usuario->getIdTipoUsuario());
            $resultado->bindValue(":nombcompleto", $usuario->getNombCompleto());
            $resultado->bindValue(":nombusuario", $usuario->getNombUsuario());
            $resultado->bindValue(":contrasena", $usuario->getContrasena());
            $resultado->bindValue(":telefono", $usuario->getTelefono());
            $resultado->bindValue(":correo", $usuario->getCorreo());
            $resultado->bindValue(":estadousuario", $usuario->getEstadoUsuario());

            $resultado->execute();

            $filas = $resultado->fetch();

            $usuario = new Usuario();
            //$usuario->setIdUsuario($filas["idusuario"]);
            $usuario->setIdTipoUsuario($filas["idtipousuario"]);
            $usuario->setNombCompleto($filas["nombcompleto"]);
            $usuario->setNombUsuario($filas["nombusuario"]);
            $usuario->setContrasena($filas["contrasena"]);
            $usuario->setTelefono($filas["telefono"]);
            $usuario->setCorreo($filas["correo"]);
            $usuario->setEstadoUsuario($filas["estadousuario"]);

            return $usuario;
        }

         // Metodo que sirve para Actualizar Datos del usuario
         public static function actualizar($usuario)
         {
             $query ="UPDATE SET idtipousuario=:idtipousuario, nombcompleto=:nombcompleto, nombusuario=:nombusuario
             contrasena=:contrasena, telefono=:telefono, correo=:correo, estadousuario=:estadousuario FROM tusuario
             where idusuario=:idusuario";
 
             self::getConexion();
 
             $resultado = self::$cnx->prepare($query);
             $resultado->bindValue(":idusuario", $usuario->getIdUsuario());
             $resultado->bindValue(":idtipousuario", $usuario->getIdTipoUsuario());
             $resultado->bindValue(":nombcompleto", $usuario->getNombCompleto());
             $resultado->bindValue(":nombusuario", $usuario->getNombUsuario());
             $resultado->bindValue(":contrasena", $usuario->getContrasena());
             $resultado->bindValue(":telefono", $usuario->getTelefono());
             $resultado->bindValue(":correo", $usuario->getCorreo());
             $resultado->bindValue(":estadousuario", $usuario->getEstadoUsuario());
 
             if ($resultado->execute()) {
                 return true;
             }
             return false;
         }
    }
?>