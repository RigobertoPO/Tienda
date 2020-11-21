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
if(isset($_GET['idConfirmar']))
{
	$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
	$sqlConsulta="UPDATE  Ventas set ConfirmarVenta=true WHERE Id=".$_GET['idConfirmar'];
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
			function Confirmar_id(id){
				if(confirm('¿Desea confirmar la venta?'))
				{
					window.location.href='ventas.php?idConfirmar='+id;
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
				<h2>VENTAS</h2>			
            </header>
            <a href="../administrar.php">Regresar</a>
            <div>
					<table>
						<tr>
							<th>ID</th>
							<th>CLIENTE</th>
                            <th>PRODUCTO</th>
                            <th>FECHA</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            <th>IMPORTE</th>
                            <th>ENTREGA</th>
							<th></th>
						</tr>
							<?PHP
								include_once '../../conexion.php';
								$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
								$consulta="SELECT V.Id,U.NombreCompleto,P.Nombre,V.Fecha,V.Cantidad,V.Precio,V.Importe,DomicilioEntrega FROM ventas as V INNER JOIN usuarios as U on V.IdUsuario=U.Id JOIN productos as P on v.IdProducto=P.Id";
								$resultado=$mysqlConexion->query($consulta);
								while($registro=$resultado->fetch_assoc())
								{									
									?>
									<tr>
										<td><?PHP echo $registro["Id"];?></td>
                                        <td><?PHP echo $registro["NombreCompleto"];?></td>
                                        <td><?PHP echo $registro["Nombre"];?></td>
                                        <td><?PHP echo $registro["Fecha"];?></td>
                                        <td><?PHP echo $registro["Cantidad"];?></td>
                                        <td><?PHP echo $registro["Precio"];?></td>
                                        <td><?PHP echo $registro["Importe"];?></td>
                                        <td><?PHP echo $registro["DomicilioEntrega"];?></td>
										<td>
										 <a href="javascript:Confirmar_id('<?php echo $registro["Id"];?>')"><img src="../../img/Editar.png" alt=""> </a>
										
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