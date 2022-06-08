<?php
    session_start();

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "admin") header("Location: index.php");
    
    //error_reporting(E_ERROR | E_PARSE);
    
    $errFirstname = "";
    $errLastname = "";
    $errStreetAddress = "";
    $errCity = "";
    $errBarangay = "";
    $errEmptyCart = "";
    $errRequiredFields = "";

    $order_success = false;

    $clientid = $_SESSION["clientid"];
    $firstname = htmlspecialchars($_POST["client_firstname"]);
    $lastname = htmlspecialchars($_POST["client_lastname"]);
    $image = $_SESSION["image"];
    $street_address = htmlspecialchars($_POST["client_address"]);
    $city = htmlspecialchars($_POST["client_city"]);
    $barangay = htmlspecialchars($_POST["client_barangay"]);
    $fp1 = intval($_SESSION["featured-product-1"]);
    $fp2 = intval($_SESSION["featured-product-2"]);
    $fp3 = intval($_SESSION["featured-product-3"]);
    $burger1 = intval($_SESSION["Spicy_Lamb_Burger"]);
    $burger2 = intval($_SESSION["Surf_n_Turf_Burger"]);
    $burger3 = intval($_SESSION["Peppercorn_Burger"]);
    $burger4 = intval($_SESSION["Vegan_Burger"]);
    $burger5 = intval($_SESSION["Blackjack_Burger"]);
    $burger6 = intval($_SESSION["American_Classic_Burger"]);
    $pizza1 = intval($_SESSION["Supreme_Pizza"]);
    $pizza2 = intval($_SESSION["Bacon_Chilli_Pizza"]);
    $pizza3 = intval($_SESSION["BBQ_Chicken_Pizza"]);
    $pizza4 = intval($_SESSION["Creole_Shrimp_Pizza"]);
    $pizza5 = intval($_SESSION["Cheese_Pizza"]);
    $pizza6 = intval($_SESSION["Hawaiian_Pizza"]);
    $fries1 = intval($_SESSION["Barbeque_Fries"]);
    $fries2 = intval($_SESSION["Cheddar_Cheese_Fries"]);
    $fries3 = intval($_SESSION["Chili_Barbeque_Fries"]);
    $fries4 = intval($_SESSION["Salted_Fries"]);
    $fries5 = intval($_SESSION["Sour_Cream_Fries"]);
    $fries6 = intval($_SESSION["Wasabi_Fries"]);
    $drinks1 = intval($_SESSION["Avocado_Shake"]);
    $drinks2 = intval($_SESSION["Berry_Shake"]);
    $drinks3 = intval($_SESSION["Lemonade_Shake"]);
    $drinks4 = intval($_SESSION["Mango_Shake"]);
    $drinks5 = intval($_SESSION["Pineapple_Shake"]);
    $drinks6 = intval($_SESSION["Strawberry_Shake"]);
    $quantity = intval($_SESSION["quantity"]);
    $total = floatval($_SESSION["total_amount"]);

    if(isset($_POST["submit"])) {
        if(!empty($firstname) && !empty($lastname) && !empty($street_address) && !empty($city) && !empty($barangay) && !empty($quantity)) {
            $order_success = true;
            $transactionNo = explode(".", uniqid("",true))[0];
            $orderNo = explode(".", uniqid("",true))[1];
            $status = "Pending";

            $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub") or die("ERROR: Could not connect. " .  $connect->connect_error);
            $sql = "INSERT INTO `client_orders`
            (`clientid`, `firstname`, `lastname`, `image`, `street address`, `city`, `barangay`, `transactionNo`, `orderNo`, 
            `featured-product-1`, `featured-product-2`, `featured-product-3`, 
            `Spicy Lamb Burger`, `Surf n Turf Burger`, `Peppercorn Burger`, `Vegan Burger`, 
            `Blackjack Burger`, `American Classic Burger`, `Supreme Pizza`, `Bacon Chilli Pizza`, 
            `BBQ Chicken Pizza`, `Creole Shrimp Pizza`, `Cheese Pizza`, `Hawaiian Pizza`, 
            `Barbeque Fries`, `Cheddar Cheese Fries`, `Chili Barbeque Fries`, `Salted Fries`, 
            `Sour Cream Fries`, `Wasabi Fries`, `Avocado Shake`, `Berry Shake`, `Lemonade Shake`, 
            `Mango Shake`, `Pineapple Shake`, `Strawberry Shake`, `quantity`, `total`, `status`)
            VALUES
            ('$clientid','$firstname','$lastname','$image','$street_address','$city', '$barangay', '$transactionNo', '$orderNo',
            '$fp1', '$fp2', '$fp3',
            '$burger1', '$burger2', '$burger3', '$burger4', '$burger5', '$burger6',
            '$pizza1','$pizza2','$pizza3','$pizza4','$pizza5','$pizza6',
            '$fries1', '$fries2','$fries3','$fries4','$fries5','$fries6',
            '$drinks1','$drinks2','$drinks3','$drinks4','$drinks5','$drinks6',
            '$quantity','$total','$status')";

            mysqli_query($connect, $sql);
          	echo("Error description: " . mysqli_error($connect));
            
            $_SESSION["featured-product-1"] = 0;
            $_SESSION["featured-product-2"] = 0;
            $_SESSION["featured-product-3"] = 0;
            $_SESSION["Spicy_Lamb_Burger"] = 0;
            $_SESSION["Surf_n_Turf_Burger"] = 0;
            $_SESSION["Peppercorn_Burger"] = 0;
            $_SESSION["Vegan_Burger"] = 0;
            $_SESSION["Blackjack_Burger"] = 0;
            $_SESSION["American_Classic_Burger"] = 0;
            $_SESSION["Supreme_Pizza"] = 0;
            $_SESSION["Bacon_Chilli_Pizza"] = 0;
            $_SESSION["BBQ_Chicken_Pizza"] = 0;
            $_SESSION["Creole_Shrimp_Pizza"] = 0;
            $_SESSION["Cheese_Pizza"] = 0;
            $_SESSION["Hawaiian_Pizza"] = 0;
            $_SESSION["Barbeque_Fries"] = 0;
            $_SESSION["Cheddar_Cheese_Fries"] = 0;
            $_SESSION["Chili_Barbeque_Fries"] = 0;
            $_SESSION["Salted_Fries"] = 0;
            $_SESSION["Sour_Cream_Fries"] = 0;
            $_SESSION["Wasabi_Fries"] = 0;
            $_SESSION["Avocado_Shake"] = 0;
            $_SESSION["Berry_Shake"] = 0;
            $_SESSION["Lemonade_Shake"] = 0;
            $_SESSION["Mango_Shake"] = 0;
            $_SESSION["Pineapple_Shake"] = 0;
            $_SESSION["Strawberry_Shake"] = 0;
            $_SESSION["quantity"] = 0;
            $_SESSION['total_amount'] = 0;
            $_SESSION["menu"] = array();

            $errRequiredFields = "";
        } else {
            if(empty($firstname)) $errFirstname = "Firstname is required!";
            if(empty($lastname)) $errLastname = "Lastname is required!";
            if(empty($street_address)) $errStreetAddress = "Street address is required!";
            if(empty($city)) $errCity = "City is required!";
            if(empty($barangay)) $errBarangay = "Barangay is required!";
            if(empty($quantity)) $errEmptyCart = "Your cart is empty!";
            $errRequiredFields = "Fill in all required fields!";
        }
    }

    if(isset($_POST["save_changes"])) {
        $_SESSION["featured-product-1"] = $_POST["featured-product-1"];
        $_SESSION["featured-product-2"] = $_POST["featured-product-2"];
        $_SESSION["featured-product-3"] = $_POST["featured-product-3"];
        $_SESSION["Spicy Lamb Burger"] = $_POST["Spicy_Lamb_Burger"];
        $_SESSION["Surf_n_Turf_Burger"] = $_POST["Surf_n_Turf_Burger"];
        $_SESSION["Peppercorn_Burger"] = $_POST["Peppercorn_Burger"];
        $_SESSION["Vegan_Burger"] = $_POST["Vegan_Burger"];
        $_SESSION["Blackjack_Burger"] = $_POST["Blackjack_Burger"];
        $_SESSION["American_Classic_Burger"] = $_POST["American_Classic_Burger"];
        $_SESSION["Supreme_Pizza"] = $_POST["Supreme_Pizza"];
        $_SESSION["Bacon_Chilli_Pizza"] = $_POST["Bacon_Chilli_Pizza"];
        $_SESSION["BBQ_Chicken_Pizza"] = $_POST["BBQ_Chicken_Pizza"];
        $_SESSION["Creole_Shrimp_Pizza"] = $_POST["Creole_Shrimp_Pizza"];
        $_SESSION["Cheese_Pizza"] = $_POST["Cheese_Pizza"];
        $_SESSION["Hawaiian_Pizza"] = $_POST["Hawaiian_Pizza"];
        $_SESSION["Barbeque_Fries"] = $_POST["Barbeque_Fries"];
        $_SESSION["Cheddar_Cheese_Fries"] = $_POST["Cheddar_Cheese_Fries"];
        $_SESSION["Chili_Barbeque_Fries"] = $_POST["Chili_Barbeque_Fries"];
        $_SESSION["Salted_Fries"] = $_POST["Salted_Fries"];
        $_SESSION["Sour_Cream_Fries"] = $_POST["Sour_Cream_Fries"];
        $_SESSION["Wasabi_Fries"] = $_POST["Wasabi_Fries"];
        $_SESSION["Avocado_Shake"] = $_POST["Avocado_Shake"];
        $_SESSION["Berry_Shake"] = $_POST["Berry_Shake"];
        $_SESSION["Lemonade_Shake"] = $_POST["Lemonade_Shake"];
        $_SESSION["Mango_Shake"] = $_POST["Mango_Shake"];
        $_SESSION["Pineapple_Shake"] = $_POST["Pineapple_Shake"];
        $_SESSION["Strawberry_Shake"] = $_POST["Strawberry_Shake"];
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

        $_SESSION["quantity"] = 0;

        foreach($_SESSION["menu"] as $key => $value) {
            $_SESSION["quantity"] += intval($value[0]);
        }
        
        $_SESSION["total_amount"];
    }

    $quantity = $_SESSION["quantity"];
    $_SESSION['total_amount'] = 10;
?>