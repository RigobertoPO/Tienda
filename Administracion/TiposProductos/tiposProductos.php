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
header('Content-Type: text/html; charset=UTF-8');
include_once '../../conexion.php';
if(isset($_GET['idEliminar']))
{
	$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
	$sqlConsulta="DELETE FROM Productos WHERE Id=".$_GET['idEliminar'];
	$resultado=$mysqlConexion->query($sqlConsulta);
	header("Location: $_SERVER[PHP_SELF]");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <title>zapaterias.com</title>
    <script type="text/javascript">
			function editar_id(id){
				if(confirm('¿Desea modificar?'))
				{
					window.location.href='editarProducto.php?idEditar='+id;
				}
			}
			function eliminar_id(id){
				if(confirm('¿Desea eliminar?'))
				{
					window.location.href='productos.php?idEliminar='+id;
				}
			}

		</script>
</head>

    <body >
	<!-- Header -->
	<header id="header" >
	<h1><strong><a href="../../index.php">Zapaterias.com</a></strong></h1>
	<nav id="nav">
		<ul>
			<li><a href="../../index.php">Inicio</a></li>
			<li><a href="../../Nosotros/nosotros.php">Nosotros</a></li>			
			
			<?php
				if($usuarioSesion<>'' && $tipoSesion==1)
					{
			?>
				<li><a href="../../Administracion/administrar.php">Administración</a></li>
			<?php
				}
			?>
			<li><a href="../../contactanos.php">Contáctanos</a></li>
			<li>
				<a href="../../logout.php" class="button special big">
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
				<h2>Catálogo de tipo de productos</h2>
				<p>...</p>
            </header>
            <a href="nuevoProducto.php">Nuevo</a>
            <a href="../administrar.php">Regresar</a>
            <div>
					<table>
						<tr>
							<th>ID</th>
							<th>DESCRIPCION</th>
							<th></th>
						</tr>
							<?PHP
								include_once '../../conexion.php';
								$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
								$consulta="SELECT * FROM tipoproductos";
								$resultado=$mysqlConexion->query($consulta);
								while($registro=$resultado->fetch_assoc())
								{									
									?>
									<tr>
										<td><?PHP echo $registro["Id"];?></td>
										<td><?PHP echo $registro["Descripcion"];?></td>
										<td>
										 <a href="javascript:editar_id('<?php echo $registro["Id"];?>')"><img src="../../img/Editar.png" alt=""> </a>
										 <a href="javascript:eliminar_id('<?php echo $registro["Id"];?>')"><img src="../../img/Cancelar.png" alt=""> </a>
										 </td>
									</tr>
									<?PHP
								}
								
							?>
					</table>
				</div>
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