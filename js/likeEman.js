function likeEman(sender){
    var bideoId = $(sender).parent().parent().attr('id');
    var klasea = $(sender).hasClass('fa fa-heart'); //Emanda dago.
    $.ajax({
        type: "POST",
        url: '../php/likeEman.php',
        dataType: 'json',
        data: {'bideoId': bideoId, 'emanda': klasea},
        cache: false,
        success: function (data) {
                    if(data){
                        $(sender).removeClass('fa fa-heart-o');
                        $(sender).addClass('fa fa-heart');
                        $(sender).css("color", "red");
                    }else{
                        $(sender).removeClass('fa fa-heart');
                        $(sender).addClass('fa fa-heart-o');
                        $(sender).css("color", "");
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
                    console.log(data);
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

