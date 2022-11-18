<!DOCTYPE html>
<html>
  <head>
    <title>Eliminacion de Programas</title>
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
            <form name="formulario" role="form" method="post"><br>
                <strong class="lgris">Ingrese criterio de busqueda</strong><br>
                <br>
                <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" /><br>
                  <input style="width: 48%;" class="btn btn-primary" type="submit" value="Eliminar" >
                  <input style="width: 48%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
                <br><br>
            </form>

          <div id="divconsulta">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              $vnombre=$_POST['nombre'];
              $miconexion=conectar_bd('', 'sebas_sp');
              $resultado=consulta($miconexion,"select * from programa where programa_nombre='{$vnombre}'");
              $resultado2=consulta($miconexion,"delete from programa where programa_nombre='{$vnombre}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  echo "id: ".$fila->programa_id."<br>"."Nombre del programa:".$fila->programa_nombre."<br>"."Tipo: ".$fila->programa_tipo."<br>";
                  if($resultado2)
                  echo "<br> Datos borrados exitosamente";
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