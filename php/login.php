<?php
	if(isset($_POST['login-email'])){
		$konexioa = new mysqli ("localhost", "root", "", "sza") or die ("Ezin izan da DB-ra konektatu");
		$erabemail = $_POST['login-email'];
		$pasahitza = $_POST['login-password'];
		$eskaera = "SELECT * FROM Erabiltzailea WHERE email = '$erabemail'";
		$emaitza = $konexioa->query($eskaera);
		if(!$emaitza){
			die("Errorea querya gauzatzerakoan. ").$emaitza->error;
		}else{
			$errenkadak = $emaitza->num_rows;
			$konexioa->close();
			if($errenkadak==1){
				$row=$emaitza->fetch_object();
				if(hash_equals($row->pasahitza, crypt($pasahitza, $row->pasahitza))){
					include 'IncreaseGlobalCounter.php';
					$_SESSION['email'] = $erabemail;
					echo ("<script> alert('Saioa hasi duzu! Ongi etorri'); window.location='neflish.html'</script>");
				}else{
					echo("<script> alert('Errorea kautotzerakoan')</script>");
				}
			}else{
				echo("<script> alert('Errorea kautotzerakoan')</script>");
			}
		}
	}
	?>