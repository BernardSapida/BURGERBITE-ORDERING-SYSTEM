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
            <li class="links"><a href="menu.php">Menu</a></li>
            <li class="links" id="signin"><a href="signin.php">Sign In</a></li>
        </ul>
        <div class="navigation_right">
            <button type="button" class="button_signin">SIGN IN</button>
            <p class="cart"><i class="fa-solid fa-cart-shopping"></i><span class="cart_orders-quantity">0</span></p>
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