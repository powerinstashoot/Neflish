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
		<script type="text/javascript" src="../js/menu.js"></script>
		<link rel="icon" href="../img/NeflishLogo3.png">
		<title>Neflish</title>
	</head>
	<body class="bideoHob">
		<?php include 'menu.php' ?>
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
                        foreach($bl->bideoa as $bid){
                            if(in_array($bid['id'], $bideoGustokoenak)){
                                ?>
                                <div class="divBideoa" id="<?php echo($bid['id']);?>">
                                    <h2><?php echo $bid->titulua;?></h2>
                                    <h3><?php echo $bid->kategoria;?></h3>
                                    <?php
                                    if($bid->azalpena) {
                                        echo '<p>'.$bid->azalpena.'</p>';
                                    }
                                    ?>
                                    <iframe width="430" height="315" src="<?php echo $bid->linka; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <?php
									$aurkitua=false;
									foreach($bid->likes->erabiltzailea as $erab){
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