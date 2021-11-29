
<?php
$BL_FILE='data/neflish_bideoak.xml';		// Bideoak gordeko diren fitxategia.

/**
 * *Funtzio honek linkak formatu egokia duela ziurtatuko du, erroreak ekiditzeko.
 * ! Errorerik badago false itzuli, bestela true.
 * @param linka Bideoaren YouTubeko URLa.
 * TODO: regex algoritmoarekin egin daiteke hau.
 */
function balidatu_linka($linka){

}

/**
 * * Funtzio honek bideo bat datu basean gordeko du.
 * ! Errorerik badago, false itzuli, bestela true.
 * @param titulua Bideoaren titulua.
 * @param azalpena Bideoari buruzko azalpen labur bat, ikusleak jakiteko zertaz doan.
 * @param linka Bideoaren YouTubeko URLa.
 */
function gorde_bideoa($titulua, $azalpena, $linka){
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	if(!file_exists($BL_FILE))	// Bideoak gordetzeko XML fitxategia ez bada existitzen, sortu bideorik gabeko XML fitxategia.
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE bideoak SYSTEM "../bideoak.dtd"><bideoak azkenid="0"></bideoak>');
	else	// Bestela, kargatu XML fitxategia.
		$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = $bl['azkenid'] + 1;	// Kalkulatu bideo berriaren identifikadorea. 
	$berria=$bl->addChild('bideo');	// Sortu 'bideo' etiketa.
	$berria['id']=$id;
	$berria->addChild('titulua',$titulua);	// Sortu 'bideo' etiketaren barruko etiketak.
	$berria->addChild('azalpena',$azalpena);
	$berria->addChild('linka',$linka);
	
	$bl['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	return $bl->asXML($BL_FILE);	// Gorde aldaketak fitxategian.
}
?>
