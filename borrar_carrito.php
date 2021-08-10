<?php
    include("conection.php");
    $idproducto= $_GET["idproducto_eliminado"];
    $idcarro= $_GET["idcarrito"];
//ID CARRO TIENE QUE RECIBIR UNA VARIABLE
    global $mysqli;
		//poner en insert into campos verdaderos
	$stmt = $mysqli->prepare("DELETE FROM carro_producto WHERE idProducto=$idproducto AND idCarro=$idcarro");	
		if ($stmt->execute()){
            $sql="SELECT ROUND(SUM(subtotalCarro),2) FROM carro_producto WHERE idCarro=$idcarro";
            $resultado=$mysqli->query($sql);
            if($row = $resultado->fetch_assoc()){
            $total=$row['ROUND(SUM(subtotalCarro),2)']; 
            $stmt2 = $mysqli->prepare("UPDATE carro_usuario SET totalCarro=$total WHERE idCarro=$idcarro");
            if ($stmt2->execute()){ 
                header("Location: carrito.php");}  
            }
            } 
            else {
			return 0;	
            }
?>
