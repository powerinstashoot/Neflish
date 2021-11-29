<?php
	require_once('neflish_bideoak.php');
	
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
	$titulua=trim($_POST['titulua']);
	$azalpena=trim($_POST['azalpena']);
	$linka=trim($_POST['linka']);

	//Ziurtatu linkak formatu egokia duela.
	$errorea = balidatu_linka($linka);
	if($errorea == ''){
		if(!gorde_bideoa($titulua, $azalpena, $linka)){	// Gorde bideoa datu basean (XML fitxategia).
			$errorea = '<li>Ezin izan da bideoa datu basean gorde.</li>';
        }
    }
?>