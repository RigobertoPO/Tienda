<?php
$nombre=$_POST['nombre'];
$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$existencia=$_POST['existencia'];
if(empty($nombre)||empty($tipo)) //valido que no sea vacío
{
   header("Location: nuevoProducto.php");
   exit(); 
}
include_once '../../conexion.php';
$mysqlconexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
$sqlConsulta="INSERT INTO Productos(Nombre,IdTipoProducto,Precio,Existencia)
VALUES ('$nombre','$tipo','$precio','$existencia')";
if($resultado=$mysqlconexion->query($sqlConsulta))
{
    header("Location: productos.php");
}
else{
    echo $resultado;
}
?>