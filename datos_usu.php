<?php 
require_once ("db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

?>


<?php 
date_default_timezone_set('America/Bogota');
$fecha_actual = date('Y-m-d');
?>

<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $documento = $_POST['documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $fecha = $_POST['fecha'];
        $nombre_vacu = $_POST['vacuna'];
        $docu_enfe = $_POST['doc_enfer'];
        


        if ( $documento=="" || $nombre==""|| $apellido==""|| $edad==""|| $fecha=="" || $nombre_vacu=="" || $docu_enfe=="")
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "index.php"</script>';
        }

        else
        {
            $insertsql = $con -> prepare("INSERT INTO usuario (documento,nombre,apellido,edad,fecha,nom_vacuna,docu_enfermero) VALUES ('$documento','$nombre','$apellido','$edad','$fecha','$nombre_vacu','$docu_enfe')");
            $fila1 = $insertsql-> execute();
            echo '<script>alert ("Datos registrados exitosamente");</script>';
            echo '<script>windows.location="index.php"</script>';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
<form method="POST" name="formreg" id="formreg" action="" autocomplete="off">
    <label>DOCUMENTO<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="tel" name="documento"  class="form-control" placeholder="Ingrese su documento">
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
        <label>EDAD<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="tel" name="edad"  class="form-control" placeholder="Ingrese su edad">
        </div>
        <label>FECHA DE VACUNA<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="date" name="fecha"   class="form-control" placeholder="Ingrese fecha de vacuna">
        </div>
        <label>NOMBRE DE VACUNA<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="text" name="vacuna"  class="form-control" placeholder="Ingrese nombre de vacuna">
        </div>

        <label>DOCUMENTO DE ENFERMERO<span class="text-danger">*</span></label>
        <div class="">
            <div class=""><i class=""></i></div>
            <input type="text" name="doc_enfer"  class="form-control" placeholder="Ingrese documento">
        </div>

        <a href="index.php" class=" text-primary">Volver</a>

        <p class="text-center">
            <input type="submit" name="validar" value="Guardar" class="btn btn-info" style="margin-right: 20px;">
            <input type="hidden" name="MM_insert" value="formreg"> 
        </p> 
    </form>

    
</body>
</html>

