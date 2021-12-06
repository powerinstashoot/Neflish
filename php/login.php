<?php
		if(isset($_POST['login-email'])){
			$konexioa = new mysqli ("localhost", "root", "", "sza") or die ("Ezin izan da DB-ra konektatu");
			$erabemail = $_POST['login-email'];
			$pasahitza = $_POST['login-password'];
			$eskaera = "SELECT * FROM erabiltzailea WHERE email = '$erabemail'";
			$emaitza = $konexioa->query($eskaera);
			if(!$emaitza){
				die("Errorea querya gauzatzerakoan. ").$emaitza->error;
			}else{
				$errenkadak = $emaitza->num_rows;
				$konexioa->close();
				if($errenkadak==1){
					$row=$emaitza->fetch_object();
					if(hash_equals($row->pasahitza, crypt($pasahitza, $row->pasahitza))){
						session_start();
						$_SESSION['email'] = $erabemail;
						echo ("<script> alert('Saioa hasi duzu! Ongi etorri'); window.location='neflish.php'</script>");
					}else{
						echo("<script> document.getElementById('ErabErr').style.display='block';
							document.getElementById('ErabErr').innerHTML='Pasahitza ez da zuzena'; </script>");
					}
				}else{
					echo("<script> document.getElementById('ErabErr').style.display='block';
							document.getElementById('ErabErr').innerHTML='Erabiltzailea ez da existitzen'; </script>");
				}
			}
		}
	?>
