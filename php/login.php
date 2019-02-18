<?php

	include("config.php") ;
	$db = configuracion();
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$myusername = trim($_REQUEST['email']);
		$mypassword =trim($_REQUEST['password']);			
		
		$result = mysqli_query($db,"SELECT CustomerId FROM customer WHERE Email = '".$myusername."' and LastName = '".$mypassword."';");			
		echo "este antes rows";
		if(mysqli_num_rows($result) == 1){
		echo "entra?";
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);	
			session_start();
			$_SESSION['login_user'] = $row['CustomerId'];
			
			header("location: ../menu.html");
		}else{			
			trigger_error("No existes");
			die();
		}
	}

 ?> 
 
 <html>
	<head>
		<meta charset="UTF-8">
	<style type="text/css">
	
		body{
			font-size:16pt; 
		}
		
		fieldset{
			display: block;
			margin-left: 2px;
			margin-right: 2px;
			padding-top: 80px;
			padding-bottom: 100px;
			padding-left: 15px;
			padding-right: 15px;
			border: 5px groove blue;
			width: 40%;
		
		}
		
		h1{
			color: blue;
		}
		
		legend{
			font-weight:bold;
			font-size:25pt;
		}
	</style>
	</head>
	<body>
		<h1 align="center">PORTAL DE MUSICA</h1>
	<center>
		<form  action="" method="post" name="formulario">
			<fieldset>
				<legend>Inicio de sesión</legend>
				<label>Email </label><input type="email" name="email" required/></br></br></br>
				<label>Contraseña </label><input type="password" name="password" required/></br></br></br>
				<td><input type="submit" name="enviar" value="Enviar"></td>
				<td><input type="reset" name="borrar" value="Borrar"></td>
			</fieldset>
		</form>
	</center>
	</body>

</html>
 
