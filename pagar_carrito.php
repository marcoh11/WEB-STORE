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
//recibir variable del id_carro
$idcarro = $_GET['idcarrito'];


//GUARDA LA FECHA ACTUAL DE LA COMPUTADORA
ini_set('date.timezone','America/Lima');
$time=date('Y/m/d',time());
//GUARDA LA FECHA DE LA ENTREGA DE EL PRODUCTO :D
$entrega = date("Y/m/d",strtotime($time."+ 7 days"));
$time="'".$time."'";
global $mysqli;
//poner en insert into campos verdaderos


$sql="SELECT MAX(idCarro) FROM carro_usuario";
$resultado=$mysqli->query($sql);
$row = $resultado->fetch_assoc();
$ultimo_id=$row['MAX(idCarro)']; 

$sql2="SELECT totalCarro FROM carro_usuario WHERE idCarro=$idcarro";
$resultado2=$mysqli->query($sql2);
$row2 = $resultado2->fetch_assoc();
$monto=$row2['totalCarro']; 

if ($monto==0){
    //poner error de no tiene nada en carro
    header("Location: carrito.php");
}
else{

$stmt = $mysqli->prepare("UPDATE carro_usuario SET carroAceptado=1,fechaCompra=$time WHERE idCarro=$idcarro");	
if ($stmt->execute()){


    //crea nuevo carro
    $sql="SELECT MAX(idCarro) FROM carro_usuario";
    $resultado=$mysqli->query($sql);
    $row = $resultado->fetch_assoc();
    $ultimo_id=$row['MAX(idCarro)']; 
    $ultimo_id=$ultimo_id+1;   
    $stmt = $mysqli->prepare("INSERT INTO carro_usuario (idCarro, idUsuario) VALUES($ultimo_id,$id)");
    if ($stmt->execute()){ 
        header("Location: carrito.php");
    }
    echo "hecho";
 
    } else {
    return 0;	
}

}






?>