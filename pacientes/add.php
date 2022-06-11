<?php
include('../config/config.php');
include('data.php');

if (isset($_POST) && !empty($_POST)){
  /* SI EXISTE UN REGISTRO Y NO ESTA VACIO */

  $data= new recetas(); /* LLAMO A MI LIBRO DE RECETAS */

  if ($_FILES['imagen']['name'] !== ''){
    $_POST['imagen'] = saveImage($_FILES);
  }

  $save = $data-> save($_POST); /* UTILICE LA RECETA SAVE */
  if($save){
    $mensaje= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div> ';
  }else{
    $mensaje='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>

<?php 
      if (isset($mensaje)){
        echo $mensaje;
      }
?>
<!-- CREAN FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombres" id="nombres"   class="form-control" >
    
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Correo</label>
    <input type="email" name="correo" id="correo"  class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Celular</label>
    <input type="text" name="celular" id="celular" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha</label>
    <input type="datetime" name="fecha" id="fecha" class="form-control"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  <div class="col-12">
    <button  class="btn btn-primary">Registrar</button>
  </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>