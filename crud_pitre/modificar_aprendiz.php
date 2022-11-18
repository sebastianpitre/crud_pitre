<!DOCTYPE html>
<html>
  <head>
    <title>Modificación de Aprendices</title>
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
    <div id="divconsulta" class="contenidos">
      <br>
              <form name="formulario" role="form" method="post">
                <div class="col-md-12">
                  <br>
                    <strong class="regisldat">Ingrese criterio de busqueda</strong>
                    <br><br>
                    <input class="form-control" type="number" name="numid" min="9999" max="9999999999" autofocus value="" placeholder="IDENTIFICACIÓN" />
                    <br>
                      <div class="form-group cold-md-3">
                      <input style="width: 48%;" class="btn btn-primary" type="submit" value="consultar" >
                      <input style="width: 48%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
                    <br>
              </form>
              <br>
          </div>

          <div id="divconsulta2">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              session_start();
              $vnumid=$_POST['numid'];
              $miconexion=conectar_bd('', 'sebas_sp');
              $resultado=consulta($miconexion,"select * from aprindices where apre_numid='{$vnumid}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['ide1']=$fila->apre_id;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_aprendiz.php">
                    <div class="col-md-12">
                      <strong class="lgris">Datos del aprendiz</strong><br>

                      <label class="lgris">Id:</label>
                      <input class="form-control" type="text" name="ide1" disabled="disabled" value="<?php echo $fila->apre_id?>"/>

                      <label class="lgris">Nombres:</label>
                      <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres" required value="<?php echo $fila->apre_nombres ?>"/>

                      <label class="lgris">Apellidos:</label>
                      <input class="form-control" style="text-transform:uppercase;" type="text" name="apellidos" value="<?php echo $fila->apre_apellidos ?>" required/>

                      <label class="lgris">Dirección:</label>
                      <input class="form-control" style="text-transform:uppercase;" type="text" name="direccion" value="<?php echo $fila->apre_direccion ?>" required/>

                      <label class="lgris">Teléfono:</label>
                      <input class="form-control" type="number" name="telefono" min="9999" max="9999999999" value="<?php echo $fila->apre_telefono ?>" required/>
                      <br>
                      <input class="btn btn-primary" type="submit" value="Actualizar">
                      <br>
                    </div>
                </form>
                <?php
              }
            else{
                echo "No existen registros";
                }
            $miconexion->close();
          }?>
          </div>
      </div>
    </div>
  </body>
</html>