function likeEman(sender){
    var bideoId = $(sender).siblings('h3').attr('id');
    var klasea = $(sender).children().hasClass('fa-heart'); //Emanda dago.
    $.ajax({
        type: "POST",
        url: '../php/likeEman.php',
        dataType: 'html',
        data: {'bideoId': bideoId, 'emanda': klasea},
        cache: false,
        success: function (data) {
                    if(data){
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
                    if(data){
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

