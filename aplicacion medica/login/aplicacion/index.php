<?php require_once 'form/admin/conexion.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="form/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="form/css/style.css">
    <title>Informacion de Pacientes</title>
  </head>
  <body>
    <div class="container"><br>
    
          <h1 class="text-center">Multimedica</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable">
              <tr>
                <th colspan="2">
                  <p class="text-center">Información del Paciente</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Selecciona Habitacion</p>
                </td>
                <td>
                   <select class="form-control" name="class">
                     <option value="">
                       Selecciona
                     </option>
                     <option value="Primero">
                       #1
                     </option>
                     <option value="Segundo">
                     #2
                     </option>
                     <option value="Tercero">
                     #3
                     </option>
                     <option value="Cuarto">
                     #4
                     </option>
                     <option value="Quinto">
                     #5
                     </option>
                     <option value="Quinto">
                     #6
                     </option>
                   </select>
                </td>
              </tr>

              <tr>
                <td>
                  <p><label for="dpi">Número de DPI</label></p>
                </td>
                <td>
                  <input class="form-control" type="text"  id="dpi" name="dpi">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['class'];
          $dpi = $_POST['dpi'];
          if (!empty($choose && $dpi)) {
            $query = mysqli_query($conexion,"SELECT * FROM `paciente` WHERE `dpi`='$dpi' AND `class`='$choose'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['dpi']==$dpi && $choose==$row['class']) {
                $stdpi= $row['dpi'];
                $stname= $row['name'];
                $stclass= $row['class'];
                $address= $row['address'];
                $photo= $row['photo'];
                $pcontact= $row['pcontact'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <td rowspan="5"><h3>Información del Paciente</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
                <td>Nombre</td>
                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Número del documento de identificacion (DPI)</td>
                <td><?= isset($stdpi)?$stdpi:'';?></td>
              </tr>
              <tr>
                <td>Habitacion</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>Dirección</td>
                <td><?= isset($address)?$address:'';?></td>
              </tr>
              <tr>
                <td>NUmero de Telefono</td>
                <td><?= isset($pcontact)?$pcontact:'';?></td>
              </tr>
            </table>
          </div>
        </div>  
      <?php 
          }else{
                echo '<p style="color:red;">Por favor ingrese numero de identificacion y habitacion correcta</p>';
              }
            }else{
              echo '<p style="color:red;">Ls ingresada no coincide</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Datos no encontrados");</script>
            <?php }
          }; ?>
  
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>