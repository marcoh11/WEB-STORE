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
//CONSULTAR SI HAY CARRO EN EL
$sql="SELECT COUNT(*) FROM carro_usuario WHERE idusuario=$id AND carroAceptado=0";
echo $sql;
$resultado=$mysqli->query($sql);
$row = $resultado->fetch_assoc();
$total=$row['COUNT(*)']; 
if($total==0){ 
//CREAMOS EL CARRO PARA EL USUARIO NUEVO
$sql2="SELECT MAX(idCarro) FROM carro_usuario";
    $resultado2=$mysqli->query($sql2);
    $row2 = $resultado2->fetch_assoc();
    $ultimo_id=$row2['MAX(idCarro)']; 
    $ultimo_id=$ultimo_id+1;   
    $stmt = $mysqli->prepare("INSERT INTO carro_usuario (idCarro, idUsuario) VALUES($ultimo_id,$id)");
    if ($stmt->execute()){ 
        header("Location: principal.php");
    }
}else{
    header("Location: principal.php");
}
?>