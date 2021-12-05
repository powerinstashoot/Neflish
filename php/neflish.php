<!DOCTYPE html>
<?php include 'segurtasunaErab.php'?>

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

		<?php include 'menu.php' ?>

		<div class="content" id="bideoak">
				<?php
					$BL_FILE='../data/neflish_bideoak.xml';
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
		                        <?php
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
		                            		<i class="fa fa-heart-o" aria-hidden="true"></i>
		                        		</span>
										<?php
									}else{
										?>
										<span>
		                            		<i style="color:red" class="fa fa-heart" aria-hidden="true"></i>
		                        		</span>
										<?php
									}
								?>
		                    </div>
		            <?php
		                }
		            }
		            ?>
		</div>

	</body>
</html>
