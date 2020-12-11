<?php
	//PERMET CREAR PRODUCTES CRIDANT LA classeproducte, I AMB EL FORMULARI AFEGEIX ELS VALORS DE LES PROPIETATS
	//TAMBÉ POTS VERUE EL CATALEG HISTORIC, CRIDANT L'ARXIU productes, ON HI HAN TOTS ELS PRODUCTES CREATS, MODIFICATS I ELIMINATS
	//TAMBE ES PODEN VEURE ELS PRODUCTES DISPONIBLES, AMB UN BUCLE AL dirproductes, ON HI HAN ELS PRODUCTES ACTIUS
	//PER ULTIM TAMBE ES PERMET ESBORRAR UN PRODUCTE, SELECCIONANT UN DELS PRODUCTES ACTIUS I ESBORRANT-LO DEL DIRECTORI ON HI HAN ELS PRODUCTES DISPONIBLES
	session_start();
	
?>
<html>
	<head>
		<title>
			MANTENIMENT CATALEG
		</title>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
		<script language="javascript" src="EsbPro.js"></script>
	</head>
		<body>
			<div class="inicis">
			<a class="inici" href="manteniment_cataleg.php">Manteniment del catàleg</a> 
			<a class="inici" href="gestio_comandes.php">Gestionar comandes</a> 
			<a class="inici" href="gestio_usuari.php">Gestionar usuaris</a>
			<a class="inici" href="logout.php">Tancar la sessio</a>
			</div>
			
			<h2 class="titol">MANTENIMENT DEL CATALEG</h2>
			
			<div class="llista">
			<h3>AFEGIR PRODUCTE</h3>
				<form action="http://localhost/projecte1/classeproducte.php" method="POST">
					Seccio: <select name="seccio">
								<option value="electric">Electric</option>
								<option value="diesel">Diesel</option>
								<option value="gasolina">Gasolina</option>
							</select>
					Marca <input type="text" name="marca"><br>
					Model <input type="text" name="model"><br>
					Preu <input type="text" name="preu"><br>
					Identificador <input type="text" name="id"><br>
					<input type="submit" value="Envia"/>
				</form>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>EL CATALEG HISTORIC</h3>
			<p><u><b>Cotxes electrics</b></u></p>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>MARCA</td>
					<td>MODEL</td>
					<td>PREU</td>

				</tr>
			<?php
				$fitxer_productes="/var/www/html/projecte1/productes";
				$fp=fopen($fitxer_productes,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_productes);	
					$productes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($productes as $producte) {
				$separar = explode("-",$producte);
					if ($separar[1] == "electric"){
						$id = $separar[0];
						$marca = $separar[2];
						$model = $separar[3];
						$preu = $separar[4];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $marca; ?></td>
					<td><?php echo $model; ?></td>
					<td><?php echo $preu; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			
			<p><u><b>Cotxes de gasolina</b></u></p>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>MARCA</td>
					<td>MODEL</td>
					<td>PREU</td>

				</tr>
			<?php
				$fitxer_productes="/var/www/html/projecte1/productes";
				$fp=fopen($fitxer_productes,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_productes);	
					$productes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($productes as $producte) {
				$separar = explode("-",$producte);
					if ($separar[1] == "gasolina"){
						$id = $separar[0];
						$marca = $separar[2];
						$model = $separar[3];
						$preu = $separar[4];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $marca; ?></td>
					<td><?php echo $model; ?></td>
					<td><?php echo $preu; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			<p><u><b>Cotxes diesel</b></u></p>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>
					<td>MARCA</td>
					<td>MODEL</td>
					<td>PREU</td>

				</tr>
			<?php
				$fitxer_productes="/var/www/html/projecte1/productes";
				$fp=fopen($fitxer_productes,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_productes);	
					$productes = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($productes as $producte) {
				$separar = explode("-",$producte);
					if ($separar[1] == "diesel"){
						$id = $separar[0];
						$marca = $separar[2];
						$model = $separar[3];
						$preu = $separar[4];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $marca; ?></td>
					<td><?php echo $model; ?></td>
					<td><?php echo $preu; ?></td>

				</tr>
					
			<?php
					}
				}
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">			
			<h3>ELS MODELS QUE ACTUALMENT DISPONEM</h3>
			<table>
				<tr id="cap">
					<td>IDENTIFICADOR</td>

				</tr>
			<?php
				$productes="/var/www/html/projecte1/dirproductes";
				$llista = scandir($productes);
				foreach($llista as $producte){
	

			?>
				<tr>
					<td><?php echo $producte; ?></td>
				</tr>
					
			<?php
				}
			?>
			</table>
			</div>
			<br><br>
			
			<div class="llista">			
			<h3>MODIFICAR PRODUCTE DISPONIBLE</h3>
			<form action="http://localhost/projecte1/modificarproducte.php" method="POST">
				Producte a modificar <select name="producte">
				<?php
				$productes="/var/www/html/projecte1/dirproductes";
				$llista = scandir($productes);
				foreach($llista as $producte){
	

				?>
					<option><?php echo $producte; ?></option>					
				<?php
					}
				?>
				</select>
				Seccio: <select name="seccio">
							<option value="electric">Electric</option>
							<option value="diesel">Diesel</option>
							<option value="gasolina">Gasolina</option>
						</select>
				Marca <input type="text" name="marca"><br>
				Model <input type="text" name="model"><br>
				Preu <input type="text" name="preu"><br>
				<input type="submit" value="Envia"/>
			</form>
			</div>
			<br><br>	
			
			<div class="llista">			
			<h3>ELIMINAR PRODUCTE</h3>
			<fieldset>
				<legend>
					<h3>Anul·lació de producte</h3>
				</legend>		
				<form id="frmEsbPro">
					<table>
						<tr>
							<td>Identificador de producte:</td>
							<td><select name="nomPro" id="nomPro">
							<?php
							$productes="/var/www/html/projecte1/dirproductes";
							$llista = scandir($productes);
							foreach($llista as $producte){
				

							?>
								<option><?php echo $producte; ?></option>					
							<?php
								}
							?>
							</select></td>
						</tr>
					</table>
					<input type="button" name="bEsbPro" id="bEsbPro" value="Esborra producte" onclick="esbProducte();">
					<input type="button" name="bNet" id="bNet" value="Neteja formulari" onclick="netForm();">
				</form>
			</fieldset>
			<fieldset>
				<legend>
					<h3>Resposta a la petició</h3>
				</legend>
				<p id="resp"></p>
			</fieldset>	
			</div>
		</body>
</html>
