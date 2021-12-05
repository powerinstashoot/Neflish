<?php
	//sesio hasiera
	session_start();
	// IKASLEA KAUTOTURIK DAGOELA EGIAZTATU
	if (!isset($_SESSION['email']) || $_SESSION['email']!="admin@gmail.com") {
		// existitzen ez bada, berriro kautotzera bidaltzen dut
		header("Location: loginSignup.php");
		//gainera, script-atik irtetzen gara
		exit();
	}
?>
