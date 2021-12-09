/*
Bihotzaren botoia sakatzean exekutatzen den funtzioa.
Ajax-ekin pelikula horren informazioa hartu eta likeEman.php
fitxategiari JSON bat bidali "like" hori XML-an gordetzeko
*/
function likeEman(sender){
    var bideoId = $(sender).siblings('h3').attr('id');
    var klasea = $(sender).children().hasClass('fa-heart'); //Emanda dago.
    $.ajax({
        type: "POST",
        url: '../php/likeEman.php',
        dataType: 'json',
        data: {'bideoId': bideoId, 'emanda': klasea},
        cache: false,
        success: function (data) {
            var url = $(location).attr('href');

            if(url.indexOf("neflish")>=0){
                var aldatu=$('.pelikula#'+bideoId).children('img');
                aldatu.attr("onclick","popup_video('"+data.titulua[0]+"','"+data.azalpena[0]+"','"+data.irudia[0]+"','"+data.linka[0]+"','"+bideoId+"','"+data.egoera+"')");
            }

            if(url.indexOf("bideoGustokoak")>=0){
                var gurutzea=$('.fa-close');
                gurutzea.attr("onclick","popup_itxi('"+data.egoera+"','"+bideoId+"')");
            }

            if(url.indexOf("bideoHoberenak")>=0){
                var aldatu2=$('.topBideoa#'+bideoId).children('img');
                aldatu2.attr("onclick","popup_video('"+data.titulua[0]+"','"+data.azalpena[0]+"','"+data.irudia[0]+"','"+data.linka[0]+"','"+bideoId+"','"+data.egoera+"')");
                var likeTop=$('.topBideoa#'+bideoId).children('.topIzenburua').children('p');
                var likeKop= parseInt(likeTop.text());
                console.log(likeKop);
                var bihotzTop= likeTop.children('i');
                console.log(data.egoera);
                if (data.egoera=="true") {
                    likeKop++;
                    likeTop.text(likeKop+" ");
                }else{
                    likeKop--;
                    likeTop.text(likeKop+" ");
                }
                    likeTop.append("<i class='fa fa-heart-o' aria-hidden='true' id='bihotza'></i>"); 
            }

            if(data.egoera=="true"){
                $(sender).children().removeClass('fa fa-heart-o');
                $(sender).children().addClass('fa fa-heart');
                $(sender).children().css("color", "red");
            }else{
                $(sender).children().removeClass('fa fa-heart');
                $(sender).children().addClass('fa fa-heart-o');
                $(sender).children().css("color", "");
            }
            },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function likeEmanNagusia(sender){
    var klasea = $(sender).children().hasClass('fa fa-heart'); //Emanda dago.
    $.ajax({
        type: "POST",
        url: '../php/likeEman.php',
        dataType: 'json',
        data: {'bideoId': "nagusia", 'emanda': klasea},
        cache: false,
        success: function (data) {
                    if(data.egoera=="true"){
                        $(sender).children().removeClass('fa fa-heart-o');
                        $(sender).children().addClass('fa fa-heart');
                        $(sender).children().css("color", "red");
                    }else{
                        $(sender).children().removeClass('fa fa-heart');
                        $(sender).children().addClass('fa fa-heart-o');
                        $(sender).children().css("color", "");
                        }
                    },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
            }
        });
}
