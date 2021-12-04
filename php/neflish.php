<!DOCTYPE html>
<?php session_start();
$BL_FILE='../data/neflish_bideoak.xml';
?>

<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<script type="text/javascript" src="../js/dynamicClient.js"></script>
		<script src="../js/kategoriakIkusi.js" type="text/javascript" charset="utf-8"></script>
		<link rel="icon" href="../img/NeflishLogo3.png">
		<title>Neflish</title>
	</head>
	<body>
		<h2>Orri nagusia</h2>
		<nav id="navbar">
			<ul>
				<!--<li>
					<button onclick="onClickMenu()" class="dropbtn"><i class="fa fa-bars"></i></button>
						<div id="myDropdown" class="dropdown-content">
							<a href="#home">Pelikulak</a>
							<a href="#about">Serieak</a>
							<a href="#contact">Kritikak</a>
					</div>
				</li>-->
				<li><a href="#">Hasiera</a></li>
				<li><a href="#">Zure gustoko pelikulak</a></li>
				<li onclick="onClickMenu()" class="dropbtn">Kategoriak <i class="fa fa-arrow-down"></i></li>
				<div id="myDropdown" class="dropdown-content">
					<a href="#home" onclick="kategoria('teknologia')">Teknologia</a>
					<a href="#about" onclick="kategoria('bidaia')">Bidaiak</a>
					<a href="#contact" onclick="kategoria('janaria')">Janaria</a>
					<a href="#contact" onclick="kategoria('futbola')">Futbola</a>
				</div>
				<li>Bideo hoberenak</li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>

		<div class="content" id="bideoak">
				<?php

					if(!file_exists($BL_FILE)) {
						echo('<p>Ez dago bideorik eskuragarri</p>');
					} elseif(!($bl=simplexml_load_file($BL_FILE))) {
						echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
					} else {
		                foreach($bl->bideoa as $bideoa) {
		                    ?>
		                    <div class="divBideoa">
		                        <h2><?php echo $bideoa->titulua;?></h2>
		                        <h3><?php echo $bideoa->kategoria;?></h3>
		                        <?php
		                        if($bideoa->azalpena) {
		                            echo '<p>'.$bideoa->azalpena.'</p>';
		                        }
		                        ?>
		                        <iframe width="430" height="315" src="<?php echo $bideoa->linka; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		                        <span id="like1">
		                            <i class="fa fa-heart-o" aria-hidden="true"></i>
		                        </span>
		                    </div>
		            <?php
		                }
		            }
		            ?>
		</div>

	</body>
</html>
