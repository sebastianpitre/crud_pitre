<!DOCTYPE html>
<html>
  <head>
    <title>Crear Ficha</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </head>
  <body>
    <div id="div1" class="contenidos">
        <br>
        <div id="div2">
          <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?><?php } ?>
          <div id="div3">
          <?php
            if($_SESSION['Tipo_usuario']=='Admin')
            {
            ?>
            <form id="formulario" role="form" method="post" action="guardado_ficha.php">
            <div class="cold-md-12"><br>
              <strong class="lgris">Crear la ficha</strong>
              <br>
              <label class="lgris">Numero:</label>
                <input class="form-control" type="number" name="nombre" min="9999" max="9999999999" value="" placeholder="Numero" required/>
                <br>
              <label class="lgris">Nombre del programa:</label>
              <div class="form-group col-xs-2">
                <?php 
                                include('funciones.php');
                                $miconexion=conectar_bd('','sebas_sp');
                                $consulta = "SELECT * FROM programa";
                                $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                                
                                ?>
                  <select class="form-control" name="progra">
                    <option value="" selected></option>
                    <?php while ($opcion = $resultado -> fetch_object()) { ?>
                    <option value="<?php echo $opcion->programa_id;?>"><?php echo $opcion->programa_nombre;?></option>
                                    <?php } ?>
                  </select>
              <br>
              <input class="btn btn-primary" type="submit" value="Guardar">
              <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
            </div>
            </form>
            <?php
            }
            else
            {
                echo "No tiene permisos para realizar esta acción";
            }
            ?>
            <br>
          </div>
        </div>
    </div>
  </body>
</html>