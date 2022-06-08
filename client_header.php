<!-- BurgerHub Header -->
<header class="header_burgerhub">
    <nav class="navigation_burgerhub">
        <div class="navigation_logo">
            <img src="images/logo/burger-logo.png" alt="BurgerHub Logo">
            <h1 class="restaurant-name">BurgerHub</h1>
        </div>
        <ul class="nav_links" id="nav_links">
            <li class="links"><a href="index.php">Home</a></li>
            <li class="links"><a href="about.php">About</a></li>
            <li class="links"><a href="contact-us.php">Contact</a></li>
            <li class="links"><a href="client_menu.php">Menu</a></li>
            <li class="links" id="signin"><a href="signout.php">Sign Out</a></li>
        </ul>
        <div class="navigation_right">
            <div class="navigation_profile">
                <p>Hi, <?php echo empty($_SESSION["firstname"]) ? "User" : $_SESSION["firstname"] ?></p>
                <img src="profile/<?php echo empty($_SESSION['image']) ? "default.jpg" : $_SESSION['image'] ?>" alt="Profile" id="img-profile">
                <div class="navigation_profile-dropdown">
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-user"></i></p>
                        <p class="links"><a href="client_account.php">My Account</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-cart-shopping"></i></p>
                        <p class="links"><a href="client_cart.php">My Cart</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-burger"></i></p>
                        <p class="links"><a href="client_status.php">Order Status</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-circle-info"></i></p>
                        <p class="links"><a href="">Legal Terms</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></p>
                        <p class="links"><a href="signout.php">Sign Out</a></p>
                    </div>
                </div>
            </div>
            <a href="client_cart.php"><p class="cart"><i class="fa-solid fa-cart-shopping"></i><span class="cart_orders-quantity" id="quantity"><?php echo empty($_SESSION["quantity"]) ? 0 : $_SESSION["quantity"]?></span></p></a>
            <label for="hamburger-menu" class="navigation_responsive" id="navigation_responsive">
                <input type="checkbox" id="hamburger-menu" aria-label="Hamburger Navigation">
                <div class="hamburger-menu">
                    <div class="line-top"></div>
                    <div class="line-middle"></div>
                    <div class="line-bottom"></div>
                </div>
            </label>
        </div>
    </nav>
</header>

<!-- BurgerHub Loader -->
<div class="loader_burgerhub">
    <div class="container">
        <div></div><div></div>
        <p>Loading</p>
    </div>
</div>