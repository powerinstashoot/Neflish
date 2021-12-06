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
	<body class="gustokoP">
		<?php include 'menu.php' ?>
		<div class="content" id="bideoak">
				<?php
					$BL_FILE='../data/neflish_bideoak.xml';
					if(!file_exists($BL_FILE)) {
						echo('<p>Ez dago bideorik eskuragarri.</p>');
					} elseif(!($bl=simplexml_load_file($BL_FILE))) {
						echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
					} else {
		                foreach($bl->bideoa as $bideoa) {
                            $aurkitua=false;
                            foreach($bideoa->likes->erabiltzailea as $erab){
                                if($_SESSION['email']==$erab){
                                        $aurkitua=true;
                                        break;
                                }
                            }
                            if($aurkitua==true){
		                    ?>
		                    <div class="divBideoa" id="<?php echo($bideoa['id']);?>">
		                        <h2><?php echo $bideoa->titulua;?></h2>
		                        <h3><?php echo $bideoa->kategoria;?></h3>
		                        <?php
		                        if($bideoa->azalpena) {
		                            echo '<p>'.$bideoa->azalpena.'</p>';
		                        }
		                        ?>
		                        <iframe width="430" height="315" src="<?php echo $bideoa->linka; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
		            ?>
		</div>

	</body>
</html>