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
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
  	<meta property="og:title" content="Burgerhub Restaurant | About Us">
    <meta property="og:url" content="https://burgerhub.x10.mx/about.php">
    <meta property="og:image" content="images/image-card.jpg">
    <?php
        if(empty($_SESSION["email"])) echo '<link rel="stylesheet" href="css/header.css">'; 
        if($_SESSION["type"] == "client") echo '<link rel="stylesheet" href="css/client_header.css">'; 
    ?>
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Index Page -->
    <main>
        <!-- BurgerHub About -->
        <section class="section_about-story">
            <div class="container_story">
                <div class="container_story-description">
                    <h1>About Our Story</h1>
                    <p>In 2021, a four freshmen college students named Bernard Sapida, Zildjian Lee Loren, Jan Marichie Mojica and John Herson Radones looked to create a restaurant idea of their own in Imus, Cavite. In the same year, they took a risk by founding their own burger restaurant and decided to name it BurgerHub. The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.</p>
                    <button class="redirect-menu" type="button">VIEW FULL MENU</button>
                </div>
                <div class="container_story-image">
                    <img src="images/about/about-story.jpg" alt="BurgerHub Story Image">
                </div>
            </div>
        </section>

        <!-- BurgerHub Mission/Vision/Values -->
        <section class="section_mvv">
            <h1>Our Mission, Vision, and Values</h1>
            <div class="container_values">
                <div class="container_values-image">
                    <img src="images/about/about-values.jpg" alt="BurgerHub Values Image">
                </div>
                <div class="container_values-description">
                    <h1>Mission</h1>
                    <p>To provide the highest quality product at the lowest possible price, while becoming a real part of every neighbourhood in which we open.</p>
                </div>
            </div>
            <hr>
            <div class="container_mission">
                <div class="container_mission-image">
                    <img src="images/about/about-mission.jpg" alt="BurgerHub Mission Image">
                </div>
                <div class="container_mission-description">
                    <h1>Vision</h1>
                    <p>To serve high quality products and extraordinary dining experience without compromising the taste and reasonable pricing while working toward the greater good for our employees, community and environment.</p>
                </div>
            </div>
            <hr>
            <div class="container_vision">
                <div class="container_vision-image">
                    <img src="images/about/about-vision.jpg" alt="BurgerHub Vision Image">
                </div>
                <div class="container_vision-description">
                    <h1>Values</h1>
                    <p>BurgerHub is dedicated to providing a quality workplace for all employees. This implies treating people with dignity and respect, demonstrating trust, maintaining an inclusive workplace that values diversity, growth and teamwork, ensuring a productive environment which is free from discrimination and harassment, and providing a safe environment.</p>
                </div>
            </div>
        </section>

        <!-- BurgerHub Products and Services -->
        <section class="section_products-services">
            <h1>Our Products and Services</h1>
            <div class="container_products">
                <div class="container_products-image">
                    <img src="images/about/about-product.jpg" alt="BurgerHub Products Image">
                </div>
                <div class="container_products-description">
                    <h1>Our Products and Services</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.</p>
                </div>
            </div>
            <hr>
            <div class="container_restaurant-delivery">
                <div class="container_restaurant-delivery-image">
                    <img src="images/about/about-restaurant.jpg" alt="BurgerHub Restaurant Delivery Image">
                </div>
                <div class="container_restaurant-delivery-description">
                    <h1>24/7 Restaurant and Delivery Service</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.</p>
                </div>
            </div>
            <hr>
            <div class="container_quality-service">
                <div class="container_quality-service-image">
                    <img src="images/about/about-quality.jpg" alt="BurgerHub Quality Service Image">
                </div>
                <div class="container_quality-service-description">
                    <h1>Quality Service and Cleanliness</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores delectus reiciendis eligendi illo odit quo aliquid quibusdam vitae et minus error eius repellat, incidunt, nostrum eaque atque impedit harum excepturi.</p>
                </div>
            </div>
        </section>

        <!-- Burgerhub Members Contribution-->
        <section class="section_members-participation" id="section_members-participation">
            <div class="container_members-participation">
                <div class="container_members-participation-header">
                    <h1>Members' Contribution</h1>
                    <hr>
                </div>
                <div class="container_members-participation-body">
                    <div class="members-1">
                        <h2 class="title">Frontend & Backend Developer: </h2>
                        <p class="names">SAPIDA, BERNARD V.</p>
                    </div>
                    <div class="members-2">
                        <h2 class="title">UI/UX Design, Contents, & Editing: </h2>
                        <p class="names">RADONES, JOHN HERSON L.</p>
                        <p class="names">MOJICA, JAN MARICHIE Z.</p>
                        <p class="names">LOREN, ZILDJIAN LEE G.</p>
                    </div>
                </div>
                <div class="container_members-participation-footer">
                    <hr>
                    <button aria-label="Okay Button" id="btn-participation">Okay</button>
                </div>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
    <script src="js/about.js"></script>
</body>
</html>