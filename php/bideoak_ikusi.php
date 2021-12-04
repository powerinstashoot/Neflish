<?php
    require_once("bideoak.inc");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bideoak ikusi</title>
		<meta charset="ISO-8859-1">
	</head>
	<body>
        <h1>Bideo zerrenda</h1>
		<?php
			if(!file_exists($BL_FILE)) {
				echo('<p>Ez dago bideorik eskuragarri</p>');
			} elseif(!($bl=simplexml_load_file($BL_FILE))) {
				echo('<p>Errore bat gertatu da bideoak kargatzean</p>');
			} else {
                foreach($bl->bideoa as $bideoa) {
                    ?>
                    <div class="bideoa">
                        <h2><?php echo $bideoa->titulua;?></h2>
                        <h3><?php echo $bideoa->kategoria;?></h3>
                        <?php
                        if($bideoa->azalpena) {
                            echo '<p>'.$bideoa->azalpena.'</p>';
                        }
                        ?>
                        <iframe width="560" height="315" src="<?php echo $bideoa->linka; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <span id=like1>
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </span>
                    </div>
            <?php
                }
            }
            ?>
	</body>
</html>