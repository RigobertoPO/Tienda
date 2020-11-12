<?php
session_start();
if(isset($_SESSION['nombreUsuario']))
{
	$usuarioSesion=$_SESSION['nombreUsuario'];
    $tipoSesion=$_SESSION['tipoUsuario'];
    $id=$_GET['id'];
    include_once 'conexion.php';
    $mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
    $consulta="SELECT P.Id,P.Nombre,TP.Descripcion,P.Precio,P.Existencia FROM productos as P JOIN tipoproductos as TP on P.IdTipoProducto=TP.Id WHERE P.Id='".$id."'";
    $resultado=$mysqlConexion->query($consulta);
    if($registro=$resultado->fetch_array(MYSQLI_ASSOC))
    {
        $nombre=$registro['Nombre'];
        $descripcion=$registro['Descripcion'];
        $precio=$registro['Precio'];
        $existencia=$registro['Existencia'];
    }
}
else
{
	$usuarioSesion='';
	$tipoSesion='';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <title>zapaterias.com</title>
</head>

    <body >
	<!-- Header -->
	<header id="header" >
	<h1><strong><a href="../index.php">Zapaterias.com</a></strong></h1>
	<nav id="nav">
	<ul>
			<li><a href="../index.php">Inicio</a></li>
			<li><a href="../Nosotros/nosotros.php">Nosotros</a></li>			
			<?php
				if($usuarioSesion<>'' && $tipoSesion==2)
					{
			?>
				<li><a href="../Catalogo/catalogo.php">Catálogo</a></li>
				<li><a href="../Compras/compras.php">Mis Compras</a></li>
			<?php
				}
			?>
			<?php
				if($usuarioSesion<>'' && $tipoSesion==1)
					{
			?>
				<li><a href="../Administracion/administrar.php">Administración</a></li>
			<?php
				}
			?>
			<li><a href="../contactanos.php">Contáctanos</a></li>
			<li>
				<a href="../logout.php" class="button special big">
					<?php 
					if($usuarioSesion<>'')
					{
						echo $usuarioSesion;
					}
					else{
						echo "iniciar sesión";
					}
						
					?>
				</a>
			</li>			
		</ul>	
	</nav>
	</header>
	<!-- Main -->
    <section id="main" class="wrapper">
		<div class="container">

			<header class="major special">
				<h2>Detalles del producto</h2>
			</header>
            <form action="guardarCompra.php" method="post">
                            <label>Id</label>
                            <input type="text" name="id" readonly value="<?php echo $id ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" readonly value="<?php echo $nombre ?>">
                            <label>Descripción</label>
                            <input type="text" name="descripcion" readonly value="<?php echo $descripcion ?>">
                            <label>Precio</label>
                            <input type="text" name="precio" readonly value="<?php echo $precio ?>">
                            <label>Existencia</label>
                            <input type="text" name="existencia" readonly value="<?php echo $existencia?>">
                            <label>Cantidad</label>
                            <input type="text" name="cantidad" required>
                            <label>Domicilio de entrega</label>
                            <input type="text" name="domicilio" required>
                            <input type="submit" value="Comprar">
                        </form>
		</div>
		</section>
	<!-- Footer -->
	<footer id="footer">
		<div class="container">
			<ul class="icons">
				<li><a href="#" class="icon fa-facebook"></a></li>
				<li><a href="#" class="icon fa-twitter"></a></li>
				<li><a href="#" class="icon fa-instagram"></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; UNACH</li>
				<li>Design: <a href="#">LSC</a></li>
						
			</ul>
		</div>
	</footer>


	</body>
</body>
</html>