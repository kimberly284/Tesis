<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion</title>

	<?php require_once "scripts.php"; ?>
</head>
<style>
body {
  background-image: url('http://a21.com.mx/sites/default/files/medicina%20de%20aviacio%CC%81n.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>




<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading"><b>Inicio de Sesion</b></div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/icono.png" height="250">
					</div>
					<p></p>
					<label>Usuario</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Contraseña</label>
					<input type="password" id="password" class="form-control input-sm" name="">
					<p></p>
					<span class="btn btn-primary" id="entrarSistema">Iniciar</span>
				
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="aplicacion/index.html";
							}else{
								alertify.alert("No se puede iniciar sesión, por favor verificar datos ingresados ");
							}
						}
					});
		});	
	});
</script>