<?php 
  require "conection.php";  
  require 'funciones.php';
  session_start();
  $errors = array();
  if(isset($_SESSION['id'])){
  if($_SESSION['id']==1){
      header("Location: principal.php");}
  else{
      header("Location: homeshop.php");
    } 
}
  if($_POST){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $sql= "SELECT id, password , nombreUsuario , apellidoUsuario, tipoUsuario FROM usuarios WHERE usuario='$usuario'";
    $resultado = $mysqli->query($sql);
    $num = $resultado->num_rows;
    if($num>0){
      $row = $resultado->fetch_assoc();
      $password_bd = $row['password'];
      $pass_c = sha1($password);
      if($password_bd == $pass_c){
        $_SESSION['id']=$row['id'];
        $_SESSION['nombreUsuario']=$row['nombreUsuario'];
        $_SESSION['apellidoUsuario']=$row['apellidoUsuario'];
        $_SESSION['tipoUsuario']=$row['tipoUsuario'];
        header("Location: comprobar_carro.php");
      } else{
        $errors[]="La contraseña no coincide";
      }
    } else{
      $errors[]="El usuario no existe";
    }
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Soluciones Informaticas</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-success ">

  <div class="container ">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center vh-100">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                  </div>
                  <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="usuario" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recuerdame</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Ingresar
                    </button>
                    <hr>
                  </form>
                  <?php echo resultBlock($errors);?>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">¿Olvidaste la contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="registro.php">Crear una cuenta!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
