<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    $oldPhoto = base64_decode($_GET['photo']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
  	$dpi = $_POST['dpi'];
  	$address = $_POST['address'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];
  	
  	if (!empty($_FILES['photo']['name'])) {
  		 $photo = $_FILES['photo']['name'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo); 
		 $photo = $roll.date('Y-m-d-m-s').'.'.$photo;
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `paciente` SET `name`='$name',`dpi`='$dpi',`class`='$class',`address`='$address',`pcontact`='$pcontact',`photo`='$photo' WHERE `id`= $id";
  	if (mysqli_query($conexion,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
			unlink('images/'.$oldPhoto);
		}	
  		header('Location: index.php?page=mostrar-paciente&edit=success');
  	}else{
  		header('Location: index.php?page=mostrar-paciente&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Actualizar la informacion del paciente<small class="text-warning"> Editar</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">

     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=mostrar-paciente">Todos los Paciente </a></li>
     <li class="breadcrumb-item active" aria-current="page">Registar Paciente</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `name`, `dpi`, `class`, `address`, `pcontact`, `photo`, `datetime` FROM `paciente` WHERE `id`=$id";
			$result = mysqli_query($conexion,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Nombre del Paciente</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="dpi">Número de Identificacion (DPI)</label>
		    <input name="dpi" type="text" class="form-control" id="dpi" value="<?php echo $row['dpi']; ?>"  required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Dirección del Paciente</label>
		    <input name="address" type="text" class="form-control" id="address" value="<?php echo $row['address']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Número de Contacto</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" value="<?php echo $row['pcontact']; ?>"  required="">
	  	</div>
	  	<div class="form-group">
		    <label for="class">Habitacion</label>
		    <select name="class" class="form-control" id="class" required="" value="">
		    	<option>Select</option>
		    	<option value="Primero" <?= $row['class']=='Primero'? 'selected':'' ?>>1</option>
		    	<option value="Segundo" <?= $row['class']=='Segundo'? 'selected':'' ?>>2</option>
		    	<option value="Tercero" <?= $row['class']=='Tercero'? 'selected':'' ?>>3</option>
		    	<option value="Cuarto" <?= $row['class']=='Cuarto'? 'selected':'' ?>>4</option>
		    	<option value="Quinto" <?= $row['class']=='Quinto'? 'selected':'' ?>>5</option>
				<option value="sexto" <?= $row['class']=='sexto'? 'selected':'' ?>>6</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Fotografía  o copia de DPI del paciente</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Editar Paciente" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>