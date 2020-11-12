<?php
session_start();
if(isset($_SESSION['nombreUsuario']))
{
	$usuarioSesion=$_SESSION['nombreUsuario'];
	$tipoSesion=$_SESSION['tipoUsuario'];
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
				<h2>Catálogo</h2>
				<div>
					<table>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>DESCRIPCION</th>
							<th>PRECIO</th>
							<th>EXISTENCIA</th>
							<th></th>
						</tr>
							<?PHP
								include_once '../conexion.php';
								$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
								$consulta="SELECT P.Id,P.Nombre,TP.Descripcion,P.Precio,P.Existencia FROM productos as P JOIN tipoproductos as TP on P.IdTipoProducto=TP.Id";
								$resultado=$mysqlConexion->query($consulta);
								while($registro=$resultado->fetch_assoc())
								{									
									?>
									<tr>
										<td><?PHP echo $registro["Id"];?></td>
										<td><?PHP echo $registro["Nombre"];?></td>
										<td><?PHP echo $registro["Descripcion"];?></td>
										<td><?PHP echo $registro["Precio"];?></td>
										<td><?PHP echo $registro["Existencia"];?></td>
										<td><a href="detalle.php?id=<?PHP echo $registro["Id"];?>"><img src="../img/Comprar.png" alt=""> </a></td>
									</tr>
									<?PHP
								}
								
							?>
					</table>
				</div>
			</header>

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