<?php
    session_start();

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "admin") header("Location: index.php");
    
    error_reporting(E_ERROR | E_PARSE);

    $cart_success = false;
    $quantity = 0;

    $fp1 = $_POST["featured-product-1"];
    $fp2 = $_POST["featured-product-2"];
    $fp3 = $_POST["featured-product-3"];
    $burger_1 = $_POST["Spicy_Lamb_Burger"];
    $burger_2 = $_POST["Surf_n_Turf_Burger"];
    $burger_3 = $_POST["Peppercorn_Burger"];
    $burger_4 = $_POST["Vegan_Burger"];
    $burger_5 = $_POST["Blackjack_Burger"];
    $burger_6 = $_POST["American_Classic_Burger"];
    $pizza_1 = $_POST["Supreme_Pizza"];
    $pizza_2 = $_POST["Bacon_Chilli_Pizza"];
    $pizza_3 = $_POST["BBQ_Chicken_Pizza"];
    $pizza_4 = $_POST["Creole_Shrimp_Pizza"];
    $pizza_5 = $_POST["Cheese_Pizza"];
    $pizza_6 = $_POST["Hawaiian_Pizza"];
    $fries_1 = $_POST["Barbeque_Fries"];
    $fries_2 = $_POST["Cheddar_Cheese_Fries"];
    $fries_3 = $_POST["Chili_Barbeque_Fries"];
    $fries_4 = $_POST["Salted_Fries"];
    $fries_5 = $_POST["Sour_Cream_Fries"];
    $fries_6 = $_POST["Wasabi_Fries"];
    $drinks_1 = $_POST["Avocado_Shake"];
    $drinks_2 = $_POST["Berry_Shake"];
    $drinks_3 = $_POST["Lemonade_Shake"];
    $drinks_4 = $_POST["Mango_Shake"];
    $drinks_5 = $_POST["Pineapple_Shake"];
    $drinks_6 = $_POST["Strawberry_Shake"];

    if(!empty($fp1) || !empty($fp2) || !empty($fp3) || !empty($burger_1) || !empty($burger_2) || !empty($burger_3) || !empty($burger_4) || !empty($burger_5) || 
    !empty($burger_6) || !empty($pizza_1) || !empty($pizza_2) || !empty($pizza_3) || !empty($pizza_4) || !empty($pizza_5) || !empty($pizza_6) || 
    !empty($fries_1) || !empty($fries_2) || !empty($fries_3) || !empty($fries_4) || !empty($fries_5) || !empty($fries_6) || 
    !empty($drinks_1) || !empty($drinks_2) || !empty($drinks_3) || !empty($drinks_4) || !empty($drinks_5) || !empty($drinks_6)) {
        $_SESSION["quantity"] = 0;
        
        $_POST["featured-product-1"] ? $_SESSION["featured-product-1"] += $_POST["featured-product-1"] : 0;
        $_POST["featured-product-2"] ? $_SESSION["featured-product-2"] += $_POST["featured-product-2"] : 0;
        $_POST["featured-product-3"] ? $_SESSION["featured-product-3"] += $_POST["featured-product-3"] : 0;
        $_POST["Spicy_Lamb_Burger"] ? $_SESSION["Spicy_Lamb_Burger"] += $_POST["Spicy_Lamb_Burger"] : 0;
        $_POST["Surf_n_Turf_Burger"] ? $_SESSION["Surf_n_Turf_Burger"] += $_POST["Surf_n_Turf_Burger"] : 0;
        $_POST["Peppercorn_Burger"] ? $_SESSION["Peppercorn_Burger"] += $_POST["Peppercorn_Burger"] : 0;
        $_POST["Vegan_Burger"] ? $_SESSION["Vegan_Burger"] += $_POST["Vegan_Burger"] : 0;
        $_POST["Blackjack_Burger"] ? $_SESSION["Blackjack_Burger"] += $_POST["Blackjack_Burger"] : 0;
        $_POST["American_Classic_Burger"] ? $_SESSION["American_Classic_Burger"] += $_POST["American_Classic_Burger"] : 0;
        $_POST["Supreme_Pizza"] ? $_SESSION["Supreme_Pizza"] += $_POST["Supreme_Pizza"] : 0;
        $_POST["Bacon_Chilli_Pizza"] ? $_SESSION["Bacon_Chilli_Pizza"] += $_POST["Bacon_Chilli_Pizza"] : 0;
        $_POST["BBQ_Chicken_Pizza"] ? $_SESSION["BBQ_Chicken_Pizza"] += $_POST["BBQ_Chicken_Pizza"] : 0;
        $_POST["Creole_Shrimp_Pizza"] ? $_SESSION["Creole_Shrimp_Pizza"] += $_POST["Creole_Shrimp_Pizza"] : 0;
        $_POST["Cheese_Pizza"] ? $_SESSION["Cheese_Pizza"] += $_POST["Cheese_Pizza"] : 0;
        $_POST["Hawaiian_Pizza"] ? $_SESSION["Hawaiian_Pizza"] += $_POST["Hawaiian_Pizza"] : 0;
        $_POST["Barbeque_Fries"] ? $_SESSION["Barbeque_Fries"] += $_POST["Barbeque_Fries"] : 0;
        $_POST["Cheddar_Cheese_Fries"] ? $_SESSION["Cheddar_Cheese_Fries"] += $_POST["Cheddar_Cheese_Fries"] : 0;
        $_POST["Chili_Barbeque_Fries"] ? $_SESSION["Chili_Barbeque_Fries"] += $_POST["Chili_Barbeque_Fries"] : 0;
        $_POST["Salted_Fries"] ? $_SESSION["Salted_Fries"] += $_POST["Salted_Fries"] : 0;
        $_POST["Sour_Cream_Fries"] ? $_SESSION["Sour_Cream_Fries"] += $_POST["Sour_Cream_Fries"] : 0;
        $_POST["Wasabi_Fries"] ? $_SESSION["Wasabi_Fries"] += $_POST["Wasabi_Fries"] : 0;
        $_POST["Avocado_Shake"] ? $_SESSION["Avocado_Shake"] += $_POST["Avocado_Shake"] : 0;
        $_POST["Berry_Shake"] ? $_SESSION["Berry_Shake"] += $_POST["Berry_Shake"] : 0;
        $_POST["Lemonade_Shake"] ? $_SESSION["Lemonade_Shake"] += $_POST["Lemonade_Shake"] : 0;
        $_POST["Mango_Shake"] ? $_SESSION["Mango_Shake"] += $_POST["Mango_Shake"] : 0;
        $_POST["Pineapple_Shake"] ? $_SESSION["Pineapple_Shake"] += $_POST["Pineapple_Shake"] : 0;
        $_POST["Strawberry_Shake"] ? $_SESSION["Strawberry_Shake"] += $_POST["Strawberry_Shake"] : 0;

        $_SESSION["menu"] = array(
            "featured-product-1" => [$_SESSION["featured-product-1"], 250],
            "featured-product-2" => [$_SESSION["featured-product-2"], 299],
            "featured-product-3" => [$_SESSION["featured-product-3"], 199],
            "Spicy_Lamb_Burger" => [$_SESSION["Spicy_Lamb_Burger"], 250],
            "Surf_n_Turf_Burger" => [$_SESSION["Surf_n_Turf_Burger"], 299],
            "Peppercorn_Burger" => [$_SESSION["Peppercorn_Burger"], 199],
            "Vegan_Burger" => [$_SESSION["Vegan_Burger"], 149],
            "Blackjack_Burger" => [$_SESSION["Blackjack_Burger"], 249],
            "American_Classic_Burger" => [$_SESSION["American_Classic_Burger"], 199],
            "Supreme_Pizza" => [$_SESSION["Supreme_Pizza"], 489],
            "Bacon_Chilli_Pizza" => [$_SESSION["Bacon_Chilli_Pizza"], 489],
            "BBQ_Chicken_Pizza" => [$_SESSION["BBQ_Chicken_Pizza"], 489],
            "Creole_Shrimp_Pizza" => [$_SESSION["Creole_Shrimp_Pizza"], 489],
            "Cheese_Pizza" => [$_SESSION["Cheese_Pizza"], 499],
            "Hawaiian_Pizza" => [$_SESSION["Hawaiian_Pizza"], 489],
            "Barbeque_Fries" => [$_SESSION["Barbeque_Fries"], 119],
            "Cheddar_Cheese_Fries" => [$_SESSION["Cheddar_Cheese_Fries"], 119],
            "Chili_Barbeque_Fries" => [$_SESSION["Chili_Barbeque_Fries"], 119],
            "Salted_Fries" => [$_SESSION["Salted_Fries"], 79],
            "Sour_Cream_Fries" => [$_SESSION["Sour_Cream_Fries"], 119],
            "Wasabi_Fries" => [$_SESSION["Wasabi_Fries"], 119],
            "Avocado_Shake" => [$_SESSION["Avocado_Shake"], 149],
            "Berry_Shake" => [$_SESSION["Berry_Shake"], 149],
            "Lemonade_Shake" => [$_SESSION["Lemonade_Shake"], 149],
            "Mango_Shake" => [$_SESSION["Mango_Shake"], 149],
            "Pineapple_Shake" => [$_SESSION["Pineapple_Shake"], 149],
            "Strawberry_Shake" => [$_SESSION["Strawberry_Shake"], 149]
        );

        foreach($_SESSION["menu"] as $key => $value) {
            $_SESSION["quantity"] += (int) $value[0];
        }
    } else {
        // echo "<script>console.log('Failed!')</script>";
    }
?>