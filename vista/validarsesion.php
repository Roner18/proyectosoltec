<?php

    include '../controlador/usuariocontrolador.php';
    include '../help/help.php';

    //session_start();

    //$resultado = array();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["txtusuario"]) && isset($_POST["txtPassword"])) {
        
            $txtUsuario = validar_campo( $_POST["txtusuario"]);
            $txtPassword = validar_campo( $_POST["txtPassword"]);
            //$resultado = array("estado" => "true");
         
            if( UsuarioControlador::login($txtUsuario, $txtPassword)){
                
                $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
                $_SESSION["nombusuario"] = array(
                    "idusuario" => $usuario->getIdUsuario(),
                    "idtipousuario" => $usuario->getIdTipoUsuario(),
                    "nombusuario" => $usuario->getNombUsuario(),
                    "telefono" => $usuario->getTelefono(),
                    "correo" => $usuario->getCorreo(),
                    "estadousuario" => $usuario->getEstadoUsuario(),
                    
                );
                //return print(json_encode($resultado));
            }

            if (isset($_SESSION["nombusuario"])) {
               
                if ($_SESSION["nombusuario"]["estadousuario"]==0) {
                            // Accede al menu del Administrador
                    if ($_SESSION["nombusuario"]["idtipousuario"] == 1){
                            header("location:menu/menuadmin.php");
                        }
                        // Accede al menu del Usuario Normal
                    if ($_SESSION["nombusuario"]["idtipousuario"] == 2) {
                            header("location:menu/menuusuario.php");
                        }
                        // Accede al menu del tecnico
                    if ($_SESSION["nombusuario"]["idtipousuario"] == 3) {
                            header("location:menu/menutecnico.php");
                        }  
                  }
                else  {
                    echo '<script type="text/javascript">';
                    echo 'alert("El Usuario no tiene Acceso!!!");';
                    echo 'window.location="index.php";  </script>';
                }
            }
            else{
                echo '<script type="text/javascript">';
                echo 'alert("Usuario o Contraseña estan incorrectos!!!");';
                echo 'window.location="index.php";  </script>';
            }


        }
    }
?>