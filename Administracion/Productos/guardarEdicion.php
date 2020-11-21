<?php
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $tipo=$_POST['tipo'];
    $precio=$_POST['precio'];
    $existencia=$_POST['existencia'];
    include_once '../../conexion.php';
    $mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
    $consulta="UPDATE Productos SET Nombre='$nombre',IdTipoProducto='$tipo',precio='$precio',Existencia='$existencia' Where Id='$id'";
    if($resultado=$mysqlConexion->query($consulta))
    {
        header("Location:productos.php");
    }
    else
    {
        header("Location:editarProducto.php");
    }

?>