<?php 
	include_once "includes/order_submission.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burgerhub Restaurant | Client">
    <meta property="og:url" content="https://burgerhub.x10.mx/client_cart.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/client_header.css">
    <link rel="stylesheet" href="css/client_cart.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php 
        include_once 'header.php';
    ?>

    <!-- BurgerHub Cart -->
    <main>
        <!-- BurgerHub Cart Users -->
        <section class="section_cart-acc">
            <h1>Order Cart</h1>
            <?php 
                if($errEmptyCart) echo "<div class='error_empty-cart'><p>$errEmptyCart</p></div>";
                else if($errRequiredFields) echo "<div class='error_empty-cart'><p>$errRequiredFields</p></div>";
            ?>
            <div class="container_cart-acc">
                <div class="container_cart-form">
                    <div class="container_form-header">
                        <h1>LOGIN</h1>
                        <div class="container_user-info">
                            <p class="user-name"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></p>
                            <p class="user-contact">+63 <?php echo isset($_SESSION["mobile"]) ? $_SESSION["mobile"] : "No Phone Number" ?></p>
                        </div>
                    </div>
                    <div class="container_form">
                        <h1>Personal Information</h1>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="container_fullname">
                                <label for="client_firstname">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="client_firstname" id="client_firstname" placeholder="Enter your first name" value="<?php echo !empty($_SESSION["firstname"]) ? $_SESSION["firstname"] : ""; ?>" autocomplete="given-name">
                                    <p class="err_message"><?php echo $errFirstname ?></p>
                                </label>
                                <label for="client_lastname">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="client_lastname" id="client_lastname" placeholder="Enter your last name" value="<?php echo !empty($_SESSION["lastname"]) ? $_SESSION["lastname"] : ""; ?>" autocomplete="family-name">
                                    <p class="err_message"><?php echo $errLastname ?></p>
                                </label>
                            </div>
                            <label for="client_address">
                                <p>Street Address <span>*</span></p>
                                <input type="text" name="client_address" id="client_address" placeholder="Enter your address" autocomplete="street-address" value="<?php echo !empty($_SESSION["street-address"]) ? $_SESSION["street-address"] : (isset($_POST["client_address"]) ? $street_address : ""); ?>">
                                <p class="err_message"><?php echo $errStreetAddress ?></p>
                            </label>
                            <div class="container_city-country">
                                <label for="client_city">
                                    <p>City <span>*</span></p>
                                    <input type="text" name="client_city" id="client_city" placeholder="Enter your city" autocomplete="address-line1" value="<?php echo !empty($_SESSION["city"]) ? $_SESSION["city"] : (isset($_POST["client_city"]) ? $city : ""); ?>">
                                    <p class="err_message"><?php echo $errCity ?></p>
                                </label>
                                <label for="client_barangay">
                                    <p>Barangay <span>*</span></p>
                                    <input type="text" name="client_barangay" id="client_barangay" placeholder="Enter your barangay" autocomplete="address-line2" value="<?php echo !empty($_SESSION["barangay"]) ? $_SESSION["barangay"] : (isset($_POST["client_barangay"]) ? $barangay : ""); ?>">
                                    <p class="err_message"><?php echo $errBarangay ?></p>
                                </label>
                            </div>
                            <div class="container_cart-btn">
                                <button type="button">Cancel</button>
                                <button type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container_cart">
                    <div class="container_cart-header">
                        <h1>Your Order</h1>
                        <p class="edit" id="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</p>
                    </div>
                    <hr>
                    <div class="container_cart-items">
                    <?php
                        if(!empty($_SESSION['quantity'])) {
                            foreach($_SESSION["menu"] as $key => $value) {
                                if($value[0] != 0) {
                                    echo '<div class="container_items-added">
                                        <div class="container_items-image">
                                            <img src="images/menu/'.$key.'.png" alt="burger">
                                        </div>
                                        <div class="container_items-description">
                                            <h1 class="item-name">'.join(" ", explode(" ", $key)).'</h1>
                                            <p class="item-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quasi!</p>
                                            <p class="item-price">₱ '.$value[1].'.00 <span class="item-quantity">x '.$value[0].'</span></p>
                                        </div>
                                    </div>';

                                    $quantity++;
                                    $_SESSION['total_amount'] += (intval($value[0]) * intval($value[1]));
                                }
                            }
                        } else {
                            echo '<div class="container_cart-empty">
                                <p><i class="fa-solid fa-cart-arrow-down"></i></p>
                                <h1>Your cart is empty</h1>
                            </div>';
                        }                 
                    ?>
                    </div>
                    <hr>
                    <div class="container_delivery-discount">
                        <div class="container_delivery">
                            <p class="title-delivery">Delivery</p>
                            <p class="delivery-fee"><span>(Food Panda)</span> ₱50 </p>
                        </div>
                        <div class="container_discount">
                            <p class="title-discount">Discount</p>
                            <p class="discount">-₱40</p>
                        </div>
                    </div>
                    <hr>
                    <div class="container_total-amount">
                        <div class="container_total">
                            <p class="title-total">Total:</p>
                            <p class="total-amount">₱ <?php echo (empty(number_format($_SESSION['total_amount'])) || number_format($_SESSION['total_amount']) == 10) ? 0 : number_format($_SESSION['total_amount']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
            if($order_success) echo '<section class="section_modal-order-success">
                    <div class="container_modal-order-success">
                        <div class="animation-ctn">
                            <div class="icon icon--order-success svg">
                                <svg width="80px" height="80px">  
                                    <g fill="none" stroke="#22AE73" stroke-width="5"> 
                                    <circle cx="40" cy="40" r="36"></circle>
                                    <circle id="colored" fill="#22AE73" cx="40" cy="40" r="36"></circle>
                                    <polyline class="st0" stroke="#fff" stroke-width="15" points="48.5, 87.8 67.7, 107.9 112.2, 52.4"/>   
                                    </g> 
                                </svg>
                            </div>
                        </div>
                        <h1>Order successfully placed</h1>
                        <p>You can check the status of your order in navigation.</p>
                        <p>Transaction ID: '.$orderNo.'</p>
                        <button type="button" aria-label="Order successfully placed" id="btn_success">Okay</button>
                    </div>
                </section>';
        ?>

        <section class="section_modify-cart">
            <div class="container_table">
                <table>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <caption>Client Orders</caption>
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity +/-</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(empty($quantity)) {
                                    echo '<tr class="empty-cart">
                                            <td colspan="4">Your cart is empty.</td>
                                        </tr>';
                                }
                                
                                if(!empty($_SESSION["menu"]["featured-product-1"][0])) {
                                    echo '<tr>
                                            <td>Featured Product 1</td>
                                            <td>
                                                <label for="featured-product-1">
                                                    <button type="button" id="featured-product-1-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="featured-product-1" id="featured-product-1" value="' . $_SESSION["menu"]["featured-product-1"][0] . '">
                                                    </p>
                                                    <button type="button" id="featured-product-1-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["featured-product-1"][0]) * $_SESSION["menu"]["featured-product-1"][1]) . '.00</td>
                                        </tr>';
                                }
                                
                                if(!empty($_SESSION["menu"]["featured-product-2"][0])) {
                                    echo '<tr>
                                            <td>Featured Product 2</td>
                                            <td>
                                                <label for="featured-product-2">
                                                    <button type="button" id="featured-product-2-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="featured-product-2" id="featured-product-2" value="' . $_SESSION["menu"]["featured-product-2"][0] . '">
                                                    </p>
                                                    <button type="button" id="featured-product-2-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["featured-product-2"][0]) * $_SESSION["menu"]["featured-product-2"][1]) . '.00</td>
                                        </tr>';
                                }
                                
                                if(!empty($_SESSION["menu"]["featured-product-3"][0])) {
                                    echo '<tr>
                                            <td>Featured Product 3</td>
                                            <td>
                                                <label for="featured-product-3">
                                                    <button type="button" id="featured-product-3-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="featured-product-3" id="featured-product-3" value="' . $_SESSION["menu"]["featured-product-3"][0] . '">
                                                    </p>
                                                    <button type="button" id="featured-product-3-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["featured-product-3"][0]) * $_SESSION["menu"]["featured-product-3"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Spicy_Lamb_Burger"][0])) {
                                    echo '<tr>
                                            <td>Spicy Lamb Burger</td>
                                            <td>
                                                <label for="burger-1">
                                                    <button type="button" id="burger-1-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Spicy_Lamb_Burger" id="burger-1" value="' . $_SESSION["menu"]["Spicy_Lamb_Burger"][0] . '">
                                                    </p>
                                                    <button type="button" id="burger-1-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Spicy_Lamb_Burger"][0]) * $_SESSION["menu"]["Spicy_Lamb_Burger"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Surf_n_Turf_Burger"][0])) {
                                    echo '<tr>
                                            <td>Surf n Turf Burger</td>
                                            <td>
                                                <label for="burger-2">
                                                    <button type="button" id="burger-2-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Surf_n_Turf_Burger" id="burger-2" value="' . $_SESSION["menu"]["Surf_n_Turf_Burger"][0] . '">
                                                    </p>
                                                    <button type="button" id="burger-2-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Surf_n_Turf_Burger"][0]) * $_SESSION["menu"]["Surf_n_Turf_Burger"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Peppercorn_Burger"][0])) {
                                    echo '<tr>
                                            <td>Peppercorn Burger</td>
                                            <td>
                                                <label for="burger-3">
                                                    <button type="button" id="burger-3-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Peppercorn_Burger" id="burger-3" value="' . $_SESSION["menu"]["Peppercorn_Burger"][0] . '">
                                                    </p>
                                                    <button type="button" id="burger-3-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Peppercorn_Burger"][0]) * $_SESSION["menu"]["Peppercorn_Burger"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Vegan_Burger"][0])) {
                                    echo '<tr>
                                            <td>Vegan Burger</td>
                                            <td>
                                                <label for="burger-4">
                                                    <button type="button" id="burger-4-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Vegan_Burger" id="burger-4" value="' . $_SESSION["menu"]["Vegan_Burger"][0] . '">
                                                    </p>
                                                    <button type="button" id="burger-4-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Vegan_Burger"][0]) * $_SESSION["menu"]["Vegan_Burger"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Blackjack_Burger"][0])) {
                                    echo '<tr>
                                            <td>Blackjack Burger</td>
                                            <td>
                                                <label for="burger-5">
                                                    <button type="button" id="burger-5-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Blackjack_Burger" id="burger-5" value="' . $_SESSION["menu"]["Blackjack_Burger"][0] . '">
                                                    </p>
                                                    <button type="button" id="burger-5-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Blackjack_Burger"][0]) * $_SESSION["menu"]["Blackjack_Burger"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["American_Classic_Burger"][0])) {
                                    echo '<tr>
                                            <td>American Classic Burger</td>
                                            <td>
                                                <label for="burger-6">
                                                    <button type="button" id="burger-6-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="American_Classic_Burger" id="burger-6" value="' . $_SESSION["menu"]["American_Classic_Burger"][0] . '">
                                                    </p>
                                                    <button type="button" id="burger-6-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["American_Classic_Burger"][0]) * $_SESSION["menu"]["American_Classic_Burger"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Supreme_Pizza"][0])) {
                                    echo '<tr>
                                            <td>Supreme Pizza</td>
                                            <td>
                                                <label for="pizza-1">
                                                    <button type="button" id="pizza-1-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Supreme_Pizza" id="pizza-1" value="' . $_SESSION["menu"]["Supreme_Pizza"][0] . '">
                                                    </p>
                                                    <button type="button" id="pizza-1-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Supreme_Pizza"][0]) * $_SESSION["menu"]["Supreme_Pizza"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Bacon_Chilli_Pizza"][0])) {
                                    echo '<tr>
                                            <td>Bacon Chilli Pizza</td>
                                            <td>
                                                <label for="pizza-2">
                                                    <button type="button" id="pizza-2-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Bacon_Chilli_Pizza" id="pizza-2" value="' . $_SESSION["menu"]["Bacon_Chilli_Pizza"][0] . '">
                                                    </p>
                                                    <button type="button" id="pizza-2-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Bacon_Chilli_Pizza"][0]) * $_SESSION["menu"]["Bacon_Chilli_Pizza"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["BBQ_Chicken_Pizza"][0])) {
                                    echo '<tr>
                                            <td>BBQ Chicken Pizza</td>
                                            <td>
                                                <label for="pizza-3">
                                                    <button type="button" id="pizza-3-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="BBQ_Chicken_Pizza" id="pizza-3" value="' . $_SESSION["menu"]["BBQ_Chicken_Pizza"][0] . '">
                                                    </p>
                                                    <button type="button" id="pizza-3-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["BBQ_Chicken_Pizza"][0]) * $_SESSION["menu"]["BBQ_Chicken_Pizza"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Creole_Shrimp_Pizza"][0])) {
                                    echo '<tr>
                                            <td>Creole Shrimp Pizza</td>
                                            <td>
                                                <label for="pizza-4">
                                                    <button type="button" id="pizza-4-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Creole_Shrimp_Pizza" id="pizza-4" value="' . $_SESSION["menu"]["Creole_Shrimp_Pizza"][0] . '">
                                                    </p>
                                                    <button type="button" id="pizza-4-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Creole_Shrimp_Pizza"][0]) * $_SESSION["menu"]["Creole_Shrimp_Pizza"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Cheese_Pizza"][0])) {
                                    echo '<tr>
                                            <td>Cheese Pizza</td>
                                            <td>
                                                <label for="pizza-5">
                                                    <button type="button" id="pizza-5-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Cheese_Pizza" id="pizza-5" value="' . $_SESSION["menu"]["Cheese_Pizza"][0] . '">
                                                    </p>
                                                    <button type="button" id="pizza-5-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Cheese_Pizza"][0]) * $_SESSION["menu"]["Cheese_Pizza"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Hawaiian_Pizza"][0])) {
                                    echo '<tr>
                                            <td>Hawaiian Pizza</td>
                                            <td>
                                                <label for="pizza-6">
                                                    <button type="button" id="pizza-6-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Hawaiian_Pizza" id="pizza-6" value="' . $_SESSION["menu"]["Hawaiian_Pizza"][0] . '">
                                                    </p>
                                                    <button type="button" id="pizza-6-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Hawaiian_Pizza"][0]) * $_SESSION["menu"]["Hawaiian_Pizza"][1]) . '.00</td>
                                        </tr>';
                                }
                            
                                if(!empty($_SESSION["menu"]["Barbeque_Fries"][0])) {
                                    echo '<tr>
                                            <td>Barbeque Fries</td>
                                            <td>
                                                <label for="fries-1">
                                                    <button type="button" id="fries-1-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Barbeque_Fries" id="fries-1" value="' . $_SESSION["menu"]["Barbeque_Fries"][0] . '">
                                                    </p>
                                                    <button type="button" id="fries-1-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Barbeque_Fries"][0]) * $_SESSION["menu"]["Barbeque_Fries"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Cheddar_Cheese_Fries"][0])) {
                                    echo '<tr>
                                            <td>Cheddar Cheese Fries</td>
                                            <td>
                                                <label for="fries-2">
                                                    <button type="button" id="fries-2-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Cheddar_Cheese_Fries" id="fries-2" value="' . $_SESSION["menu"]["Cheddar_Cheese_Fries"][0] . '">
                                                    </p>
                                                    <button type="button" id="fries-2-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Cheddar_Cheese_Fries"][0]) * $_SESSION["menu"]["Cheddar_Cheese_Fries"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Chili_Barbeque_Fries"][0])) {
                                    echo '<tr>
                                            <td>Chili Barbeque Fries</td>
                                            <td>
                                                <label for="fries-3">
                                                    <button type="button" id="fries-3-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Chili_Barbeque_Fries" id="fries-3" value="' . $_SESSION["menu"]["Chili_Barbeque_Fries"][0] . '">
                                                    </p>
                                                    <button type="button" id="fries-3-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Chili_Barbeque_Fries"][0]) * $_SESSION["menu"]["Chili_Barbeque_Fries"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Salted_Fries"][0])) {
                                    echo '<tr>
                                            <td>Salted Fries</td>
                                            <td>
                                                <label for="fries-4">
                                                    <button type="button" id="fries-4-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Salted_Fries" id="fries-4" value="' . $_SESSION["menu"]["Salted_Fries"][0] . '">
                                                    </p>
                                                    <button type="button" id="fries-4-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Salted_Fries"][0]) * $_SESSION["menu"]["Salted_Fries"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Sour_Cream_Fries"][0])) {
                                    echo '<tr>
                                            <td>Sour Cream Fries</td>
                                            <td>
                                                <label for="fries-5">
                                                    <button type="button" id="fries-5-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Sour_Cream_Fries" id="fries-5" value="' . $_SESSION["menu"]["Sour_Cream_Fries"][0] . '">
                                                    </p>
                                                    <button type="button" id="fries-5-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Sour_Cream_Fries"][1]) * $_SESSION["menu"]["Sour_Cream_Fries"][0]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Wasabi_Fries"][0])) {
                                    echo '<tr>
                                            <td>Wasabi Fries</td>
                                            <td>
                                                <label for="fries-6">
                                                    <button type="button" id="fries-6-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Wasabi_Fries" id="fries-6" value="' . $_SESSION["menu"]["Wasabi_Fries"][0] . '">
                                                    </p>
                                                    <button type="button" id="fries-6-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Wasabi_Fries"][0]) * $_SESSION["menu"]["Wasabi_Fries"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Avocado_Shake"][0])) {
                                    echo '<tr>
                                            <td>Avocado Shake</td>
                                            <td>
                                                <label for="drinks-1">
                                                    <button type="button" id="drinks-1-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Avocado_Shake" id="drinks-1" value="' . $_SESSION["menu"]["Avocado_Shake"][0] . '">
                                                    </p>
                                                    <button type="button" id="drinks-1-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Avocado_Shake"][0]) * $_SESSION["menu"]["Avocado_Shake"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Berry_Shake"][0])) {
                                    echo '<tr>
                                            <td>Berry Shake</td>
                                            <td>
                                                <label for="drinks-2">
                                                    <button type="button" id="drinks-2-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Berry_Shake" id="drinks-2" value="' . $_SESSION["menu"]["Berry_Shake"][0] . '">
                                                    </p>
                                                    <button type="button" id="drinks-2-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Berry_Shake"][0]) * $_SESSION["menu"]["Berry_Shake"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Lemonade_Shake"][0])) {
                                    echo '<tr>
                                            <td>Lemonade Shake</td>
                                            <td>
                                                <label for="drinks-3">
                                                    <button type="button" id="drinks-3-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Lemonade_Shake" id="drinks-3" value="' . $_SESSION["menu"]["Lemonade_Shake"][0] . '">
                                                    </p>
                                                    <button type="button" id="drinks-3-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Lemonade_Shake"][0]) * $_SESSION["menu"]["Lemonade_Shake"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Mango_Shake"][0])) {
                                    echo '<tr>
                                            <td>Mango Shake</td>
                                            <td>
                                                <label for="drinks-4">
                                                    <button type="button" id="drinks-4-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Mango_Shake" id="drinks-4" value="' . $_SESSION["menu"]["Mango_Shake"][0] . '">
                                                    </p>
                                                    <button type="button" id="drinks-4-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Mango_Shake"][0]) * $_SESSION["menu"]["Mango_Shake"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Pineapple_Shake"][0])) {
                                    echo '<tr>
                                            <td>Pineapple Shake</td>
                                            <td>
                                                <label for="drinks-5">
                                                    <button type="button" id="drinks-5-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Pineapple_Shake" id="drinks-5" value="' . $_SESSION["menu"]["Pineapple_Shake"][0] . '">
                                                    </p>
                                                    <button type="button" id="drinks-5-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Pineapple_Shake"][0]) * $_SESSION["menu"]["Pineapple_Shake"][1]) . '.00</td>
                                        </tr>';
                                }

                                if(!empty($_SESSION["menu"]["Strawberry_Shake"][0])) {
                                    echo '<tr>
                                            <td>Strawberry Shake</td>
                                            <td>
                                                <label for="drinks-6">
                                                    <button type="button" id="drinks-6-minus-btn" aria-label="Decrement quantity"><i class="fa-solid fa-minus"></i></button>
                                                    <p class="order-quantity">
                                                        <input type="number" name="Strawberry_Shake" id="drinks-6" value="' . $_SESSION["menu"]["Strawberry_Shake"][0] . '">
                                                    </p>
                                                    <button type="button" id="drinks-6-plus-btn" aria-label="Increment quantity" aria-label="Increment quantity"><i class="fa-solid fa-plus"></i></button>
                                                </label>
                                            </td>
                                            <td>₱ ' . number_format(intval($_SESSION["menu"]["Strawberry_Shake"][0]) * $_SESSION["menu"]["Strawberry_Shake"][1]) . '.00</td>
                                        </tr>';
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"><button type="submit" name="save_changes" id="save_changes" aria-label="Save Changes">Save Changes</button></td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </section>
    </main>

    <?php include_once 'global_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/client-cart.js"></script>
</body>
</html>