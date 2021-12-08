<?php
session_start(); 
$id=$_POST['bideoId'];
$egoera=$_POST['emanda'];
$xml=simplexml_load_file('../data/neflish_bideoak.xml');
$egoeraB=$egoera;
foreach($xml->bideoa as $bideoa){
    if($bideoa['id']==$id){
        if($egoera=="true"){
            //erabiltzailea ezabatu
            foreach($bideoa->likes->erabiltzailea as $erab){
                if($erab==$_SESSION['email']){
                    unset($erab[0]);
                    $egoeraB = "false";
                    break;
                }
            }
        }else {
            //erabiltzailea gehitu
            $berria = $bideoa->likes;
            $berria->addChild('erabiltzailea', $_SESSION['email']);
            $egoeraB = "true";
            
        }

        $datos = array(
            'egoera' => $egoeraB,
            'titulua' =>  $bideoa->titulua, 
            'azalpena' => $bideoa->azalpena, 
            'irudia' =>  $bideoa->irudia,
            'linka' =>  $bideoa->linka
        );

        echo json_encode($datos, JSON_FORCE_OBJECT);
    }
}
$xml->asXML('../data/neflish_bideoak.xml'); //Aldaketak gordetzeko.
?>