<?php
    session_start();
    include '../controlador/usuariocontrolador.php';
    include '../help/help.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["txtnombre"]) && isset($_POST["txtusuario"]) && isset($_POST["txtPassword"]) && isset($_POST["txttelefono"]) &&
        isset($_POST["txtcorreo"]) && isset($_POST["rbtipousuario"]) && isset($_POST["rbestado"])) {
        
            $txtNombre = validar_campo( $_POST["txtnombre"]);
            $txtUsuario = validar_campo( $_POST["txtusuario"]);
            $txtPassword = validar_campo( $_POST["txtPassword"]);
            $txtTelefono = validar_campo( $_POST["txttelefono"]);
            $txtCorreo = validar_campo( $_POST["txtcorreo"]);
            $rbTipoUsuario =  $_POST["rbtipousuario"];
            $rbEstado = $_POST["rbestado"];
         
            if( UsuarioControlador::registrar($rbTipoUsuario,$txtNombre,$txtUsuario, $txtPassword,$txtTelefono,
                $txtCorreo,$rbEstado)){

                $usuario = UsuarioControlador::getUsuario($rbTipoUsuario,$txtNombre,$txtUsuario, $txtPassword,$txtTelefono,
                $txtCorreo,$rbEstado);    
                $_SESSION["usuario"] = array(
                    //"idusuario"     => $usuario->getIdUsuario(),
                    "idtipousuario" => $usuario->getIdTipoUsuario(),
                    "nombcompleto"  => $usuario->getNombCompleto(),
                    "nombusuario"   => $usuario->getNombUsuario(),
                    "contrasena"    => $usuario->getContrasena(), 
                    "telefono"      => $usuario->getTelefono(),
                    "correo"        => $usuario->getCorreo(),
                    "estadousuario" => $usuario->getEstadoUsuario(),
                    
                );
                echo "<div class='message'>  Registro de Usuario guardado satisfactoriamente!!  <br>";
            }
        }
    }else {
        echo "error!!";
    }
?>