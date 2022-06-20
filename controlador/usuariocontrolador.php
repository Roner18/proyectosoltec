<?php
    include '../datos/usuariodao.php';

    class UsuarioControlador
    {

        public static function login($nombusuario,$contrasena){
            $obj_usuario = new Usuario();
            $obj_usuario->setNombUsuario($nombusuario);
            $obj_usuario->setContrasena($contrasena);

            return UsuarioDao::login($obj_usuario);
        }

        public static function getUsuario($nombusuario,$contrasena){
            $obj_usuario = new Usuario();
            $obj_usuario->setNombUsuario($nombusuario);
            $obj_usuario->setContrasena($contrasena);

            return UsuarioDao::getUsuario($obj_usuario);
        }

        public static function registrar($idtipousuario,$nombcompleto,$nombusuario,
            $contrasena,$telefono,$correo,$estado){

            $obj_usuario = new Usuario();
            //$obj_usuario->setIdUsuario($idusuario);
            $obj_usuario->setIdTipoUsuario($idtipousuario);
            $obj_usuario->setNombCompleto($nombcompleto);
            $obj_usuario->setNombUsuario($nombusuario);
            $obj_usuario->setContrasena($contrasena);
            $obj_usuario->setTelefono($telefono);
            $obj_usuario->setCorreo($correo);
            $obj_usuario->setEstadoUsuario($estado);

            return UsuarioDao::registrar($obj_usuario);
        }
        public static function getregistrar($idtipousuario,$nombcompleto,$nombusuario,
        $contrasena,$telefono,$correo,$estado){

        $obj_usuario = new Usuario();
        //$obj_usuario->setIdUsuario($idusuario);
        $obj_usuario->setIdTipoUsuario($idtipousuario);
        $obj_usuario->setNombCompleto($nombcompleto);
        $obj_usuario->setNombUsuario($nombusuario);
        $obj_usuario->setContrasena($contrasena);
        $obj_usuario->setTelefono($telefono);
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setEstadoUsuario($estado);

        return UsuarioDao::registrar($obj_usuario);
        }
    }
?>