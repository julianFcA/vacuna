<?php 
require_once ("db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

?>

<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $documento = $_POST['docum'];
        $nom = $_POST['nombre'];
        $apell = $_POST['apellido'];
        


        if ( $documento=="" || $nom==""|| $apell=="")
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "datos.php"</script>';
        }

        else
        {
            $insertsql = $con -> prepare("INSERT INTO enfermeros (docu_enfermero,nombre,apellido) VALUES ('$documento','$nom','$apell')");
            $fila1 = $insertsql-> execute();
            echo '<script>alert ("Datos registrados exitosamente");</script>';
            echo '<script>windows.location="datos.php"</script>';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATOS ENFERMERO</title>
</head>
<body>
<form method="POST" name="formreg" id="formreg" action="" autocomplete="off">
    <label>DOCUMENTO DE ENFERMERO<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="tel" name="docum"  class="form-control" placeholder="Ingrese su documento">
        </div>
        <label>NOMBRE<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre">
        </div>
        <label>APELLIDO<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="text" name="apellido"  class="form-control" placeholder="Ingrese su apellido">
        </div>

        <a href="index.php" class=" text-primary">Volver</a>
        
        <p class="text-center">
            <input type="submit" name="validar" value="Guardar" class="btn btn-info" style="margin-right: 20px;">
            <input type="hidden" name="MM_insert" value="formreg"> 
        </p> 
    </form>

    
</body>
</html>