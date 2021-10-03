<?php require_once 'conexion.php';


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <title>pacientes</title>
  </head>
  <body>
  <nav class="navbar navbar-light" style="background-color: #052A69;">
  <p style="text-align:center">

<p style="color: white;" ><i class="fas fa-user-injured fa-3x">INFORMACION DE PACIENTES</i><i class="fas fa-user-injured fa-3x"></i></p>


</p>
<div >
			<a href="../../../php/salir.php" class="btn btn-info"><b>Cerrar Sesion</b></a>
				
			</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 
</nav>
<br>
    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
             
              </a>
              <a href="index.php?page=mostrar-paciente" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Listado de pacientes</a>
              <a href="index.php?page=agregar-paciente" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Registrar nuevo paciente</a>
              <a href="../../index.html" class="list-group-item list-group-item-action"><i class="fa fa-home"></i> volver a Inicio</a>
              
             
            </div>
          </div>
          <div class="col-md-9">
             <div class="content">
                 <?php 
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'].'.php';
                    }else{
                      $page = 'dashboard.php';
                    }

                    if (file_exists($page)) {
                      require_once $page;
                    }else{
                      require_once '404.php';
                    }
                  ?>
             </div>
        </div>
        </div>  
    </div>
    <div class="clearfix"></div>
    
    
    
    <script type="text/javascript">
      jQuery('.toast').toast('show');
    </script>
  </body>
</html>