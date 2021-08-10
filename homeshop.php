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

//privilegios para mas adelante
$sql = "SELECT * FROM categoria ";
$resultado = $mysqli-> query($sql);
$sql2="SELECT * FROM productos ORDER BY descripcionProducto LIMIT 6";
$resultado2=$mysqli->query($sql2);
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Soluciones informáticas</a>
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
  <div class="container">

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

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
           
              <img class="d-block img-fluid" src="https://source.unsplash.com/WiONHd_zYI4/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
        
              <img class="d-block img-fluid" src="https://source.unsplash.com/p0j-mE6mGo4/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://source.unsplash.com/Koxa-GX_5zs/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
        <?php 
         while ($row2 = $resultado2->fetch_assoc()){                
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="item.php?idProducto=<?php echo $row2['idProducto'];?>"><img class="card-img-top" src="<?php echo $row2['imagenUrl'];?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="item.php?idProducto=<?php echo $row2['idProducto'];?>"><?php echo $row2['nombreProducto'];?></a>
                </h4>
                <h5>S/. <?php echo $row2['precioProducto'];?></h5>
                <p class="card-text"><?php echo $row2['descripcionProducto'];?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-danger">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Soluciones Informáticas 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
