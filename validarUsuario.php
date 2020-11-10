<?php
$correo=$_POST['usuario'];
$password=$_POST['password'];
include_once 'conexion.php';
$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
$consulta="SELECT * from Usuarios WHERE CorreoElectronico='".$correo."'";
$resultado=$mysqlConexion->query($consulta);
if($registro=$resultado->fetch_array(MYSQLI_ASSOC))
{
    if($registro['Password']==$password)
    {
        session_start();
        $_SESSION['idUsuario']=$registro['Id'];
        $_SESSION['nombreUsuario']=$registro['CorreoElectronico'];
        $_SESSION['tipoUsuario']=$registro['Tipo'];
        header("Location: index.php");
    }
    else{
        header("Location: login.php");
        exit();
    }
}
else{
    header("Location: login.php");
    exit();  
}
?>