<?php
            include("conection.php");
            $idcarro= $_GET["idcarro"];
            $idproducto = $_GET["agregarid"];
            $subtotal= $_GET["subtotal"];
            global $mysqli;


            //poner en insert into campos verdaderos
            $stmt = $mysqli->prepare("INSERT INTO carro_producto (idCarro, idProducto, cantidadCarro ,subtotalCarro) VALUES($idcarro,$idproducto,1,$subtotal)");
            if ($stmt->execute()){
                //aca poner el update
                // ACTUALIZAR NI BIEN LE DAMOS A COMPRAR
                $sql="SELECT ROUND(SUM(subtotalCarro),2) FROM carro_producto WHERE idCarro=$idcarro";
                $resultado=$mysqli->query($sql);
                $row = $resultado->fetch_assoc();
                $total=$row['ROUND(SUM(subtotalCarro),2)']; 


                $stmt = $mysqli->prepare("UPDATE carro_usuario SET totalCarro=$total WHERE idCarro=$idcarro");
                if ($stmt->execute()){ 
                    header("Location: carrito.php");
                }
	
            }		

?>