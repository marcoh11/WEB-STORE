<?php 
session_start(); 
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
//para usar mas adelante 
$nombre = $_SESSION['nombreUsuario'];
$apellido = $_SESSION['apellidoUsuario'];
require 'conection.php';
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
//privilegios para mas adelante
$id = $_SESSION['id'];
$tipoUusuario = $_SESSION['tipoUsuario'];
if($tipoUusuario == 1){
    $where = "";
} else if($tipoUusuario == 0){
    //usar el were mas adelante para mostrar solo los de determinado id de categoria
    $where = "WHERE id=$id";
}
$sql = "SELECT * FROM categoria";
$resultado = $mysqli-> query($sql);
$buscarid= $_GET["idProducto"];//recibir id de la pagina anterior
$sql3="SELECT * FROM productos WHERE idProducto='$buscarid'";
$resultado3=$mysqli->query($sql3);
$sql4="SELECT * FROM carro_usuario WHERE idUsuario=$id AND carroAceptado=0";
$resultado4=$mysqli->query($sql4);
$row4 = $resultado4->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Soluciones Informáticas</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container">
      <a class="navbar-brand" href="homeshop.php">Soluciones Informáticas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="homeshop.php">Tienda
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="somos.html">¿Quiénes somos?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="carrito.php">Carrito</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Salir</a>
		      </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container" style="padding-bottom: 2rem">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Tienda</h1>
        <div class="list-group">
        <?php 
         while ($row = $resultado->fetch_assoc()){                
        ?>
          <a href="homeshop_categoria.php?idcategoria=<?php echo $row['idCategoria'];?>" class="list-group-item"><?php echo $row['nombreCategoria'];?></a>
          
        <?php }?>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      <?php 
       $row3 = $resultado3->fetch_assoc();?>
      <div class="col-lg-9">

        <div class="card" style="clip-path: inset(12rem 0 0 0); margin-top: -10rem">
          <img class="card-img-top img-fluid img-responsive" style="clip-path: inset(12rem 0 15rem 0); margin-bottom: -15rem;filter: blur()" src="<?php echo $row3['imagenUrl'];?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $row3['nombreProducto'];?></h3>
            <h4>S/. <?php echo $row3['precioProducto'];?></h4>
            <p class="card-text"><?php echo $row3['descripciondProducto'];?></p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.2 stars
        <a class="btn btn-primary btn-user float-right" href="agregar_carrito.php?agregarid=<?php echo $row3['idProducto'];?>&subtotal=<?php echo $row3['precioProducto'];?>&idcarro=<?php echo $row4['idCarro'];?>">Añadir al carrito</a>
      
          </div>
        </div>
        <!-- /.card -->


        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<footer class="py-5 bg-danger ">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Soluciones Informáticas 2020</p>
    </div>
    <!-- /.container -->
  </footer>
</html>
