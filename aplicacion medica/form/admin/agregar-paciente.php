<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addstudent'])) {
  	$name = $_POST['name'];
  	$dpi = $_POST['dpi'];
  	$address = $_POST['address'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];
  	
  	$photo = explode('.', $_FILES['photo']['name']);
  	$photo = end($photo); 
  	$photo = $dpi.date('Y-m-d-m-s').'.'.$photo;

  	$query = "INSERT INTO `paciente`(`name`, `dpi`, `class`, `address`, `pcontact`, `photo`) VALUES ('$name', '$dpi', '$class', '$address', '$pcontact','$photo');";
  	if (mysqli_query($conexion,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Paciente Ingresado Exitosamente</p>';
  		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Paciente no ingresado.</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Registar paciente<small class="text-warning"> Paciente</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="mostrar-paciente.php">Volver al listado de pacientes </a></li>
     <li class="breadcrumb-item active" aria-current="page">Registrar Paciente</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">pacienteInsert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Nombre del Paciente</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>"  required="">
	  	</div>
	  	<div class="form-group">
		    <label for="dpi">Número de Identificacion (DPI)</label>
		    <input name="dpi" type="text" value="<?= isset($dpi)? $dpi: '' ; ?>" class="form-control"  id="dpi" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Dirección del Paciente</label>
		    <input name="address" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="address" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Número de Contacto</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact"  value="<?= isset($pcontact)? $pcontact: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="class">Habitacion asignada</label>
		    <select name="class" class="form-control" id="class" required="">
		    	<option>Selecciona</option>
		    	<option value="Primero">1</option>
		    	<option value="Segundo">2</option>
		    	<option value="Tercero">3</option>
		    	<option value="Cuarto">4</option>
		    	<option value="Quinto">5</option>
				<option value="sexto">6</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Fotografía o copia de DPI del Paciente</label>
		    <input name="photo" type="file" class="form-control" id="photo" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addstudent" value="Agregar " type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>