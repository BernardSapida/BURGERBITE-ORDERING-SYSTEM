$(document).ready(function(){
    $("#featured-product-1-minus-btn, #featured-product-2-minus-btn, #featured-product-3-minus-btn,\
    #burger-1-minus-btn, #burger-2-minus-btn, #burger-3-minus-btn, #burger-4-minus-btn, #burger-5-minus-btn, #burger-6-minus-btn,\
    #pizza-1-minus-btn, #pizza-2-minus-btn, #pizza-3-minus-btn, #pizza-4-minus-btn, #pizza-5-minus-btn, #pizza-6-minus-btn,\
    #fries-1-minus-btn, #fries-2-minus-btn, #fries-3-minus-btn, #fries-4-minus-btn, #fries-5-minus-btn, #fries-6-minus-btn,\
    #drinks-1-minus-btn, #drinks-2-minus-btn, #drinks-3-minus-btn, #drinks-4-minus-btn, #drinks-5-minus-btn, #drinks-6-minus-btn").click(function(){
        $(`#${$(this).attr('id').slice(0, -10)}`).val(Number($(`#${$(this).attr('id').slice(0, -10)}`).val())-1);
    });

    $("#featured-product-1-plus-btn, #featured-product-2-plus-btn, #featured-product-3-plus-btn,\
    #burger-1-plus-btn, #burger-2-plus-btn, #burger-3-plus-btn, #burger-4-plus-btn, #burger-5-plus-btn, #burger-6-plus-btn,\
    #pizza-1-plus-btn, #pizza-2-plus-btn, #pizza-3-plus-btn, #pizza-4-plus-btn, #pizza-5-plus-btn, #pizza-6-plus-btn,\
    #fries-1-plus-btn, #fries-2-plus-btn, #fries-3-plus-btn, #fries-4-plus-btn, #fries-5-plus-btn, #fries-6-plus-btn,\
    #drinks-1-plus-btn, #drinks-2-plus-btn, #drinks-3-plus-btn, #drinks-4-plus-btn, #drinks-5-plus-btn, #drinks-6-plus-btn").click(function(){
        $(`#${$(this).attr('id').slice(0, -9)}`).val(Number($(`#${$(this).attr('id').slice(0, -9)}`).val())+1);
    });

    $("#btn_cart-featured-product-1, #btn_cart-featured-product-2, #btn_cart-featured-product-3,\
    #btn_cart-burger-1, #btn_cart-burger-2, #btn_cart-burger-3, #btn_cart-burger-4, #btn_cart-burger-5, #btn_cart-burger-6,\
    #btn_cart-pizza-1, #btn_cart-pizza-2, #btn_cart-pizza-3, #btn_cart-pizza-4, #btn_cart-pizza-5, #btn_cart-pizza-6,\
    #btn_cart-fries-1, #btn_cart-fries-2, #btn_cart-fries-3, #btn_cart-fries-4, #btn_cart-fries-5, #btn_cart-fries-6,\
    #btn_cart-drinks-1, #btn_cart-drinks-2, #btn_cart-drinks-3, #btn_cart-drinks-4, #btn_cart-drinks-5, #btn_cart-drinks-6").click(function(e){
        // console.log($(`#${$(this).attr('id').slice(9,)}`).val());
    });

    $("#btn_added").click(function(){
        $(".section_modal-added-success").fadeOut();
    });

    $("#btn_empty").click(function(){
        $(".section_modal-added-failed").fadeOut();
    });

    $("button[name='add_to_cart']").click(function(e){
        let inputQuantity = $("input[type='number']").serializeArray();
        let total = inputQuantity.reduce((initialValue, value, array) => initialValue += Number(value["value"]), 0);

        if(total != 0) {
            $.ajax({
                type: "POST",
                url: "client_menu.php",
                data: inputQuantity,
                cache: false,
                success: function(data) {
                    $("#quantity").text(Number($("#quantity").text()) + Number(total));
                    $(".section_modal-added-success").fadeIn();
                    $("#modal-quantity").text($("#quantity").text());
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });

            $("input[type='number'").val(0);
        } else {
            $(".section_modal-added-failed").fadeIn();
        }
    });
});
  