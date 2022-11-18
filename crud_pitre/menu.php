<?php
include('funciones.php');
session_start();
if (!isset($_SESSION['nusuario']))
{
    $_SESSION['nusuario']=$_POST['usuario'];
    $_SESSION['nclave']=$_POST['clave'];
}

$miconexion=conectar_bd('', 'sebas_sp');
$resultado=consulta($miconexion,"select * from usuarios where usua_nomuser='{$_SESSION['nusuario']}' and usua_contra='{$_SESSION['nclave']}'");
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- CSS only -->
        <title>Menu principal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <link href="estilos.css" rel="stylesheet"/>
        <link rel="stylesheet" href="nav.css">

    </head>
    <style>
    .menu{
        color:#fff;
        font-size: 45px;
    }
    body{
        background-image: url(img/fondo.jpg);
        height: 100vh;
        cursor: url(cur/cursor1.png), pointer;
    }
</style>
    <nav id="top" class="navbar navbar-expand-sm bg navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">Crud Pitre</a>
        
        <!-- Links -->
        <ul class="navbar-nav">

            <li class="nav-item">
            <a class="nav-link coco" onclick="location.href ='menu.php'" href="">inicio</a>
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Agregar</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="location.href ='registro_aprendiz.php'" href="#">Aprendiz</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='crear_ficha.php'" href="#">Ficha</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='crear_programa.php'" href="#">Programa</a></li>
            </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Consultar</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="location.href ='consulta_aprendiz.php'" href="#">Aprendiz</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='consultar_ficha.php'" href="#">Ficha</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='consultar_programa.php'" href="#">Programa</a></li>
            </ul>
            </li>
            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Modificar</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="location.href ='modificar_aprendiz.php'" href="#">Aprendiz</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='modificar_ficha.php'" href="#">Ficha</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='modificar_programa.php'" href="#">Programa</a></li>
            </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Eliminar</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="location.href ='borrar_aprendiz.php'" href="#">Aprendiz</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='borrar_ficha.php'" href="#">Ficha</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="location.href ='borrar_programa.php'" href="#">Programa</a></li>
            </ul>
            </li>

            <li id="sesion" class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"> <img src="img/perfil1.png" width="25px" alt="">Sebastian Pitre</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=sebas_sp">Configuracion</a>
                <div class="dropdown-divider"></div>
                <a id="cerrar" class="dropdown-item" onclick="location.href ='index.php'"><span>Cerrar Sesion</span></a>
                </div>
            </li>
        </ul>
    </nav>

<!--//////////////////////////////////////////////////////-->

        <div class="menu">
            <br>
            <?php if($resultado->num_rows>0) ?> 
                <?php
                if($resultado->num_rows>0)
                {
                $fila = $resultado->fetch_object();
                $_SESSION['Tipo_usuario']=$fila->usua_tipo;
                ?>
                <label class="menuh1">Bienvenido <?php echo $_SESSION['nusuario'] ?></label><br><br>

                <input style="width: 20%;" class="btn btn-primary " type="button" onclick="location.href ='registro_aprendiz.php'" value="Registro de aprendices">
                <input style="width: 20%;" class="btn btn-primary " type="button" onclick="location.href ='consulta_aprendiz.php'" value="Consulta de aprendices">
                <br><br>
                <input style="width: 20%;" class="btn btn-primary " type="button" onclick="location.href ='modificar_aprendiz.php'" value="Actualizacion de aprendices">
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='borrar_aprendiz.php'" value="Borar aprendices">
                <br><br>
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='crear_programa.php'" value="Crear programa">
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='consultar_programa.php'" value="Consultar programa">
                <br><br>
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='modificar_programa.php'" value="Modificar programa">
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='borrar_programa.php'" value="Eliminar programa">
                <br><br>
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='crear_ficha.php'" value="Crear ficha">
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='consultar_ficha.php'" value="Consultar ficha">
                <br><br>
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='modificar_ficha.php'" value="Modificar ficha">
                <input style="width: 20%;" class="btn btn-primary" type="button" onclick="location.href ='borrar_ficha.php'" value="Eliminar ficha">
                <br>
                <?php
                }
                else
                {
                    echo "Puede encontrar todas las opciones en el menú superior 🔺";
                }
                $miconexion->close();
                ?>
    </body>
</html>