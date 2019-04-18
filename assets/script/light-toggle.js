$(document).ready(function(){
    var check = true;
    $("#light-toggle").click(function(){
        $('body').toggleClass("light-toggle");
        if (check == true) {
            $(this).text("lights on");
            check = false;
        }
        else{
            $(this).text("lights off");
            check = true;
        }
    });
});