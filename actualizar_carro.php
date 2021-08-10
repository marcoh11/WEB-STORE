<?php
include("conection.php");
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





    $cantidadcarro= $_GET["cantidadcarro"];;
    $subtotalcarro= $_GET["subtotal"];
    $idcarro=$_GET["idcarrito"];
    $idproducto=$_GET["idproducto"];
    $subtotalcarro = $subtotalcarro*$cantidadcarro;

//ID CARRO TIENE QUE RECIBIR UNA VARIABLE
    global $mysqli;
		//poner en insert into campos verdaderos
	$stmt = $mysqli->prepare("UPDATE carro_producto SET cantidadCarro=$cantidadcarro,subtotalCarro=$subtotalcarro WHERE idCarro=$idcarro AND idProducto=$idproducto");	
		if ($stmt->execute()){
            $sql="SELECT ROUND(SUM(subtotalCarro),2) FROM carro_producto WHERE idCarro=$idcarro";
            $resultado=$mysqli->query($sql);
            $row = $resultado->fetch_assoc();
            $total=$row['ROUND(SUM(subtotalCarro),2)'];    
            $stmt = $mysqli->prepare("UPDATE carro_usuario SET totalCarro=$total WHERE idCarro=$idcarro");
            if ($stmt->execute()){ 
                header("Location: carrito.php");
            }
            echo "hecho";
            header("Location: carrito.php");
			} else {
			return 0;	
        }
		//poner en insert into campos verdaderos
?>