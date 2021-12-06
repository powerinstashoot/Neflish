<!DOCTYPE html>
<?php include 'segurtasunaAdmin.php' ?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<script type="text/javascript" src="../js/dynamicClient.js"></script>
		<link rel="icon" href="../img/NeflishLogo3.png">
		<title>Neflish</title>
	</head>
	<body>
		<?php include 'menu.php' ?>
		<h2>Bideoa gorde</h2>
		<div class="content">

			<form action="../php/bideoa_gorde.php" method="POST">
				<div class="inputgroup">
					<label for="titulua">Titulua:</label>
					<input type="text" id="titulua" name="titulua">
				</div>
				<div class="inputgroup">
					<label for="linka">Linka:</label>
					<input type="url" id="linka" name="linka">
				</div>
				<div class="inputgroup">
					<label for="azalpena">Azalpena:</label>
					<textarea rows="15" cols="70" id="azalpena" name="azalpena"></textarea>
				</div>
				<div class="inputgroup">
					<label for="kategoria">Kategoria:</label>
					<select id="kategoria" name="kategoria">
						<option value="teknologia">Teknologia</option>
						<option value="bidaiak">Bidaiak</option>
						<option value="janaria">Janaria</option>
						<option value="futbola">Futbola</option>
					</select>
				</div>
				<div class="inputgroup">
					<input type="submit" name="igo" onclick="return balidatu(this.form);">
				</div>
			</form>
			<?php
			require_once('bideoak.php');

			// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
			if(isset($_POST['igo'])){
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
			}



		?>
		</div>

	</body>
</html>
