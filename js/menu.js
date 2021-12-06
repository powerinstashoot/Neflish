$("document").ready(function(){
    $(function() {
        $('.menu a[href="' + location.pathname.split("/")[location.pathname.split("/").length-1] + '"]').addClass('activo');
    });
});