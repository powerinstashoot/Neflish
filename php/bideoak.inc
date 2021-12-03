
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
function balidatu_bideoa($titulua, $linka, $azalpena, $kategoria){
	$errorea = '';
	if ($titulua=='') {
		$errorea = $mezua.'<li>Titulua adieraztea beharrezkoa da.</li>';
	} 
	if ($linka=='') {
		$errorea = $mezua.'<li>Linka adieraztea beharrezkoa da.</li>';
		//Ziurtatu linkak formatu egokia duela.
		//$errorea = balidatu_linka($linka);
	}
	if ($kategoria=='') {
		$errorea = $mezua.'<li>Kategoria adieraztea beharrezkoa da.</li>';
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
function gorde_bideoa($titulua, $linka, $azalpena, $kategoria){
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	if(!file_exists($BL_FILE))	// Bideoak gordetzeko XML fitxategia ez bada existitzen, sortu bideorik gabeko XML fitxategia.
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE bideoak SYSTEM "../dtd/bideoak.dtd"><bideoak azkenid="b0"></bideoak>');
	else	// Bestela, kargatu XML fitxategia.
		$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = "b" . ((int) substr($bl['azkenid'],1)+1); // Kalkulatu bideo berriaren identifikadorea.
	$berria=$bl->addChild('bideoa');	// Sortu 'bideoa' etiketa.
	$berria['id']=$id;
	$berria->addChild('titulua',$titulua);	// Sortu 'bideoa' etiketaren barruko etiketak.
	$berria->addChild('linka',$linka);
	if ($azalpena!='') {
		$berria->addChild('azalpena',$azalpena);
	}
	$berria->addChild('kategoria',$kategoria);
	$bl['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	$result = $bl->asXML($BL_FILE);
	return $result;	// Gorde aldaketak fitxategian.
}
?>

