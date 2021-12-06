<!DOCTYPE html>
<?php include 'segurtasunaErab.php'?>

<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<script type="text/javascript" src="../js/dynamicClient.js"></script>
		<script src="../js/kategoriakIkusi.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script src="../js/likeEman.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/menu.js"></script>
		<script type="text/javascript" src="../js/playVideo.js"></script>
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
	    <div class="pelikula-nagusia">
	    	<div class="container" id="nagusia">
					<h3 class="titulua">Ted2</h3>
					<p class="azalpena">
						Seth MacFarlane komikoak idatzi eta zuzendutako komedia arrakastatsuaren jarraipena da. Ted eta Tami-Lynn ezkondu berriak, haur bat izatea erabakitzen dute. Johnek bere burua eskaintzen du esperma emateko, bere lagunik onenak haurra izateko ametsa bete dezan, baina, ustekabean, gutun legal bat jasotzen dute, esanez estatuak ez diola uzten aita izaten, ez baitago frogatuta pertsona bat denik. Denek batera indarrak batu beharko dituzte beren eskubideen alde justizia-auzitegi batean borrokatzeko.
					</p>
					<button role="button" class="botoia"><i class="fas fa-play"></i>Play</button>
					<button role="button" onclick="likeEmanNagusia(this)" class="botoia"><i class="fa fa-heart-o" aria-hidden="true"></i>Gustoko dut</button>
				</div>
			</div>
		</div>
	</main>

		<div class="container">
				<div class="dropdown">
	          <a href="#" onclick="onClickMenu()" class="dropbtn">Kategoriak <i class="fa fa-sort-down"></i></a>
	          <div id="myDropdown" class="dropdown-content">
	            <a onclick="kategoria('teknologia','<?php echo($_SESSION['email']);?>')">Teknologia</a>
	            <a onclick="kategoria('bidaia','<?php echo($_SESSION['email']);?>')">Bidaiak</a>
	            <a onclick="kategoria('janaria','<?php echo($_SESSION['email']);?>')">Janaria</a>
	            <a onclick="kategoria('futbola','<?php echo($_SESSION['email']);?>')">Futbola</a>
	          </div>
	    </div>
		
		
		
		<div class="kutxa" id="bideoKutxa">
			<img src="" width="430" height="315">
			<span>
				<i onclick=popup_itxi() class="fa fa-close" style="color:white"></i>
			</span>
			<h3 class="titulua"></h3>
			<p class="azalpena"></p>
			<button role="button" class="botoia" id="playFull"><i class="fas fa-play"></i>Play</button>
			<button role="button" onclick="likeEmanNagusia(this)" class="botoia"><i class="fa fa-heart-o" aria-hidden="true"></i>Gustoko dut</button>
		</div>
		<div class="content" id="bideoak">
				<?php
					$BL_FILE='../data/neflish_bideoak.xml';
					if(!file_exists($BL_FILE)) {
						echo('<p>Ez dago bideorik eskuragarri</p>');
					} elseif(!($bl=simplexml_load_file($BL_FILE))) {
						echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
					} else {
		                foreach($bl->bideoa as $bideoa) {
		                	if($bideoa['id']!="nagusia"){

		                    ?>
		                    <div class="divBideoa" id="<?php echo($bideoa['id']);?>">
		                        <h2><?php echo $bideoa->titulua;?></h2>
		                        <h3><?php echo $bideoa->kategoria;?></h3>
		                        <?php
		                        if($bideoa->azalpena) {
		                            echo '<p>'.$bideoa->azalpena.'</p>';
		                        }
		                        ?>
								<img src="<?php echo $bideoa->irudia; ?>" alt="<?php echo $bideoa->titulua; ?>" width="430" height="315" onclick="popup_video('<?php echo $bideoa->titulua; ?>','<?php echo $bideoa->azalpena; ?>','<?php echo $bideoa->irudia; ?>','<?php echo $bideoa->linka; ?>')">
		                        
		                        <?php
									$aurkitua=false;
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
										<span>
		                            		<i onclick="likeEman(this)" class="fa fa-heart-o" aria-hidden="true"></i>
		                        		</span>
										<?php
									}else{
										?>
										<span>
		                            		<i onclick="likeEman(this)" style="color:red" class="fa fa-heart" aria-hidden="true"></i>
		                        		</span>
										<?php
									}
								?>
		                    </div>
		            <?php
		                }
		            }
		          }
		            ?>
		</div>
	</body>
</html>
