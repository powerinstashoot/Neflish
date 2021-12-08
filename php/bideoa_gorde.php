<!DOCTYPE html>
<?php include 'segurtasunaAdmin.php' ?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" type="text/css" href="../css/bideoGorde.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/dynamicClient.js"></script>
		<script type="text/javascript" src="../js/menu.js"></script>
		<script type="text/javascript" src="../js/showImage.js"></script>
		<link rel="icon" href="../img/NeflishLogo3.png">
		<title>Neflish</title>
	</head>
	<body class="bideoG">
		<?php include 'menu.php' ?>
		<div class="content">
			<div class="container">
				<form class="bideoaForm" action="../php/bideoa_gorde.php" method="POST" enctype="multipart/form-data">
					<h2 class="izenburuaForm">Pelikula gehitu</h2>
					<div class="inputgroup">
						<label for="titulua">Titulua</label>
						<input type="text" id="titulua" name="titulua">
					</div>
					<div class="inputgroup">
						<label for="linka">Linka</label>
						<input type="url" id="linka" name="linka">
					</div>
					<div class="inputgroup">
						<label for="azalpena">Azalpena</label>
						<textarea rows="15" cols="70" id="azalpena" name="azalpena"></textarea>
					</div>
					<div class="inputgroup">
						<label for="kategoria">Kategoria</label>
						<select id="kategoria" name="kategoria">
							<option value="Komedia">Komedia</option>
							<option value="Zientzia-fikzioa">Zientzia-fikzioa</option>
							<option value="Beldurrezkoak">Beldurrezkoak</option>
							<option value="Haurrentzako">Haurrentzako</option>
						</select>
					</div>
					<div class="inputgroup">
						<p class="plabel">Azaleko irudia</p>
						<label for="img" class="custom-file-upload">
    						<i class="fa fa-cloud-upload"></i> Irudia igo
						</label>
						<input type="file" id="img" name="img" accept="image/*" onchange="loadFile(event)">
						<div class="imageContainer">
							<img id="output" height="150" />
						</div>
						
						<input type="button" id="hustu_img" value="Irudia ezabatu" onclick="ezabatuArgazkia()">
					</div>
					<div class="inputgroup mt2">
						<input type="submit" class="btn-nagusia" name="igo" value="BIDALI" onclick="return balidatu(this.form);">
					</div>
				</form>
			</div>
			<?php
			require_once('bideoak.php');

			// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
			if(isset($_POST['igo'])){
				$titulua=trim($_POST['titulua']);
				$linka=trim($_POST['linka']);
				$azalpena=trim($_POST['azalpena']);
				$kategoria=trim($_POST['kategoria']);
				if(isset($_FILES["img"])){
					$irudia = $_FILES["img"]["name"];
				}else{
					$irudia=null;
				}
				
				// Formularioa balidatu
				$errorea = balidatu_bideoa($titulua, $linka, $azalpena, $kategoria, $irudia);
				
				if($errorea == ''){
					$tempimage = $_FILES['img']['tmp_name'];
					if(!gorde_bideoa($titulua, $linka, $azalpena, $kategoria, $tempimage, $irudia)){	// Gorde bideoa datu basean (XML fitxategia).
						$errorea = '<li>Ezin izan da bideoa datu basean gorde.</li>';
					}
				}
				if($errorea != '') {
					echo'<script type="text/javascript">alert(\'<ul>\'.$errorea.\'</ul>\');</script>';
				} else {
					echo'<script type="text/javascript">alert("Bideoa gorde da");</script>';
				}
				 
				
			}
		?>
		</div>
		<?php include 'footer.php' ?>
	</body>
</html>
