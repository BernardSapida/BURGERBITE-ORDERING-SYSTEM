$(document).ready(function(){
    $(".progress-line-amount").css("width", $("#income").text());
    $(".progress-line-clients").css("width", $("#clients").text());
    $(".progress-line-incomplete-orders").css("width", $("#incomplete-orders").text());
    $(".progress-line-total-orders").css("width", $("#completed-orders").text());
    
    $("#close-modal").click(function() {
        $(".section_modal_client-details").fadeToggle();
    });

    $("#search").keyup(function() {
        search_client($(this).val());
    });

    function search_client(value) {
        $(".table_client-orders tbody tr").each(function() {
            let isFound = false;
            
            $(this).each(function() {
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    isFound = true;
                }
            });
            
            if(isFound) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});
  