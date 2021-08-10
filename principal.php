<?php

    session_start();
    require 'conection.php';
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    $nombre = $_SESSION['nombreUsuario'];
    $apellido = $_SESSION['apellidoUsuario'];
    $tipoUsuario = $_SESSION['tipoUsuario'];
    //CANTIDAD DE USUARIOS REGISTRADOS
    $sql = "SELECT COUNT(*) FROM usuarios";
    $resultado = $mysqli-> query($sql);
    $row = $resultado->fetch_assoc();
    $total_usuarios=$row['COUNT(*)'];
    //CANTIDAD DE VENTAS
    $sql2 = "SELECT COUNT(*) FROM carro_usuario WHERE carroAceptado=1";
    $resultado2 = $mysqli-> query($sql2);
    $row2 = $resultado2->fetch_assoc();
    $total_ventas=$row2['COUNT(*)'];
    //PRIMERO NECESITO SABER LA FECHA MES
    ini_set('date.timezone','America/Lima');
    $mes=date('m',time());
//GUARDA LA FECHA DE LA ENTREGA DE EL PRODUCTO :D
    ini_set('date.timezone','America/Lima');
    $año=date('Y',time());
//GUARDA LA FECHA DE LA ENTREGA DE EL PRODUCTO :D
    //CANTIDAD GANANCIA MENSUAL
   // SELECT ROUND(SUM(totalCarro),2) FROM carro_usuario WHERE fechaCompra LIKE '2020-%'
    // SELECT ROUND(SUM(totalCarro),2) FROM carro_usuario WHERE fechaCompra LIKE '%-08-%'
    //
    $sql3 = "SELECT ROUND(SUM(totalCarro),3) FROM carro_usuario WHERE fechaCompra LIKE '%-$mes-%'";
    $resultado3 = $mysqli-> query($sql3);
    $row3 = $resultado3->fetch_assoc();
    $ventas_mes=$row3['ROUND(SUM(totalCarro),3)'];
    //CANTIDAD DE GANANCIA ANUAL
    //PRIMERO NECESITO SABER EL AÑO
    $sql4 = "SELECT ROUND(SUM(totalCarro),3) FROM carro_usuario WHERE fechaCompra LIKE '$año-%'";
    $resultado4 = $mysqli-> query($sql4);
    $row4 = $resultado4->fetch_assoc();
    $ventas_año=$row4['ROUND(SUM(totalCarro),3)'];
?>
<!DOCTYPE html>
<html lang="es">

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
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
      <li class="nav-item active">
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
     

      <!-- Divider -->
      <?php if($tipoUsuario == 0) { 
            header("Location: homeshop.php");
        
        ?>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Herramientas
      </div>

      <!-- Nav Item - Pages Collapse Menu -->


      <!-- Nav Item - Charts -->
      <?php } ?>
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
      <li class="nav-item">
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
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
         
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
                <div class="dropdown-divider"></div>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>
            <a href="tablaventas.php" class="d-none d-sm-inline-block btn btn-sm  btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Ver ventas</a>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center align-items-center ">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-5 col-lg-7 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ganancias (Mes)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">S./ <?php echo $ventas_mes;?></div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-5 col-lg-7 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ganancias (Anual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">S./ <?php echo $ventas_año;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-5 col-lg-7 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cantidad de ventas</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_ventas;?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $total_ventas;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-5 col-lg-7 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total de usuarios</div>


                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_usuarios;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
           <!--  <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Cuadro de Ventas</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     
                    </a>
                  </div>
                </div>

                <div class="card-body">
                <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div> -->
            </div>

            <!-- Pie Chart -->
         

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              

              <!-- Color System -->


            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->

              <!-- Approach -->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
