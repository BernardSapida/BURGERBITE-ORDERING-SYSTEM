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
    <meta name="author" content="Mark Jigger Masacupan">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
    <link rel="icon" type="image/any-icon" href="images/Burgershot.ico">
  	<meta property="og:title" content="Burger Shot Restaurant | About Us">
    <meta property="og:url" content="https://Burgershot.x10.mx/about.php">
    <meta property="og:image" content="images/image-card.jpg">
    <?php
        if(empty($_SESSION["email"])) echo '<link rel="stylesheet" href="css/header.css">'; 
        if($_SESSION["type"] == "client") echo '<link rel="stylesheet" href="css/client_header.css">'; 
    ?>
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Burger Shot</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- Burger Shot Index Page -->
    <main>
        <!-- Burger Shot About -->
        <section class="section_about-story">
            <div class="container_story">
                <div class="container_story-description">
                    <h1>About Our Story</h1>
                    <p>In 2022, a student from Laguna State Polytechnic University decided to project a business that will help his financial so that he setup a restaurant operationally, and named it as “Burger Shot” which originally came from the idea in the video game of Grand Theft Auto: V that enables customer to eat in satisfactory way and offers a friendly-way order.</p>
                    <button class="redirect-menu" type="button">VIEW FULL MENU</button>
                </div>
                <div class="container_story-image">
                    <img src="images/about/about-story.jpg" alt="Burger Shot Story Image">
                </div>
            </div>
        </section>

        <!-- Burger Shot Mission/Vision/Values -->
        <section class="section_mvv">
            <h1>Our Mission, Vision, and Values</h1>
            <div class="container_values">
                <div class="container_values-image">
                    <img src="images/about/about-values.jpg" alt="Burger Shot Values Image">
                </div>
                <div class="container_values-description">
                    <h1>Mission</h1>
                    <p>To provide the highest quality product at the lowest possible price, while becoming a real part of every neighbourhood in which we open.</p>
                </div>
            </div>
            <hr>
            <div class="container_mission">
                <div class="container_mission-image">
                    <img src="images/about/about-mission.jpg" alt="Burger Shot Mission Image">
                </div>
                <div class="container_mission-description">
                    <h1>Vision</h1>
                    <p>To serve high quality products and extraordinary dining experience without compromising the taste and reasonable pricing while working toward the greater good for our employees, community and environment.</p>
                </div>
            </div>
            <hr>
            <div class="container_vision">
                <div class="container_vision-image">
                    <img src="images/about/about-vision.jpg" alt="Burger Shot Vision Image">
                </div>
                <div class="container_vision-description">
                    <h1>Values</h1>
                    <p>Burger Shot is dedicated to providing a quality workplace for all employees. This implies treating people with dignity and respect, demonstrating trust, maintaining an inclusive workplace that values diversity, growth and teamwork, ensuring a productive environment which is free from discrimination and harassment, and providing a safe environment.</p>
                </div>
            </div>
        </section>

        <!-- Burger Shot Products and Services -->
        <section class="section_products-services">
            <h1>Our Products and Services</h1>
            <div class="container_products">
                <div class="container_products-image">
                    <img src="images/about/about-product.jpg" alt="Burger Shot Products Image">
                </div>
                <div class="container_products-description">
                    <h1>Our Products and Services</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.</p>
                </div>
            </div>
            <hr>
            <div class="container_restaurant-delivery">
                <div class="container_restaurant-delivery-image">
                    <img src="images/about/about-restaurant.jpg" alt="Burger Shot Restaurant Delivery Image">
                </div>
                <div class="container_restaurant-delivery-description">
                    <h1>24/7 Restaurant and Delivery Service</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.</p>
                </div>
            </div>
            <hr>
            <div class="container_quality-service">
                <div class="container_quality-service-image">
                    <img src="images/about/about-quality.jpg" alt="Burger Shot Quality Service Image">
                </div>
                <div class="container_quality-service-description">
                    <h1>Quality Service and Cleanliness</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.</p>
                </div>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
    <script src="js/about.js"></script>
</body>
</html>