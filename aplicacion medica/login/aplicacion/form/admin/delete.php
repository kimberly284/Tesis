


<?php 


	$id = base64_decode($_GET['id']);
	$photo = base64_decode($_GET['photo']);
	if(mysqli_query($conexion,"DELETE FROM `paciente` WHERE `id` = '$id'")){
		unlink('images/'.$photo);
		header('Location: index.php?page=mostrar-paciente&delete=success');
	}else{
		header('Location: index.php?page=mostrar-paciente&delete=error');
	
}

 
