<?php 
require_once ("db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

$disp = $con -> prepare ("SELECT * FROM usuario ORDER BY usuario.documento ASC");
$disp -> execute();
$asigna = $disp -> fetchAll(PDO::FETCH_ASSOC);

?>

<?php

$dis = $con -> prepare ("SELECT * FROM enfermeros ORDER BY enfermeros.docu_enfermero ASC");
$dis -> execute();
$asign = $dis -> fetchAll(PDO::FETCH_ASSOC);

?>

<?php
// $vencimiento = ; 

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Pagina principal | Admin</title>
	<!-- core CSS -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../../images/logo.png"> 
</head> 

<body id="home">
	<section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown white">Mis servicios</h2>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-flag-o"></i>
                            </div>
                            <div class="media-body">
                                <a href="datos_enfer.php" class=" text-primary">Registro Enfermer@</a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-flag-o"></i>
                            </div>
                            <div class="media-body">
                                <a href="datos_usu.php" class=" text-primary">Registro de Usuario</a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <br>
                    <br>

                    <div class="title-flat-form title-flat-blue">Usuarios Vacunados</div>

                    <br>
                    <br>

                    <div class="">
                        <table class="tablap" >
                                <tr class="tit">
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Fecha de Vacuna</th>
                                <th>Documento Enfermero</th>
                                <th>Nombre de Enfermero</th>
                                <th>Apellido de Enfermero</th>
                            </tr>
                            <?php
                            foreach($asigna as $disp){
                                // Generar el código de barras para el id del producto
                                $codigo_barras = ($disp["documento"]); // Función a implementar

                                // Mostrar el código de barras en la tabla

                            foreach($asign as $dis){
                                    // Generar el código de barras para el id del producto
                                    $codigo_barras = ($dis["docu_enfermero"]); // Función a implementar
    
                                    // Mostrar el código de barras en la tabla
                            ?>
                            <tr>
                                <td> <?=$disp["documento"]?>  </td>
                                <td> <?=$disp["nombre"]?>  </td>
                                <td> <?=$disp["apellido"]?>  </td>
                                <td> <?=$disp["edad"]?>  </td>
                                <td> <?=$disp["fecha"]?>  </td>
                                <td><?=$dis["docu_enfermero"]?> </td>
                                <td> <?=$dis["nombre"]?>  </td>
                                <td> <?=$dis["apellido"]?>  </td>
                            </tr>
                            <?php
                            }
                        }
                            ?>
                        </table>