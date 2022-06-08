$(document).ready(function(){
    $(".section_members-participation").hide();
    $(".section_members-participation").fadeIn();

    $("#btn-participation").click(function() {
        $(".section_members-participation").fadeOut();
    });
});