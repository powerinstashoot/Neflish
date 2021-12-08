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
            var aldatu=$('.pelikula#'+bideoId).children('img');
            if(data.egoera=="true"){
                $(sender).children().removeClass('fa fa-heart-o');
                $(sender).children().addClass('fa fa-heart');
                $(sender).children().css("color", "red");
                aldatu.attr("onclick","popup_video('"+data.titulua[0]+"','"+data.azalpena[0]+"','"+data.irudia[0]+"','"+data.linka[0]+"','"+bideoId+"','true')");
            }else{
                $(sender).children().removeClass('fa fa-heart');
                $(sender).children().addClass('fa fa-heart-o');
                $(sender).children().css("color", "");
                aldatu.attr("onclick","popup_video('"+data.titulua[0]+"','"+data.azalpena[0]+"','"+data.irudia[0]+"','"+data.linka[0]+"','"+bideoId+"','false')");
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

