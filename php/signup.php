<?php
    $hutsa = '/^\s*$/';
	//print_r($_POST);
    if($_SERVER['SERVER_METHOD']=="POST" && !preg_match($hutsa, $_POST['izen-abizenak']) && !preg_match($hutsa, $_POST['signup-email']) && !preg_match($hutsa, $_POST['signup-password']) && !preg_match($hutsa, $_POST['signup-password-confirm'])){

      $emaila = $_POST['signup-email'];
      $izenPattern= '/^[A-Z]([a-z]+){2,}(\ ([A-Z][a-z]+){1,})+$/'
      

      if((preg_match($izenPattern, $emaila) && $mota=="ikaslea") || (preg_match($irakaslePattern, $emaila) && $mota=="irakaslea")) {
        if(preg_match($deiturak, $_POST['deitura'])){
          	$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
            $pasahitza= crypt($_POST['pasahitza']);
          		$sql="INSERT INTO User(mota,email,deitura,pasahitza,image,egoera) VALUES('$_POST[mota]', '$_POST[email]', '$_POST[deitura]', '$pasahitza', '$imgContent', 'aktibo')";
        			$ema = mysqli_query($esteka, $sql);  
        			if (!$ema) {
        				echo "<p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
        				die('Errorea query-a gauzatzerakoan: '.mysqli_error($esteka));
        			}
        			echo "Erregisratu zara!<br><br>";
              echo "<p><a href='LogIn.php'>Saioa hasi</a></p><br><br>";
        			mysqli_close($esteka);
            }else{
              echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
              die('Pasahitzak ez dira berdinak');
            }
          }else{
            echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
            die('Pasahitza gutxienez 8ko luzera izan behar du');
          }
        }else{
          echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
          die('Deituraren formatua ez da egokia');
        }
      }else{
        echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
        die('Emailak ez du patroia betetzen');
      }
    }else{
      echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
      die("Derrigorezko eremuak ez dira bete");
    }
		?>
