<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM tabla";
    $query=mysqli_query($con,$sql);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Iron Revolution</title>
  </head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="https://static.wixstatic.com/media/2ae626_4fd1d2bf1a7842b797870469b0374c36~mv2.png/v1/fill/w_376,h_96,al_c,q_85,usm_0.66_1.00_0.01/IRwordLOGOpngnew.webp" alt="ironrevbanner">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="home.html" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="nosotros.html" class="nav-link px-2 text-white">Nosotros</a></li>
            </ul>
            <div class="text-end">
              <a href="registrodatos.php"  name="cancel" class="btn btn-secondary"r">Registrar</a>
            </div>
          </div>
        </div>
    </header>
    <div class="container">
      <h2>Gestión de datos</h2>
    </div>
    <div class="container">
      <table class="table" >
        <thead class="table-success table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre completo</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Usuario</th>
            <th>RUT</th>
            <th>Dirección</th>
            <th>Sexo</th>
            <th>Fecha de nacimiento</th>
            <th>Edad</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row=mysqli_fetch_array($query)){
          ?>
          <tr>
            <th><?php  echo $row['id']?></th>
            <th><?php  echo $row['nombrecompleto']?></th>
            <th><?php  echo $row['correo']?></th>
            <th><?php  echo $row['contrasena']?></th>
            <th><?php  echo $row['usuario']?></th>
            <th><?php  echo $row['rut']?></th>
            <th><?php  echo $row['direccion']?></th>
            <th><?php  echo $row['sexo']?></th>
            <th><?php  echo $row['fechanac']?></th>
            <th><?php  echo $row['edad']?></th>
            <th><a href="modificar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Modificar</a></th>
            <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
          </tr>
          <?php 
            }
          ?>
        </tbody>
      </table>
      <center><div class="container">
        <div class="container mt-5">
              <div class="col-12">
                <form method="POST" action="gestiondatos.php">
                  <div class="mb-3">
                    <select  class="form-select" id="buscar" name="buscar" placeholder="Sexo">
                                <option selected="true" disabled="disabled">Indique un sexo para buscar/filtrar</option>
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>Otros</option>
                    </select>
                  </div>
                  <button type="text" class="btn btn-primary">Buscar</button>
                </form>
              </div>
            </div>
            <div class="card col-12 mt-5">
              <div class="card-body">
                <?php 
                $busqueda=mysqli_query($con,"SELECT * FROM tabla WHERE sexo LIKE LOWER('%".$_POST["buscar"]."%')");
                $numero = mysqli_num_rows($busqueda); ?>
                <h5 class="card-tittle">Resultado (<?php echo $numero; ?>)</h5>
                <?php while ($resultado = mysqli_fetch_array($busqueda)){ ?>
                <p class="card-tittle"><?php echo $resultado["nombrecompleto"]; ?> - <?php echo $resultado["sexo"]; ?></p>
                <?php } ?>
              </div>
            </div>
    </div></center>
    <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="home.html" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="nosotros.html" class="nav-link px-2 text-muted">Nosotros</a></li>
          </ul>
          <p class="text-center text-muted">© 2021, Iron Revolution Gym, Hernán Gómez Rivera</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>