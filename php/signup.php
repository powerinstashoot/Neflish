<?php
    $hutsa = '/^\s*$/';
    if (isset($_POST['izen-abizenak'])) {
      if(!preg_match($hutsa, $_POST['izen-abizenak']) && !preg_match($hutsa, $_POST['signup-email']) && !preg_match($hutsa, $_POST['signup-password']) && !preg_match($hutsa, $_POST['signup-password-confirm'])){

        $emaila = $_POST['signup-email'];
        $pas1=$_POST['signup-password'];
        $pas2=$_POST['signup-password-confirm'];
        $izena=$_POST['izen-abizenak'];
        $izenPattern= '/^[A-Z]([a-z]+){2,}(\ ([A-Z][a-z]+){1,})+$/';
        $emailPattern='/^[a-zA-Z0-9]{1,}\@[a-z]{2,}\.[a-z]{2,}$/';

        if(preg_match($izenPattern, $_POST['izen-abizenak']) && preg_match($emailPattern, $emaila) && $pas1==$pas2) {
            	$esteka = mysqli_connect ("localhost", "root", "", "sza") or die ("Errorea Dbra konektatzerakoan");
              @$pasahitza= crypt($_POST['signup-password']);
            		$sql="INSERT INTO erabiltzailea(izena,email,pasahitza) VALUES('$izena', '$emaila', '$pasahitza')";
          			$ema = mysqli_query($esteka, $sql);  
          			if (!$ema) {
          				echo "<script> alert('Erabiltzailea jada existitzen da');</script>";
                  exit();
          			}
          			mysqli_close($esteka);
                echo "<script> alert('Ondo erregistratu zara');</script>";
        }else{
          echo "<script> alert('Errorea erregistratzerakoan');</script>";
        }
      }else{
        echo "<script> alert('Errorea erregistratzerakoan');</script>";
      }
    }
?>