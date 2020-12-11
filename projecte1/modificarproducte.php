<?php
	//PAGINA PER MODIFCAR EL PRODUCTE INDICAT PER FORMULARI
	$fitxer_producte="/var/www/html/projecte1/dirproductes/".$_POST['producte'];
	$id=$_POST["producte"];
	$seccio=$_POST["seccio"];
	$marca=$_POST["marca"];
	$model=$_POST["model"];
	$preu=$_POST["preu"];

	//OBRE EL FITXER DEL PRODUCTE I REESCRIU LA INFORMACIO
	$fp=fopen($fitxer_producte,"w") or die ("No s'ha pogut validar el producte");
	fwrite($fp,$id);
	fwrite($fp,"-");
	fwrite($fp,$seccio);
	fwrite($fp,"-");
	fwrite($fp,$marca);
	fwrite($fp,"-");
	fwrite($fp,$model);
	fwrite($fp,"-");
	fwrite($fp,$preu);
	fwrite($fp,"€\n");
	fclose($fitxer);
	
	//AFEGEIX AL ARXIU productes LA NOVA INFORMACIO DEL PRODUCTE
	$general="/var/www/html/projecte1/productes";
	$fo=fopen($general,"a") or die ("No s'ha pogut validar el producte");
	fwrite($fo,$id);
	fwrite($fo,"-");
	fwrite($fo,$seccio);
	fwrite($fo,"-");
	fwrite($fo,$marca);
	fwrite($fo,"-");
	fwrite($fo,$model);
	fwrite($fo,"-");
	fwrite($fo,$preu);
	fwrite($fo,"€\n");
	fclose($fo);
	
	header('Location: http://localhost/projecte1/manteniment_cataleg.php');
?>
