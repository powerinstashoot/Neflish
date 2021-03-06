<!DOCTYPE html>
<?php include 'segurtasunaErab.php'?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<script type="text/javascript" src="../js/dynamicClient.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/menu.js"></script>
		<script src="https://www.youtube.com/iframe_api"></script>
		<link rel="icon" href="../img/NeflishLogo3.png">
		<title>Neflish</title>
	</head>
	<body>
		<?php include 'menu.php' ?>
		<div class="playerWrapper" id="playerWrapper">
			<span>
				<i onclick=bideoa_itxi() class="fa fa-close" style="color:white"></i>
			</span>
			<div id="player"></div>
		</div>
		<main>
			<!-- Argazki handian agertuko den pelikula -->
			<div class="pelikula-nagusia">
				<div class="container" id="nagusia">
						<h3 class="titulua">Ted2</h3>
						<p class="azalpena">
							Seth MacFarlane komikoak idatzi eta zuzendutako komedia arrakastatsuaren jarraipena da.
							Ted eta Tami-Lynn ezkondu berriak, haur bat izatea erabakitzen dute. Johnek bere burua
							eskaintzen du esperma emateko, bere lagunik onenak haurra izateko ametsa bete dezan, baina,
							ustekabean, gutun legal bat jasotzen dute, esanez estatuak ez diola uzten aita izaten, ez baitago
							frogatuta pertsona bat denik. Denek batera indarrak batu beharko dituzte beren eskubideen alde
							justizia-auzitegi batean borrokatzeko.
						</p>
						<button role="button" class="botoia" onclick="playFullscreenNagusia()"><i class="fas fa-play"></i>Play</button>
						<?php
						$BL_FILE='../data/neflish_bideoak.xml';
						if(!file_exists($BL_FILE)) {
							echo('<p>Ez dago bideorik eskuragarri</p>');
						} elseif(!($bl=simplexml_load_file($BL_FILE))) {
							echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
						} else {
							$aurkitua=false;
							foreach($bl->bideoa as $bideoa) {
								if($bideoa['id']=="nagusia"){
									foreach($bideoa->likes->erabiltzailea as $erab){
										if($_SESSION['email']==$erab){
												$aurkitua=true;
												break;
										}else{
											$aurkitua=false;
										}
									}
									if($aurkitua==false){
										?>
										<button role="button" onclick="likeEmanNagusia(this)" class="botoia"><i class="fa fa-heart-o" aria-hidden="true"></i>Gustoko dut</button>
										<?php
									}else{
										?>
										<button role="button" onclick="likeEmanNagusia(this)" class="botoia"><i style="color:red" class="fa fa-heart" aria-hidden="true"></i>Gustoko dut</button>
										<?php
									}
								}
							}
						}
						?>

					</div>
				</div>
			</div>
		</main>

		<div class="container">
			<!--Kategoria aukeratzeko zerrenda -->
			<div class="dropdown">
	        <a href="#" onclick="onClickMenu()" class="dropbtn">Kategoriak &nbsp <i class="fa fa-sort-down" id="gezia"></i></a>
		        <div id="myDropdown" class="dropdown-content">
		            <a onclick="kategoria('Komedia')">Komedia</a>
		            <a onclick="kategoria('Zientzia-fikzioa')">Zientzia-fikzioa</a>
		            <a onclick="kategoria('Beldurrezkoak')">Beldurrezkoak</a>
		            <a onclick="kategoria('Haurrentzako')">Haurrentzako</a>
		        </div>
	    	</div>

			<!-- Ezkerreko pantaila txikia ikusteko pelikula -->
			<div class="kutxa" id="bideoKutxa">
				<div class="irudiaKutxa" id="irudiaKutxa">
					<span>
						<i onclick="popup_itxi('#','#')" class="fa fa-close" style="color:white"></i>
					</span>
					<div class="container">
						<h3 class="titulua"></h3>
						<button role="button" class="botoia" id="playFull"><i class="fas fa-play"></i>Play</button>
						<button role="button" onclick="likeEman(this)" class="botoia"><i class="fa fa-heart-o" aria-hidden="true" id="bihotza"></i>Gustoko dut</button>
					</div>
				</div>
				<div class="infoKutxa" id="infoKutxa">
					<p class="azalpena container"></p>
				</div>
			</div>

			<!-- Karrusel moduan agertzen diren pelikulen zerrenda
		  		Kategoria bat aukeratuta, kategoria horren pelikulak agertu		-->
			<div class="content" id="bideoak">
				<?php
					$BL_FILE='../data/neflish_bideoak.xml';
					if(!file_exists($BL_FILE)) {
						echo('<p>Ez dago bideorik eskuragarri</p>');
					} elseif(!($bl=simplexml_load_file($BL_FILE))) {
						echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
					} else {
						$kategoriak=array("Komedia", "Zientzia-fikzioa", "Beldurrezkoak", "Haurrentzako");
						$kont =0;
						foreach($kategoriak as $kat){
							$kont++;
							?>
							<div class="kategoria-estiloa">
								<div class="container-titulua-kontrolak">
									<h3><?php echo($kat);?></h3>
									<div class="indikagailuak"></div>
								</div>
								<div class="container-nagusia">
									<button role="button" class="ezker-gezia"><i class="fas fa-angle-left"></i></button>

									<div class="container-karrusel" id="ck<?php echo $kont;?>">
										<div class="karrusel">
							<?php
							foreach($bl->bideoa as $bideoa) {
								if($bideoa['id']!="nagusia" && $kat==$bideoa->kategoria){
									$emanda="false";
									foreach($bideoa->likes->erabiltzailea as $erab){
										if ($erab==$_SESSION['email']) {
											$emanda="true";
											break;
										}else{
											$emanda="false";
										}
									}
								?>
											<div class="divBideoa pelikula" id="<?php echo($bideoa['id']);?>">
												<img src="<?php echo $bideoa->irudia; ?>" alt="<?php echo $bideoa->titulua; ?>" onclick="popup_video('<?php echo $bideoa->titulua; ?>','<?php echo $bideoa->azalpena; ?>','<?php echo $bideoa->irudia; ?>','<?php echo $bideoa->linka; ?>', '<?php echo $bideoa['id']; ?>','<?php echo $emanda;?>')">
											</div>

								<?php
								}
							}
							?>
										</div>
									</div>
									<button role="button" class="eskuin-gezia"><i class="fas fa-angle-right"></i></button>
								</div>
							</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		<?php include 'footer.php' ?>
		<script type="text/javascript" src="../js/karrusel.js"></script>
		<script type="text/javascript" src="../js/playVideo.js"></script>
		<script src="../js/kategoriakIkusi.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/likeEman.js" type="text/javascript" charset="utf-8"></script>

	</body>
</html>
