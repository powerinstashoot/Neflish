<!DOCTYPE html>
<?php include 'segurtasunaErab.php'?>

<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/dynamicClient.js"></script>
		<script src="../js/kategoriakIkusi.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script src="../js/likeEman.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/playVideo.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../js/menu.js"></script>
		<script src="https://www.youtube.com/iframe_api"></script>
		
		<link rel="icon" href="../img/NeflishLogo3.png">
		<title>Neflish</title>
	</head>
	<body class="bideoHob">
		<?php include 'menu.php' ?>
		<div class="playerWrapper" id="playerWrapper">
			<span>
				<i onclick=bideoa_itxi() class="fa fa-close" style="color:white"></i>
			</span>
			<div id="player"></div>
		</div>
		<div class="kutxa" id="bideoKutxa">
			<div class="irudiaKutxa" id="irudiaKutxa">
				<span>
					<i onclick=popup_itxi() class="fa fa-close" style="color:white"></i>
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
		<div class="content" id="bideoak">
			<div class="container">
				<h2 class="sekzioTit">Pelikula hoberenak</h2>
				<?php
					$BL_FILE='../data/neflish_bideoak.xml';
					if(!file_exists($BL_FILE)) {
						echo('<p>Ez dago bideorik eskuragarri.</p>');
					} elseif(!($bl=simplexml_load_file($BL_FILE))) {
						echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
					} else {
                        $bideoGustokoenak = array(null);
                        
                        for($j=0; $j<3; $j++){
                            $handiena=-1;
                            for($i=0; $i<count($bl->bideoa); $i++) {
                                if(count($bl->bideoa[$i]->likes->erabiltzailea)>$handiena && (!in_array($bl->bideoa[$i]['id'], $bideoGustokoenak))){
                                    $handiena=count($bl->bideoa[$i]->likes->erabiltzailea);
                                    $handienaId=$bl->bideoa[$i]['id'];
                                }
                            }
                            array_push($bideoGustokoenak, $handienaId);
                        }
						?>
						<div class="bideoakKutxa">
						<?php
						$kont=1;
						for ($j=1; $j<4; $j++) {
							
							foreach($bl->bideoa as $bideoa){
								$emanda="false";
								if($bideoGustokoenak[$j]==$bideoa['id']){
									$likeKop = count($bideoa->likes->erabiltzailea);
									foreach($bideoa->likes->erabiltzailea as $erab){
										if ($erab==$_SESSION['email']) {
											$emanda="true";
											break;
										}else{
											$emanda="false";
										}
									}
									?>
									<div class="topBideoa" id="<?php echo($bideoa['id']);?>">
										<div class="topIzenburua">
											<h3>TOP<?php echo $kont; ?></h3>
											<p><?php echo $likeKop; ?> <i class="fa fa-heart-o" aria-hidden="true" id="bihotza"></i></p>
										</div>
										<img src="<?php echo $bideoa->irudia; ?>" alt="<?php echo $bideoa->titulua; ?>" onclick="popup_video('<?php echo $bideoa->titulua; ?>','<?php echo $bideoa->azalpena; ?>','<?php echo $bideoa->irudia; ?>','<?php echo $bideoa->linka; ?>', '<?php echo $bideoa['id']; ?>','<?php echo $emanda;?>')"/>
									</div>
									<?php
									$kont++;
									break;
								}
								
							}
						}
                        
						?>
						</div>
						<?php
                    }
		            ?>
				</div>
		    </div>
			<?php include 'footer.php' ?>
	</body>
</html>