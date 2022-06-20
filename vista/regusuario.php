<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regitro de Usuarios</title>
</head>
<body>
<form action="validarregistro.php" method="POST" role="form" autocomplete="off">
        <h2 class="text-center"><strong>Registro de Usuarios</strong>  </h2>
        <br>
        Nombre/s  y Apellidos: <input type="text" name="txtnombre" required autofocus> <br><br>
        Nombre de Usuario: <input type="text" name="txtusuario" required><br><br>
        Contraseña: <input type="text"  name="txtPassword" required> <br><br>
        Telefono: <input type="text"  name="txttelefono"  maxlength="20" value="0" required
        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1"> <br><br>
        Correo: <input type="text"  name="txtcorreo" required> <br><br>
        Tipo de Usuario:<br>
        <div class="">
            <input type="radio" name="rbtipousuario" id="tipousuario1" value="1" required/> Administrador
            <input type="radio" name="rbtipousuario" id="tipousuario2" value="2" required/> Docente
            <input type="radio" name="rbtipousuario" id="tipousuario3" value="3" required/> Técnico<br><br>
          </div>
        </div>
        Estado del Usuario:<br>
        <div class="">
            <input type="radio" name="rbestado" id="Activo" value="0" required/> Activo
            <input type="radio" name="rbestado" id="Inactivo" value="1" required/> Inactivo<br><br>
          </div>
        </div>
        <button class="play-button" type="submit" >Registrar</button><br><br>
    </form>
</body>
</html>