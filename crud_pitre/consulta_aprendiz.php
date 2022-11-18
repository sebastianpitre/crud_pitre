<!DOCTYPE html>
<html>
  <head>
    <title>Consulta de Aprendices</title>
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
                <strong class="ingapre">Ingrese criterio de busqueda</strong>
                <br><br>
                <label class="regisl">Identificacion:</label>
                 <input class="form-control" type="number" name="numid" min="9999" max="9999999999" value="" placeholder="IDENTIFICACIÓN" />
                 <label class="regisl">Nombres:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres" value="" placeholder="Nombres" />
                  <label class="regisl">Apellidos:</label>
                  <input class="form-control" style="text-transform: uppercase;" type="text" name="apellidos" value="" placeholder="Apellidos" /><br>
                 <input style="width: 48%;" class="btn btn-primary" type="submit" value="Consultar" >
                 <input style="width: 48%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver"><br>
                <br>
            </form>
            <br>
        <div id="divconsulta2">
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
          include('funciones.php');
          $vnumid=$_POST['numid'];
          $vnombres=$_POST['nombres'];
          $vapellidos=$_POST['apellidos'];
          $miconexion=conectar_bd('', 'sebas_sp');
          $resultado=consulta($miconexion,"select * from aprindices where trim(Apre_numid) like '%{$vnumid}%' and (trim(Apre_nombres) like '%{$vnombres}%' and trim(Apre_apellidos) like '%{$vapellidos}%')");
          if($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo "id: ".$fila->apre_id."<br>"."Tipo de id: ".$fila->apre_tipoid."<br>"."Numero de identificacion: ".$fila->apre_numid."<br>"."Nombres: ".$fila->apre_nombres."<br>"."Apellidos: ".$fila->apre_apellidos."<br>"."Direccion: ".$fila->apre_direccion."<br>"."Telefono: ".$fila->apre_telefono."<br>"."Ficha: ".$fila->apre_ficha."<br>";
                }
            }
          else{
            echo "No existen registros";
              }  
          $miconexion->close();
        }?>
        </div>
      </div>
  </body>
</html>