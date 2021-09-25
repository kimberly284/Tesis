<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-users"></i>  Habitacion 2 </h1>

   
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="table-info">
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">DPI</th>
      <th scope="col">Dirección</th>
      <th scope="col">Telefono</th>
      <th scope="col">Fotografía</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php 


$query=mysqli_query($conexion,'SELECT * FROM `paciente` WHERE  class="Segundo";');

      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['name']).'</td>
          <td>'.$result['dpi'].'</td>
          <td>'.ucwords($result['address']).'</td>
          <td>'.$result['pcontact'].'</td>
          <td><img src="images/'.$result['photo'].'" height="50px"></td>
          <td><H1><b>Ocupado
<a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=delete&id='.base64_encode($result['id']).'&photo='.base64_encode($result['photo']).'">
             <i class="fas fa-trash-alt"></i></a>
 </b></H1></td>';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>  
</script>