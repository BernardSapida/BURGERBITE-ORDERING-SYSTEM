<?php
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    if($_SESSION["type"] == "client") header("Location: client_menu.php");
    if($_SESSION["type"] == "admin") header("Location: admin_dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="BurgerBites Restaurant | Menu">
    <meta property="og:url" content="https://BurgerBites.x10.mx/menu.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerbites.ico">
    <link rel="stylesheet" href="css/client_header.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerBites</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerBites Menu -->
    <main>
        <!-- BurgerBites Featured Products -->
        <section class="section_featured-products">
            <h1>Best Seller</h1>
            <div class="container_featured-products">
                <div class="container_products">
                    <div class="container_image">
                        <img src="images/menu/Spicy_Lamb_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Spicy Lamb Burger</h1>
                            <p>Lamb, fresh chilli, lettuce, carrot, red onion, and feta cheese.</p>
                            <div class="container_price-order">
                                <p class="price">₱250.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
                <div class="container_products">
                    <div class="container_image">
                        <img src="images/menu/Surf_n_Turf_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Surf 'n Turf Burger</h1>
                            <p>Ground beef, shrimp, breadcrumbs, swiss cheese, mayonnaise, and mustard.</p>
                            <div class="container_price-order">
                                <p class="price">₱299.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
                <div class="container_products">
                    <div class="container_image">
                        <img src="images/menu/Peppercorn_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Peppercorm Burger</h1>
                            <p>Ground beef, barbeque sauce, yellow onions, ground peppercorn, mature cheddar cheese, tomato, pickles, and lettuce.</p>
                            <div class="container_price-order">
                                <p class="price">₱199.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <!-- BurgerBites Burgers -->
        <section class="section_burgers-menu">
            <h1>Our Burgers</h1>
            <div class="container_burgers-menu">
                <div class="container_burgers">
                    <div class="container_image">
                        <img src="images/menu/Spicy_Lamb_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Spicy Lamb Burger</h1>
                            <p>Lamb, fresh chilli, lettuce, carrot, red onion, and feta cheese.</p>
                            <div class="container_price-order">
                                <p class="price">₱250.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
                <div class="container_burgers">
                    <div class="container_image">
                        <img src="images/menu/Surf_n_Turf_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Surf 'n Turf Burger</h1>
                            <p>Ground beef, shrimp, breadcrumbs, swiss cheese, mayonnaise, and mustard.</p>
                            <div class="container_price-order">
                                <p class="price">₱299.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
                <div class="container_burgers">
                    <div class="container_image">
                        <img src="images/menu/Peppercorn_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Peppercorn Burger</h1>
                            <p>Ground beef, barbeque sauce, yellow onions, ground peppercorn, mature cheddar cheese, tomato, pickles, and lettuce.</p>
                            <div class="container_price-order">
                                <p class="price">₱199.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
                <div class="container_burgers">
                    <div class="container_image">
                        <img src="images/menu/Vegan_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                            <h1>Vegan Burger</h1>
                            <p>Onion, celery, parsley leaves, chickpeas, tomato, lettuce, and garam masala.</p>
                            <div class="container_price-order">
                                <p class="price">₱149.00</p>
                                <button class="redirect">Order Now</button>
                            </div>
                        </div>
                </div>
                <div class="container_burgers">
                    <div class="container_image">
                        <img src="images/menu/Blackjack_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                        <h1>Blackjack Burger</h1>
                        <p>Ground beef, dry onion soup mix, chilli sauce, jack cheese, green bell, and black pepper.</p>
                        <div class="container_price-order">
                            <p class="price">₱249.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_burgers">
                    <div class="container_image">
                        <img src="images/menu/American_Classic_Burger.png" alt="Burger">
                    </div>
                    <div class="container_description">
                        <h1>American Classic Burger</h1>
                        <p>Beef, tomato, lettuce, red onion, pickles, mayonnaise, and ketchup.</p>
                        <div class="container_price-order">
                            <p class="price">₱199.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BurgerBites Pizza -->
        <section class="section_pizza-menu">
            <h1>Our Pizza</h1>
            <div class="container_pizza-menu">
                <div class="container_pizza">
                    <div class="container_image">
                        <img src="images/menu/Hawaiian_Pizza.png" alt="Pizza">
                    </div>
                    <div class="container_description">
                        <h1>Hawaiian Pizza</h1>
                        <p>12 inch (Medium) and good for 3-4 people.</p>
                        <div class="container_price-order">
                            <p class="price">₱489.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_pizza">
                    <div class="container_image">
                        <img src="images/menu/Cheese_Pizza.png" alt="Pizza">
                    </div>
                    <div class="container_description">
                        <h1>Cheese Pizza</h1>
                        <p>12 inch (Medium) and good for 3-4 people.</p>
                        <div class="container_price-order">
                            <p class="price">₱489.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_pizza">
                    <div class="container_image">
                        <img src="images/menu/BBQ_Chicken_Pizza.png" alt="Pizza">
                    </div>
                    <div class="container_description">
                        <h1>BBQ Chicken Pizza</h1>
                        <p>12 inch (Medium) and good for 3-4 people.</p>
                        <div class="container_price-order">
                            <p class="price">₱489.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_pizza">
                    <div class="container_image">
                        <img src="images/menu/Supreme_Pizza.png" alt="Burger">
                    </div>
                    <div class="container_description">
                        <h1>Supreme Pizza</h1>
                        <p>12 inch (Medium) and good for 3-4 people.</p>
                        <div class="container_price-order">
                            <p class="price">₱489.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_pizza">
                    <div class="container_image">
                        <img src="images/menu/Creole_Shrimp_Pizza.png" alt="Pizza">
                    </div>
                    <div class="container_description">
                        <h1>Creole Shrimp Pizza</h1>
                        <p>12 inch (Medium) and good for 3-4 people.</p>
                        <div class="container_price-order">
                            <p class="price">₱489.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_pizza">
                    <div class="container_image">
                        <img src="images/menu/Bacon_Chilli_Pizza.png" alt="Pizza">
                    </div>
                    <div class="container_description">
                        <h1>Bacon Chili Pizza</h1>
                        <p>12 inch (Medium) and good for 3-4 people.</p>
                        <div class="container_price-order">
                            <p class="price">₱489.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BurgerBites Fries -->
        <section class="section_fries-menu">
            <h1>Our Fries</h1>
            <div class="container_fries-menu">
                <div class="container_fries">
                    <div class="container_image">
                        <img src="images/menu/Barbeque_Fries.png" alt="Fries">
                    </div>
                    <div class="container_description">
                        <h1>Barbeque Fries</h1>
                        <p>Dive into the smoky, savory goodness of our Barbecue Fries, a perfect combination of crispy and mouthwatering barbecue flavor.</p>
                        <div class="container_price-order">
                            <p class="price">₱119.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_fries">
                    <div class="container_image">
                        <img src="images/menu/Cheddar_Cheese_Fries.png" alt="Fries">
                    </div>
                    <div class="container_description">
                        <h1>Cheddar Cheese Fries</h1>
                        <p>Delight in the creamy, cheesy indulgence of our Cheddar Cheese Fries, a perfect fusion of golden fries and gooey cheddar.</p>
                        <div class="container_price-order">
                            <p class="price">₱119.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_fries">
                    <div class="container_image">
                        <img src="images/menu/Chili_Barbeque_Fries.png" alt="Fries">
                    </div>
                    <div class="container_description">
                        <h1>Chilli Barbeque Fries</h1>
                        <p>Spice up your taste buds with our Chilli Barbecue Fries, where smoky barbecue flavor meets a hint of chili heat combination.</p>
                        <div class="container_price-order">
                            <p class="price">₱119.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_fries">
                    <div class="container_image">
                        <img src="images/menu/Salted_Fries.png" alt="Fries">
                    </div>
                    <div class="container_description">
                        <h1>Salted Fries</h1>
                        <p>Savor the mouthwatering simplicity of our Salted Fries, each crispy bite delivering the perfect balance of salted goodness.</p>
                        <div class="container_price-order">
                            <p class="price">₱119.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_fries">
                    <div class="container_image">
                        <img src="images/menu/Sour_Cream_Fries.png" alt="Fries">
                    </div>
                    <div class="container_description">
                        <h1>Sour Cream Fries</h1>
                        <p>Creamy delight of our Sour Cream Fries, where the rich, tangy goodness of sour cream perfectly complements our crispy golden fries.</p>
                        <div class="container_price-order">
                            <p class="price">₱119.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_fries">
                    <div class="container_image">
                        <img src="images/menu/Wasabi_Fries.png" alt="Fries">
                    </div>
                    <div class="container_description">
                        <h1>Wasabi Fries</h1>
                        <p>Add a kick of bold and fiery flavor to your fries with our Wasabi Fries, a spicy twist on the classic that will leave your taste buds tingling.</p>
                        <div class="container_price-order">
                            <p class="price">₱119.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BurgerBites Drinks -->
        <section class="section_drinks-menu">
            <h1>Our Drinks</h1>
            <div class="container_drinks-menu">
                <div class="container_drinks">
                    <div class="container_image">
                        <img src="images/menu/Avocado_Shake.png" alt="Shake">
                    </div>
                    <div class="container_description">
                        <h1>Avocado Shake</h1>
                        <p>Indulge in the velvety richness of our Avocado Shake, a creamy and nutritious blend that's as satisfying as it is refreshing.</p>
                        <div class="container_price-order">
                            <p class="price">₱149.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_drinks">
                    <div class="container_image">
                        <img src="images/menu/Berry_Shake.png" alt="Shake">
                    </div>
                    <div class="container_description">
                        <h1>Berry Shake</h1>
                        <p>Sip on the sweet and refreshing goodness of our Berry Shake, a delightful blend of ripe to brighten your day with every taste.</p>
                        <div class="container_price-order">
                            <p class="price">₱149.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_drinks">
                    <div class="container_image">
                        <img src="images/menu/Lemonade_Shake.png" alt="Shake">
                    </div>
                    <div class="container_description">
                        <h1>Lemon Shake</h1>
                        <p>Experience a burst of zesty freshness with our Lemon Shake, a tangy and invigorating treat for a sunny day or any day.</p>
                        <div class="container_price-order">
                            <p class="price">₱149.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_drinks">
                    <div class="container_image">
                        <img src="images/menu/Mango_Shake.png" alt="Shake">
                    </div>
                    <div class="container_description">
                        <h1>Mango Shake</h1>
                        <p>Savor the tropical bliss of our Mango Shake, a luscious and velvety blend that transports your taste buds to paradise with every sip.</p>
                        <div class="container_price-order">
                            <p class="price">₱149.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_drinks">
                    <div class="container_image">
                        <img src="images/menu/Pineapple_Shake.png" alt="Shake">
                    </div>
                    <div class="container_description">
                        <h1>Pineapple Shake</h1>
                        <p>Escape to a tropical paradise with our Pineapple Shake, a sweet and tangy concoction that will whisk your taste buds away to sun-kissed shores.</p>
                        <div class="container_price-order">
                            <p class="price">₱149.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="container_drinks">
                    <div class="container_image">
                        <img src="images/menu/Strawberry_Shake.png" alt="Shake">
                    </div>
                    <div class="container_description">
                        <h1>Strawberry Shake</h1>
                        <p>Indulge in the pure sweetness of our Strawberry Shake, a creamy delight bursting with the irresistible flavor of freshly picked strawberries.</p>
                        <div class="container_price-order">
                            <p class="price">₱149.00</p>
                            <button class="redirect">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'global_footer.php' ?>
    <script src="js/menu.js"></script>
</body>
</html>