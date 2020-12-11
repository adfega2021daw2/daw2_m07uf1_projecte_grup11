<?php
	//ES POT VEURE ELS USUARIS ACTIUS, AMB UN BUCLE DINS EL DIRECTORI dirusuaris, ON HI HAN ELS ARXIUS ACTIUS
	//TAMBÉ HI HA UNA LLISTA DE TOTS ELS USUARIS CREATS, I TAMBÉ ELS CANVIS I ELS USUARIS ELIMINATS
	//PER ULTIM HI HA UN FORMULARI PER ELIMINAR UN USUARI. SELECCIONES UN DELS USUARIS QUE HAN SOLICITAT SER ELIMINATS, CRIDANT L'ARXIU eliminar_usuari.

	session_start();
	
?>
<html>
	<head>
		<title>
			GESTIO USUARIS
		</title>
		<link rel="stylesheet" type="text/css" href="estils.css"/>
		<script language="javascript" src="EsbUsr.js"></script>
	</head>
		<body>
			<div class="inicis">
			<a class="inici" href="manteniment_cataleg.php">Manteniment del catàleg</a> 
			<a class="inici" href="gestio_comandes.php">Gestionar comandes</a> 
			<a class="inici" href="gestio_usuari.php">Gestionar usuaris</a>
			<a class="inici" href="logout.php">Tancar la sessio</a>
			</div>
			
			<h2 class="titol">GESTIONAR USUARIS</h2>
			
			<div class="llista">
			<h3>TOTS ELS USUARIS CREATS I MODIFICACIONS</h3>
			<table>
				<tr id="cap">
					<td>ID</td>
					<td>NOM</td>
					<td>CARRER</td>
					<td>CORREU</td>
					<td>TELEFON</td>
					<td>VISA</td>
					<td>USUARI</td>

				</tr>
			<?php
				$fitxer_usuaris="/var/www/html/projecte1/usuaris";
				$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
				if ($fp) {
					$mida_fitxer=filesize($fitxer_usuaris);	
					$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
				}
				foreach ($usuaris as $usuari) {
					$logpwd = explode(":",$usuari);
					$id = $logpwd[7];
					$nom = $logpwd[2];
					$carrer = $logpwd[3];
					$correu = $logpwd[4];
					$tel = $logpwd[5];
					$visa = $logpwd[6];
					$usuari = $logpwd[0];

			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $nom; ?></td>
					<td><?php echo $carrer; ?></td>
					<td><?php echo $correu; ?></td>
					<td><?php echo $tel; ?></td>
					<td><?php echo $visa; ?></td>
					<td><?php echo $usuari; ?></td>

				</tr>
					
			<?php
				}
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>USUARIS ACTUALS</h3>
			<table>
				<tr id="cap">
					<td>USUARI</td>

				</tr>
			<?php
				$usuaris="/var/www/html/projecte1/dirusuaris";
				$llista = scandir($usuaris);
				foreach($llista as $usuari){
	

			?>
				<tr>
					<td><?php echo $usuari; ?></td>


				</tr>
					
			<?php
				}
			?>
			</table>
			</div>
			
			<br><br>
			
			<div class="llista">
			<h3>SOLICITUTS ELIMINAR USUARI</h3>
			<fieldset>
				<legend>
					<h3>Petició d'anul·lació de usuari</h3>
				</legend>		
				<form id="frmEsbUsr">
					<table>
						<tr>
							<td>Usuari</td>
							<td><select name="nomUsr" id="nomUsr">
								<?php
									$fitxer_usuaris="/var/www/html/projecte1/eliminar_usuari";
									$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
									if ($fp) {
										$mida_fitxer=filesize($fitxer_usuaris);	
										$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
									}
									foreach ($usuaris as $usuari) {
								?>
									<option><?php echo $usuari; ?></option>
										
								<?php
									}
								?>
							</select></td>
						</tr>
					</table>
					<input type="button" name="bEsbUsr" id="bEsbUsr" value="Esborra usuari" onclick="esbUsuari();">
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
