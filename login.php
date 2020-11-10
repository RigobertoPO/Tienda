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
            <form action="validarUsuario.php" method="post">
				<div>
					<img src="img/avatar.png" alt="avatar">
					</div>
					<label>Usuario</label>
					<input type="text" name="usuario" placeholder="Captura tu usuario" required>
					<label >Contraseña</label>
					<input type="password" name="password" placeholder="captura tu contraseña" required>
					<input type="submit" value="Enviar">
		    </form>					
		</div>
		<div class="container">
				<a href="registrar.php">Obtener cuenta</a><br>
				<span>Olvido su <A href="recuperar.php">Contraseña</A></span>
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