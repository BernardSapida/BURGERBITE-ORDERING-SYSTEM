$(document).ready(function(){
    $("#featured-product-1-minus-btn, #featured-product-2-minus-btn, #featured-product-3-minus-btn,\
    #burger-1-minus-btn, #burger-2-minus-btn, #burger-3-minus-btn, #burger-4-minus-btn, #burger-5-minus-btn, #burger-6-minus-btn,\
    #pizza-1-minus-btn, #pizza-2-minus-btn, #pizza-3-minus-btn, #pizza-4-minus-btn, #pizza-5-minus-btn, #pizza-6-minus-btn,\
    #fries-1-minus-btn, #fries-2-minus-btn, #fries-3-minus-btn, #fries-4-minus-btn, #fries-5-minus-btn, #fries-6-minus-btn,\
    #drinks-1-minus-btn, #drinks-2-minus-btn, #drinks-3-minus-btn, #drinks-4-minus-btn, #drinks-5-minus-btn, #drinks-6-minus-btn").click(function(){
        $(`#${$(this).attr('id').slice(0, -10)}`).val((Number($(`#${$(this).attr('id').slice(0, -10)}`).val())-1 < 0 ? 0 : Number($(`#${$(this).attr('id').slice(0, -10)}`).val())-1));
    });

    $("#featured-product-1-plus-btn, #featured-product-2-plus-btn, #featured-product-3-plus-btn,\
    #burger-1-plus-btn, #burger-2-plus-btn, #burger-3-plus-btn, #burger-4-plus-btn, #burger-5-plus-btn, #burger-6-plus-btn,\
    #pizza-1-plus-btn, #pizza-2-plus-btn, #pizza-3-plus-btn, #pizza-4-plus-btn, #pizza-5-plus-btn, #pizza-6-plus-btn,\
    #fries-1-plus-btn, #fries-2-plus-btn, #fries-3-plus-btn, #fries-4-plus-btn, #fries-5-plus-btn, #fries-6-plus-btn,\
    #drinks-1-plus-btn, #drinks-2-plus-btn, #drinks-3-plus-btn, #drinks-4-plus-btn, #drinks-5-plus-btn, #drinks-6-plus-btn").click(function(){
        $(`#${$(this).attr('id').slice(0, -9)}`).val(Number($(`#${$(this).attr('id').slice(0, -9)}`).val())+1);
    });

    $("#edit").click(function(){
        $(".section_modify-cart").fadeIn();
    })
    
    $("#save_changes").click(function() {
        $(".section_modify-cart").fadeOut();
    });

    $("#btn_success").click(function() {
        $(".section_modal-order-success").fadeOut();
    });
});
  