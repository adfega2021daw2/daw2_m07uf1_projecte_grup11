<?php
	//CLASSE PER LA CREACIO DE PRODUCTES
	//ES CREA UN FITXER AMB EL ID COM A NOM I ES GUARDA A dircomandes, TAMBÉ S'AFAFEGEIX AL ARXIU comandes, ON HI HA EL REGISTRE DE TOTES LES COMANDES (ACTIVES, MODIFICADES O ELIMINADES)
class producte{
	
	private $id;
	private $seccio;
	private $marca;
	private $model;
	private $preu;
	
	public function __construct($id,$seccio,$marca,$model,$preu){			//constructor
			$this->id = $id;
			$this->seccio = $seccio;
			$this->marca = $marca;
			$this->model = $model;
			$this->preu = $preu;
		}
		
	public function __get($prop){											//getter
			if(property_exists($this,$prop)){
				return $this->$prop;
			}
			else{
				return -1;
			}		
		}
		
	public function __set($prop,$valor){									//setter
			if(property_exists($this,$prop)){
				$this->$prop=$valor;
			}
		}
	
	public function escriu($arxiu,$text){									//funcio pública per escriure a fitxers un text
		fwrite($arxiu,$text);
		fwrite($arxiu,"\n");
		fclose($arxiu);
	}
}	

$identificador=$_POST['id'];
$seccio=$_POST['seccio'];
$marca=$_POST['marca'];
$model=$_POST['model'];
$preu=$_POST['preu'];

$cotxe=new producte($identificador, $seccio, $marca, $model, $preu);		//Creacio del producte a partir del constructor

$general="/var/www/html/projecte1/productes";								//afegir al registre de productes el producte no									
$fp=fopen($general,"a") or die ("No s'ha pogut afegir al fitxer");
$text=$cotxe->id."-".$cotxe->seccio."-".$cotxe->marca."-".$cotxe->model."-".$cotxe->preu."€";															
$cotxe->escriu($fp,$text);
fclose($fp);


$filename="/var/www/html/projecte1/dirproductes/".$identificador;			//afegir al directori dirproductes un arxiu amb aquest producte i id com a nom
$fitxer=fopen($filename,"w") or die ("No s'ha pogut crear");
$texte=$cotxe->id."-".$cotxe->seccio."-".$cotxe->marca."-".$cotxe->model."-".$cotxe->preu."€";		//text generat a partir dels getters de les propietats
$cotxe->escriu($fitxer,$texte);
fclose($filename);


header('Location: http://localhost/projecte1/manteniment_cataleg.php');

	
?>
