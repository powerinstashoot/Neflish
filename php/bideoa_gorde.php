<?php
	require_once('bideoak.inc');
	
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
	$titulua=trim($_POST['titulua']);
	$linka=trim($_POST['linka']);
	$azalpena=trim($_POST['azalpena']);
	$kategoria=trim($_POST['kategoria']);

	// Formularioa balidatu
	$errorea = balidatu_bideoa($titulua, $linka, $azalpena, $kategoria);
	
	if($errorea == ''){
		if(!gorde_bideoa($titulua, $linka, $azalpena, $kategoria)){	// Gorde bideoa datu basean (XML fitxategia).
			$errorea = '<li>Ezin izan da bideoa datu basean gorde.</li>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<?php
		if ($errorea=='') {
			echo '<title>Bideoa gorde da</title>';
		} else {
			echo '<title>Errorea bideoa gordetzean</title>';
		}
	?>
		<metacharset=UTF-8>
	</head>
	<body>
	<?php
		if ($errorea!='') {
			echo '<h1>Errore bat gertatu da bideoa gordetzean.</h1>';
			echo "<ul>$errorea</ul>";
		} else {
			echo '<h1>Bideoa gorde da.</h1>';
		}
	?>
	</body>
</html>
