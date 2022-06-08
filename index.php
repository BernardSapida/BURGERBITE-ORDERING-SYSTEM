<?php
    session_start();
    
    error_reporting(E_ERROR | E_PARSE);

    if($_SESSION["type"] == "admin") header("Location: admin_dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="image" content="images/website-image.jpg">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
    <meta property="og:title" content="Burgerhub Restaurant | Home">
    <meta property="og:url" content="https://burgerhub.x10.mx/index.php">
    <meta property="og:image" content="images/website-image.jpg">
    <?php
        if(empty($_SESSION["email"])) echo '<link rel="stylesheet" href="css/header.css">'; 
        if($_SESSION["type"] == "client") echo '<link rel="stylesheet" href="css/client_header.css">'; 
    ?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  	<link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Index Page -->
    <main>
        <!-- BurgerHub Landing Page -->
        <section class="section_landing-page">
            <div class="container_landing-page">
                <div class="container_giant-burger">
                    <img src="images/home/landing-page-burger.png" alt="">
                    <div class="burger-shadow"></div>
                </div>
                <div class="container_description">
                    <div class="line"></div>
                    <h1 class="tagline">RAIN OR SHINE<br>IT'S TIME TO DINE</h1>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Magna sit amet purus gravida.</p>
                    <p class="discount">50% OFF</p>
                    <div class="container_contact-info">
                        <div class="accounts">
                            <ul>
                                <li><a href="https://www.facebook.com/wuzzupZo/" aria-label="Redirect to Bernard Sapida facebook account"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="https://www.facebook.com/wuzzupZo/" aria-label="Redirect to Bernard Sapida facebook account"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/wuzzupZo/" aria-label="Redirect to Bernard Sapida facebook account"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/wuzzupZo/" aria-label="Redirect to Bernard Sapida facebook account"><i class="fa-solid fa-at"></i></a></li>
                            </ul>
                        </div>
                        <div class="tel-number">
                            <p>1234-567-8910</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BurgerHub Top Burgers -->
        <section class="section_top-seller-burger">
            <div class="container_top-burger">
                <div class="top-burger">
                    <img src="images/menu/Surf_n_Turf_Burger.png" alt="burger">
                    <h1>Surf 'n Turf Burger</h1>
                    <p>Ground beef, shrimp, breadcrumbs, swiss cheese, mayonnaise, and mustard.</p>
                </div>
                <div class="top-burger">
                    <img src="images/menu/Spicy_Lamb_Burger.png" alt="burger">
                    <h1>Spicy Lamb Burger</h1>
                    <p>Lamb, fresh chilli, lettuce, carrot, red onion, and feta cheese.</p>
                </div>
                <div class="top-burger">
                    <img src="images/menu/Vegan_Burger.png" alt="burger">
                    <h1>Vegan Burger</h1>
                    <p>Onion, celery, parsley leaves, chickpeas, tomato, lettuce, and garam masala.</p>
                </div>
                <div class="top-burger">
                    <img src="images/menu/Blackjack_Burger.png" alt="burger">
                    <h1>Blackjack Burger</h1>
                    <p>Ground beef, dry onion soup mix, chilli sauce, jack cheese, green bell, and black pepper.</p>
                </div>
            </div>
        </section>

        <!-- BurgerHub Burger Layer -->
        <section class="section_burger-layer">
            <div class="container_burger-layers">
                <div class="container_burger-image">
                    <img src="images/home/burger-layers.png" alt="burger layers">
                </div>
                <div class="container_burger-contents">
                    <h1 class="burger-name">American Classic Burger</h1>
                    <p class="burger-description">Beef, tomato, lettuce, red onion, pickles, mayonnaise, and ketchup.</p>
                    <p class="price">Php 199.00</p>
                    <button type="button" class="redirect-menu">ORDER NOW</button>
                </div>
            </div>
        </section>

        <!-- BurgerHub Menu Types -->
        <section class="section_menu-types">
            <div class="container_menu-types">
                <div class="container_menu">
                    <img src="images/home/home-fruit-shakes.jpg" alt="Fruit Shake">
                    <div class="menu-description">
                        <h1>Fruit Shakes</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Php 149</p>
                        <button>ORDER NOW</button>
                    </div>
                </div>
                <div class="container_menu">
                    <img src="images/home/home-hambuger.jpg" alt="Hamburger">
                    <div class="menu-description">
                        <h1>BURGER</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Php 149</p>
                        <button>ORDER NOW</button>
                    </div>
                </div>
                <div class="container_menu">
                    <img src="images/home/home-pizza.jpg" alt="Pizza">
                    <div class="menu-description">
                        <h1>PIZZA</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Php 149</p>
                        <button>ORDER NOW</button>
                    </div>
                </div>
                <div class="container_menu">
                    <img src="images/home/home-fries.jpg" alt="Fries">
                    <div class="menu-description">
                        <h1>FRIES</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Php 149</p>
                        <button>ORDER NOW</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- BurgerHub Menu Types -->
        <section class="section_profiles">
            <div class="container_profiles">
                <div class="container-sphere">
                    <div class="image_centered">
                        <img src="images/profiles/Profile.png" alt="">
                    </div>
                    <div class="image_circumference">
                        <img src="images/profiles/Mojica.jpg" alt="">
                    </div>
                    <div class="image_circumference">
                        <img src="images/profiles/Mojica.jpg" alt="">
                    </div>
                    <div class="image_circumference">
                        <img src="images/profiles/Mojica.jpg" alt="">
                    </div>
                </div>
                <div class="container_profile-quotes">
                    <p class="favicon-quote"><i class="fa-solid fa-quote-right"></i></p>
                    <p class="our-quote" id="quote">Individual commitment to a team effort that is what makes a team work, a company work, a society work, and a civilization work.</p>
                    <h1 class="our-name" >
                        <span id="name">Bernard V. Sapida</span>
                        <img src="images/signature/Signature_Sapida.png" id="signature" alt="Signature">
                    </h1>
                    <p class="our-position" id="position">Chief Executive Officer</p>
                </div>
            </div>
        </section>

        <!-- BurgerHub Menu Types -->
        <section class="section_download-menu">
            <div class="container_download-menu">
                <h1 class="title">DOWNLOAD OUR MENU</h1>
                <button type="button">DOWNLOAD MENU</button>
            </div>
        </section>
    </main>

    <?php include_once 'global_footer.php' ?>
    <script src="js/index.js"></script>
</body>
</html>