<?php
session_start(); 
$id=$_POST['bideoId'];
$egoera=$_POST['emanda'];
$xml=simplexml_load_file('../data/neflish_bideoak.xml');

foreach($xml->bideoa as $bideoa){
    if($bideoa['id']==$id){
        
        if($egoera=="true"){
            //erabiltzailea ezabatu
            foreach($bideoa->likes->erabiltzailea as $erab){
                if($erab==$_SESSION['email']){
                    unset($erab[0]);
                    echo("false");
                    break;
                }
            }
        }else if ($egoera=="false"){
            //erabiltzailea gehitu
            $berria = $bideoa->likes;
            $berria->addChild('erabiltzailea', $_SESSION['email']);
            echo("true");
            
        }
    }
}
$xml->asXML('../data/neflish_bideoak.xml'); //Aldaketak gordetzeko.
?>