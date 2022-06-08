<?php
    session_start();

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "client") header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burgerhub Restaurant | Admin">
    <meta property="og:url" content="https://burgerhub.x10.mx/admin_view-details.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/client_header.css">
    <link rel="stylesheet" href="css/client_cart.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Cart -->
    <main>
        <!-- BurgerHub Cart Users -->
        <section class="section_cart-acc">
            <h1>Order Details</h1>
            <div class="container_cart-acc">
                <div class="container_cart-form">
                    <div class="container_form-header">
                        <h1>LOGIN</h1>
                        <div class="container_user-info">
                            <p class="user-name">Bernard Sapida</p>
                            <p class="user-contact">+63 947-212-6029</p>
                        </div>
                    </div>
                    <div class="container_form">
                        <h1>Personal Information</h1>
                        <form action="" method="POST">
                            <div class="container_fullname">
                                <label for="client_firstname">
                                    <p>First Name</p>
                                    <input type="text" name="client_firstname" id="client_firstname" value="Bernard" disabled>
                                </label>
                                <label for="client_lastname">
                                    <p>Last Name</p>
                                    <input type="text" name="client_lastname" id="client_lastname" value="Sapida" disabled>
                                </label>
                            </div>
                            <label for="client_address">
                                <p>Street Address</p>
                                <input type="text" name="client_address" id="client_address" value="B12 L24 Phase-C The Istana Subdivision" disabled>
                            </label>
                            <div class="container_city-country">
                                <label for="client_city">
                                    <p>City</p>
                                    <input type="text" name="client_city" id="client_city" value="Imus" disabled>
                                </label>
                                <label for="client_country">
                                    <p>Barangay</p>
                                    <input type="text" name="client_country" id="client_country" value="Malagasang 1-F" disabled>
                                </label>
                            </div>
                            <div class="container_orderNumber-trackingNumber">
                                <label for="client_orderNumber">
                                    <p>Order No</p>
                                    <input type="text" name="client_orderNumber" id="client_orderNumber" value="1954874974" disabled>
                                </label>
                                <label for="client_trackingNumber">
                                    <p>Tracking Number</p>
                                    <input type="text" name="client_trackingNumber" id="client_trackingNumber" value="AN2AS9DAF212SA" disabled>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container_cart">
                    <div class="container_cart-header">
                        <h1>Your Order</h1>
                    </div>
                    <hr>
                    <div class="container_cart-items">
                        <div class="container_items-added">
                            <div class="container_items-image">
                                <img src="images/menu/drinks/Drinks_Avocado.png" alt="burger">
                            </div>
                            <div class="container_items-description">
                                <h1 class="item-name">Burger Name</h1>
                                <p class="item-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quasi!</p>
                                <p class="item-price">₱381.00 <span class="item-quantity">x 02</span></p>
                            </div>
                        </div>
                        <div class="container_items-added">
                            <div class="container_items-image">
                                <img src="images/menu/pizza/pizza_1.png" alt="burger">
                            </div>
                            <div class="container_items-description">
                                <h1 class="item-name">Burger Name</h1>
                                <p class="item-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quasi!</p>
                                <p class="item-price">₱381.00 <span class="item-quantity">x 02</span></p>
                            </div>
                        </div>
                        <div class="container_items-added">
                            <div class="container_items-image">
                                <img src="images/menu/burger/burger_1.png" alt="burger">
                            </div>
                            <div class="container_items-description">
                                <h1 class="item-name">Burger Name</h1>
                                <p class="item-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quasi!</p>
                                <p class="item-price">₱381.00 <span class="item-quantity">x 02</span></p>
                            </div>
                        </div>
                        <div class="container_items-added">
                            <div class="container_items-image">
                                <img src="images/menu/burger/burger_1.png" alt="burger">
                            </div>
                            <div class="container_items-description">
                                <h1 class="item-name">Burger Name</h1>
                                <p class="item-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quasi!</p>
                                <p class="item-price">₱381.00 <span class="item-quantity">x 02</span></p>
                            </div>
                        </div>
                        <div class="container_items-added">
                            <div class="container_items-image">
                                <img src="images/menu/burger/burger_1.png" alt="burger">
                            </div>
                            <div class="container_items-description">
                                <h1 class="item-name">Burger Name</h1>
                                <p class="item-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quasi!</p>
                                <p class="item-price">₱381.00 <span class="item-quantity">x 02</span></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container_delivery-discount">
                        <div class="container_delivery">
                            <p class="title-delivery">Delivery</p>
                            <p class="delivery-fee">₱50 <span>Food Panda</span></p>
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
                            <p class="total-amount">₱1,564</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
</body>
</html>