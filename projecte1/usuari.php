<?php
	//PAGINA PER GESTIONAR-SE EL USUARI
	//MOSTRA LA INFORMACIO DEL USUARI OBRINT L'ARXIU DEL USUARI AL dirusuaris
	//PERMET MODIFICAR EL USUARI MITJANÇANT UN FORMULARI QUE ENVIA LES NOVES DADES A modificarusuari.php
	//PERMET ENVIAR UNA SOLICITUD PER ELIMINAR EL USUARI, PERO TENS QUE AFEGIR EL USUARI I CONTRASSENYA PREVIAMENT
	session_start();
	
	
?>
<html>
	<head>
		<title>
			EL MEU USUARI
		</title>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
	</head>
		<body>
			<div class="inicis">
			<a class="inici" href="usuari.php">El meu usuari</a> 
			<a class="inici" href="cataleg.php">El cataleg</a> 
			<a class="inici" href="comandes.php">Les meves comandes</a>
			<a class="inici" href="logout.php">Tancar la sessio</a>
			</div>
			
			<h2 class="titol">EL MEU USUARI, <?php echo $_SESSION['nom']."-". $_SESSION['id']; ?></h2>
			
			<?php
				$fitxer_usuaris="/var/www/html/projecte1/dirusuaris/".$_SESSION['nom'];
				$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_usuaris);	
					$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($usuaris as $usuari) {
				$logpwd = explode(":",$usuari);
				if ($_SESSION['id'] == $logpwd[7]){
					$id = $logpwd[7];
					$nom = $logpwd[2];
					$carrer = $logpwd[3];
					$correu = $logpwd[4];
					$tel = $logpwd[5];
					$visa = $logpwd[6];
					$usuari = $logpwd[0];

				break;
					}
				}
			?>
			<div class="llista">			
			<h3>DADES DEL USUARI</h3>
			<p>Usuari: <?php echo $usuari; ?></p>
			<p>Nom: <?php echo $nom; ?></p>
			<p>Carrer: <?php echo $carrer; ?></p>
			<p>Correu: <?php echo $correu; ?></p>
			<p>Telefon: <?php echo $tel; ?></p>
			<p>VISA: <?php echo $visa; ?></p>
			<p>ID: <?php echo $id; ?></p>
			</div>
			<br><br>
			
			<div class="llista">			
			<h3>MODIFICAR EL USUARI</h3>
			<form action="http://localhost/projecte1/modificarusuari.php" method="POST">
				Nom <input type="text" name="nom"><br>
				Carrer <input type="text" name="carrer"><br>
				Correu <input type="text" name="correu"><br>
				Telefon <input type="text" name="tel"><br>
				VISA <input type="text" name="visa"><br>
				Constrasenya <input type="password" name="ctsnya"><br>
				<input type="submit" value="Envia"/>
			</form>
			</div>
			
			<br><br>	

			<div class="llista">						
			<h3>ELIMINAR USUARI</h3>
			<form action="http://localhost/projecte1/solicitar_eliminarusr.php" method="POST">			
				<p>Per a verificar que es vosté, indiqui el usuari i contrassenya.</p>
				Nom d'usuari: <input type="text" name="usuari"><br>
				Contrassenya: <input type="password" name="ctsnya"><br>
				<input type="submit" value="Envia"/>
			</form>
			
			
		</body>
	</head>
</html>
