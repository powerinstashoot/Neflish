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

