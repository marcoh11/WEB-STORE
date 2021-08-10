<?php
	require 'conection.php';
	require 'funciones.php';
    $errors = array();
    if(!empty($_POST)){
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $apellido = $mysqli->real_escape_string($_POST['apellido']);
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $con_password= $mysqli->real_escape_string($_POST['con_password']);
    $captcha= $mysqli->real_escape_string($_POST['g-recaptcha-response']);
    $activo=0;
    $tipoUsuario=0;
    $secret='6LdBJL0ZAAAAAL2fTE8-ABAZk_ikmJfbw7lnJLZa';
    if(!$captcha){
        $errors[]="Por favor verifica el captcha";
    }
    if(isNull($nombre,$apellido,$usuario,$password,$con_password,$email)){
        $errors[]="Debe llenar todos los campos";
    }
    if(!isEmail($email)){
        $errors[]="Direccion de correo inválida";
    }
    if(!validaPassword($password,$con_password)){
        $errors[]="Las contraseñas no coinciden";
    }
    if(usuarioExiste($usuario)){
        $errors[]="El usuario $usuario ya existe";
    }
    if(emailExiste($email)){
        $errors[]="El correo $email ya pertenece a otro usuario";
    }
    if(count($errors)==0){
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $arr=json_decode($response,TRUE);
            if($arr['success']){
                $pass_hash=sha1($password);
                $token=generateToken();   
                $registro=registraUsuario($usuario, $pass_hash, $nombre,$apellido, $email, $activo, $token, $tipoUsuario);
                if($registro>0){
                    $url='https://'.$_SERVER["SERVER_NAME"].'/informatica/activar.php?id='.$registro.'&val='.$token;
                    $asunto='Activar Cuenta - Sistema de Usuarios';
                    $cuerpo="Estimado $nombre:<br /><br />Para continuar con el proceso de registro,
                    es indispensable que de click en el siguiente link<a href='$url' > Activar cuenta </a>";
                    if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
                        echo "Para terminar el proceso de registro siga las instrucciones que le hemos
                        enviado a la direccion de correo electronico: $email";
                        echo "<br><a href='index.php'> Iniciar Sesión</a>";
                        exit;
                    } else{
                        $errors[]="Error al enviar Email";
                    }
                } else{
                    $errors[]="Error al registrar";
                }
            }else{
                $errors[]="Error al comprobar Captcha";
            }
    }
    
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Sistemas informaticos - Registro</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.css" rel="stylesheet">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="bg-gradient-success">
    <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0" >
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                </div>
                <form id="signupform" class="user" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="nombre" class="form-control form-control-user" id="exampleFirstName" placeholder="Nombres" value="<?php if(isset($nombre)) echo $nombre; ?>" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="apellido" class="form-control form-control-user" id="exampleLastName" placeholder="Apellidos" value="<?php if(isset($apellido)) echo $apellido; ?>" required>
                </div>
                </div>
                <div class="form-group">
                <input type="text" name="usuario" class="form-control form-control-user" id="exampleInputUser" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
                </div>
                <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Correo electrónico" value="<?php if(isset($email)) echo $email; ?>" required>
                </div>
                <div class="form-group row" >
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required>
                    </div>
                    <div class="col-sm-6">
                    <input type="password" name="con_password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir contraseña" required>
                    </div>
                </div>
                <div class="autentificador">    
                    <div class="g-recaptcha" data-sitekey="6LdBJL0ZAAAAACPcDyZaLFpYx8FzGfMvD-Zb6U44"></div>
                </div>
                <button class="btn btn-success btn-user btn-block" type="submit">
                Crear cuenta
                </button>
                <hr>
                <!--    <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
                </form>
                <?php echo resultBlock($errors); ?>
                <!-- <hr> -->
                <div class="text-center">
                <a class="small" href="forgot-password.html">Olvidaste la contraseña ?</a>
                </div>
                <div class="text-center">
                <a class="small" href="index.php">Ya tienes una cuenta ? Entra!</a>
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