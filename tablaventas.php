<?php 
session_start(); 
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
$nombre = $_SESSION['nombreUsuario'];
$apellido = $_SESSION['apellidoUsuario'];
require 'conection.php';
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
$id = $_SESSION['id'];
$tipoUusuario = $_SESSION['tipoUsuario'];
if($tipoUusuario == 1){
    $where = "";
} else if($tipoUusuario == 0){
    $where = "WHERE id=$id";
}
$sql = "SELECT * FROM carro_usuario WHERE carroAceptado=1";
$resultado = $mysqli-> query($sql);

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

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistema Web</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="principal.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel de Control</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interfaz
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Utilities Collapse Menu -->
    

      <!-- Nav Item - Pages Collapse Menu -->
 

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="homeshop.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Tienda</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tabla.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabla de Usuarios</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="tablaventas.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabla de Ventas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre," ",$apellido;?></span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabla de Ventas</h1>
          <p class="mb-4">A continuacion se mostrara la tabla con la siguiente informacion de todos los usuarios registrados que compraron un producto.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Ventas Registradas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre y Apellido</th>
                      <th>Correo</th>
                      <th>Descripcion</th>
                      <th>Monto</th>
                      <th>Fecha de Compra</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                      <?php 
                      while ($row = $resultado->fetch_assoc()){                
                      ?>
                      <tr>
                          <td>
                          <?php
                          $idusuario = $row['idUsuario'];
                          $sql2 = "SELECT nombreUsuario,apellidoUsuario,correoUsuario FROM usuarios WHERE id=$idusuario";
                          $resultado2 = $mysqli-> query($sql2);
                          while ($row2 = $resultado2->fetch_assoc()){
                             echo $row2['nombreUsuario'];echo " "; echo $row2['apellidoUsuario'];
                            ?>
                          <td>
                          <?php echo $row2['correoUsuario'];?>
                          </td>
                          <?php }?>
                          <td>   
                          <!-- Aca deben ir los putos articulos ZZ -->
                          <?php
                            $idcarro = $row['idCarro'];
                            $sql2 = "SELECT p."."nombreProducto , c.cantidadCarro
                            FROM productos p INNER JOIN carro_producto c ON p.idProducto=c.idProducto WHERE c.idCarro=$idcarro";
                            $resultado2 = $mysqli-> query($sql2);
                            while ($row2 = $resultado2->fetch_assoc()){
                            echo $row2['nombreProducto']." [ ".$row2['cantidadCarro']." ]";
                            }
                            ?>

                          </td>
                          <td>
                            S./ <?php echo $row['totalCarro'];?>
                          </td>
                          <td>
                          <?php echo $row['fechaCompra'];?>
                          </td>
                          
                      </tr>
                      <?php }?>
                  </tbody>
                </table>








              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Soluciones Informaticas 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona " Salir " si deseas salir de la sesión .</div>
        <div class="modal-footer justify-content-center" >
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-success" href="logout.php">Salir</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
