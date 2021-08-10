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
$sql = "SELECT * FROM usuarios";
$resultado = $mysqli-> query($sql); //para aplicar los datos formulario cliente mas adelante
$sql3="SELECT idCarro,totalCarro FROM carro_usuario WHERE idUsuario=$id AND carroAceptado=0";
$resultado3=$mysqli->query($sql3);
$row3 = $resultado3->fetch_assoc();
$idCarro=$row3['idCarro'];
$totalCarro=$row3['totalCarro'];
$sql4="SELECT * FROM carro_producto WHERE idCarro=$idCarro";
$resultado4=$mysqli->query($sql4);

//pasar el input a una variable

if(!empty($_POST)){
$cantidad = $mysqli->real_escape_string($_POST['cantidad']);
$subtotalcarro= $_GET["subtotal"];
$idcarro=$_GET["idcarrito"];
$idproducto=$_GET["idProducto"];
header("Location: actualizar_carro.php?cantidadcarro=$cantidad&subtotal=$subtotalcarro&idcarrito=$idcarro&idproducto=$idproducto");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<!------ Include the above in your HEAD tag ---------->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Soluciones Informáticas</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
	<div class="container">
      <a class="navbar-brand" href="homeshop.php">Soluciones Informáticas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto float-right">
          <li class="nav-item">
            <a class="nav-link" href="homeshop.php">Tienda
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="somos.html">¿Quiénes somos?</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="carrito.php">Carrito</a>
		  </li>
		  <li class="nav-item">
            <a class="nav-link" href="logout.php">Salir</a>
		  </li>
		  
        </ul>
      </div>
    </div>
  </nav>	
<div class="container" style="min-height: calc(100vh - 16.2rem)">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Producto</th>
							<th style="width:10%">Precio</th>
							<th style="width:8%">Cantidad</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<?PHP
					while ($row4 = $resultado4->fetch_assoc()){ 
						$idpro=$row4['idProducto'];
						$sql2="SELECT * FROM productos WHERE idProducto=$idpro";
						$resultado2=$mysqli->query($sql2);
						$row2 = $resultado2->fetch_assoc();    
					?>	
					<tbody>
						<tr name="<?PHP echo $row2['idProducto'];?>">
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="<?PHP echo $row2['imagenUrl'];?>" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
									
										<h4 class="nomargin"><?PHP echo $row2['nombreProducto'];?></h4>
										
										<p class="descripcion"><?PHP echo $row2['descripcionProducto'];?></p> 
									</div>
								</div>
							</td>
							<td data-th="Price"><?PHP echo $row2['precioProducto'];?></td>
							<td data-th="Quantity">
							<form id="signupform" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
								<input type="number" name="cantidad" class="form-control text-center" value="<?PHP echo $row4['cantidadCarro'];?>">
							</td>
							<td data-th="Subtotal" class="text-center"><?PHP echo $row4['subtotalCarro'];?></td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm" formaction="carrito.php?idcarrito=<?PHP echo $row4['idCarro'];?>&idProducto=<?PHP echo $row4['idProducto'];?>&subtotal=<?PHP echo $row2['precioProducto'];?>" type="submit"><i class="fa fa-refresh"></i></button>
							</form>	
								
								<a class="btn btn-danger btn-sm" href="borrar_carrito.php?idproducto_eliminado=<?php echo $row2['idProducto'];?>&idcarrito=<?PHP echo $row4['idCarro'];?>"><i class="fa fa-trash-o"></i></a>								
							</td>
						</tr>
					</tbody>
					<?PHP
				}
				?>
					<tfoot>
						
						<tr>
							<td><a href="homeshop.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir Comprando</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total S/. <?php echo $totalCarro;  ?></strong></td>
							<td><a href="#"class="btn btn-success btn-block" data-toggle="modal" data-target="#logoutModal">Pagar <i class="fa fa-angle-right"></i></a></td>

						</tr>
					</tfoot>
				</table>
	
</div>
<!-- Seguro que desea comprar? -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea comprar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Comprar" Comprara la seleccion .</div>
        <div class="modal-footer justify-content-center" >
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger"  href="pagar_carrito.php?idcarrito=<?php echo $idCarro;?>">Comprar</a>
        </div>
      </div>
    </div>
  </div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


</body>
<footer class="py-5 bg-danger fix-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Soluciones Informáticas 2020</p>
    </div>
    <!-- /.container -->
  </footer>
</html>
