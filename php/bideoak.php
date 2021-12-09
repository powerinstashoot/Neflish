
<?php
$BL_FILE='../data/neflish_bideoak.xml';		// Bideoak gordeko diren fitxategia.

/**
 * *Funtzio honek bideoaren ezaugarriak balidatzen ditu.
 * Mezu bat itzuliko du, non erroreak baleude, hauek adieraziko diren, zerrendatuta.
 * @param titulua Bideoaren titulua.
 * @param linka Bideoaren YouTubeko URLa.
 * @param azalpena Bideoari buruzko azalpen labur bat, ikusleak jakiteko zertaz doan.
 * @param kategoria Bideoaren kategoria.
 
 */
function balidatu_bideoa($titulua, $linka, $azalpena, $kategoria, $irudia){
	$errorea = '';
	if ($titulua=='') {
		$errorea = $errorea.'Titulua adieraztea beharrezkoa da.\n';
	} 
	if ($linka=='') {
		$errorea = $errorea.'Linka adieraztea beharrezkoa da.\n';
		//Ziurtatu linkak formatu egokia duela.
		//$errorea = balidatu_linka($linka);
	}
	if ($kategoria=='') {
		$errorea = $errorea.'Kategoria adieraztea beharrezkoa da.\n';
	}
	if(!empty($irudia) && $irudia!=null){
		// Argazkiaren luzapena lortu
		$fileType = pathinfo($irudia, PATHINFO_EXTENSION);
		// Allow certain file formats
		$allowTypes = array('png','jpg','jpeg','gif');
		if(!in_array($fileType, $allowTypes)){
			$errorea = $errorea.'Irudiaren formatua ez da egokia.\n';
		}
	}else{
		$errorea = $errorea.'Irudia adieraztea beharrezkoa da.\n';
	}
	return $errorea;
}

/**
 * * Funtzio honek bideo bat datu basean gordeko du.
 * ! Errorerik badago, false itzuli, bestela true.
 * @param titulua Bideoaren titulua.
 * @param linka Bideoaren YouTubeko URLa.
 * @param azalpena Bideoari buruzko azalpen labur bat, ikusleak jakiteko zertaz doan.
 * @param kategoria Bideoaren kategoria.
 */
function gorde_bideoa($titulua, $linka, $azalpena, $kategoria, $tempimage, $irudia){
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	if(!file_exists($BL_FILE))	// Bideoak gordetzeko XML fitxategia ez bada existitzen, sortu bideorik gabeko XML fitxategia.
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE bideoak SYSTEM "../dtd/bideoak.dtd"><bideoak azkenid="b0"></bideoak>');
	else	// Bestela, kargatu XML fitxategia.
		$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = "b" . ((int) substr($bl['azkenid'],1)+1); // Kalkulatu bideo berriaren identifikadorea.

	//irudia gorde
	$fileType = pathinfo($irudia, PATHINFO_EXTENSION);
	$target_file = "../irudiak/" . $id . "." . $fileType;
	move_uploaded_file($tempimage, $target_file);
	
	$berria=$bl->addChild('bideoa');	// Sortu 'bideoa' etiketa.
	$berria['id']=$id;
	$berria->addChild('titulua',$titulua);	// Sortu 'bideoa' etiketaren barruko etiketak.
	$berria->addChild('linka', htmlspecialchars($linka));
	if ($azalpena!='') {
		$berria->addChild('azalpena',$azalpena);
	}else{
		$berria->addChild('azalpena');
	}
	$berria->addChild('kategoria',$kategoria);
	$berria->addChild('likes');
	$berria->addChild('irudia', $target_file);
	$bl['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	$result = $bl->asXML($BL_FILE);
	return $result;	// Gorde aldaketak fitxategian.
}
?>

