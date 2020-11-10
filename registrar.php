<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>zapaterias.com</title>
</head>

    <body >
	<!-- Header -->
	<header id="header" >
	<h1><strong><a href="index.php">Zapaterias.com</a></strong></h1>

	</header>
	<!-- Main -->
    <section id="main" class="wrapper">
		<div class="container">
            <form action="guardarUsuario.php" method="post">
                        <label>Nombre Completo</label>
                        <input type="text" name="nombre" placeholder="Captura tu nombre" required>
                        <label>Direccion</label>
                        <input type="text" name="direccion" placeholder="Captura tu direccion" required>
                        <label>Correo</label>
                        <input type="text" name="correo" placeholder="Captura tu correo" required>
                        <label >Contraseña</label>
                        <input type="password" name="password" placeholder="captura tu contraseña" required>
                <input type="submit" value="Enviar">
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