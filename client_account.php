<?php require_once 'includes/account_update.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burgerhub Restaurant | Client" />
    <meta property="og:url" content="https://burgerhub.x10.mx/client_account.php"/>
    <meta property="og:image" content="images/website-image.jpg"/>
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/client_header.css">
    <link rel="stylesheet" href="css/client_account.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Client Account Page -->
    <main>
        <!-- BurgerHub Client Account -->
        <section class="section_client-account">
            <div id="img_prev"></div>
            <h1 id="client_profiles">My Account</h1>
            <hr>
            <div class="container_client-account">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="profile_image"> 
                        <label for="client-account-image">
                            <img src="profile/<?php echo isset($_POST["client-account-image"]) ? $_POST["client-account-image"] : (empty($_SESSION['image']) ? "default.jpg" : $_SESSION['image']) ?>" id="client_profile" aria-label="Client Profile" alt="Client Profile">
                            <input type="file" aria-label="Client Profile" name="client-account-image" id="client-account-image">
                            <div class="camera-icon"><i class="fa-solid fa-camera"></i></div>
                        </label>
                    </div>
                    <div class="container_client-account-fullname">
                        <label for="client-account-firstname">
                            <p>First Name <span>*</span></p>
                            <input type="text" name="client-account-firstname" id="client-account-firstname" autocomplete="given-name" value="<?php echo isset($_SESSION["firstname"]) ? $_SESSION["firstname"] : (isset($_POST["client-account-firstname"]) ? $firstname : ""); ?>" placeholder="Enter your first name">
                            <p class="err_message"><?php echo $errFirstname ?></p>
                        </label>
                        <label for="client-account-lastname">
                            <p>Last Name <span>*</span></p>
                            <input type="text" name="client-account-lastname" id="client-account-lastname" autocomplete="family-name" value="<?php echo isset($_SESSION["lastname"]) ? $_SESSION["lastname"] : (isset($_POST["client-account-lastname"]) ? $firstname : ""); ?>" placeholder="Enter your last name">
                            <p class="err_message"><?php echo $errLastname ?></p>
                        </label>
                    </div>
                    <label for="client-account-email">
                        <p>Email <span>*</span></p>
                        <input type="text" name="client-account-email" id="client-account-email" autocomplete="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : (isset($_POST["client-account-email"]) ? $_POST["client-account-email"] : ""); ?>" placeholder="Enter your email">
                        <p class="err_message"><?php echo $errEmail ?></p>
                    </label>
                    <label for="client-account-mobile">
                        <p>Mobile Number <span>*</span></p>
                        <input type="text" name="client-account-mobile" id="client-account-mobile" autocomplete="tel" value="<?php echo isset($_SESSION["mobile"]) ? $_SESSION["mobile"] : (isset($_POST["client-account-mobile"]) ? $mobile : ""); ?>" placeholder="Enter your mobile number">
                        <p class="err_message"><?php echo $errMobile ?></p>
                    </label>
                    <label for="client-account-street-address">
                        <p>Street Address <span>*</span></p>
                        <input type="text" name="client-account-street-address" id="client-account-street-address" autocomplete="street-address" value="<?php echo isset($_SESSION["street-address"]) ? $_SESSION["street-address"] : (isset($_POST["client-account-street-address"]) ? $street_address : ""); ?>" placeholder="Enter your address">
                        <p class="err_message"><?php echo $errAddress ?></p>
                    </label>
                    <div class="container_client-account-fullname">
                        <label for="client-account-firstname">
                            <p>City <span>*</span></p>
                            <input type="text" name="client-account-city" id="client-account-city" autocomplete="given-name" value="<?php echo isset($_SESSION["city"]) ? $_SESSION["city"] : (isset($_POST["client-account-city"]) ? $city : ""); ?>" placeholder="Enter your city">
                            <p class="err_message"><?php echo $errCity ?></p>
                        </label>
                        <label for="client-account-lastname">
                            <p>Barangay <span>*</span></p>
                            <input type="text" name="client-account-barangay" id="client-account-barangay" autocomplete="family-name" value="<?php echo isset($_SESSION["barangay"]) ? $_SESSION["barangay"] : (isset($_POST["client-account-barangay"]) ? $barangay : ""); ?>" placeholder="Enter your barangay">
                            <p class="err_message"><?php echo $errBarangay ?></p>
                        </label>
                    </div>
                    <button type="submit" name="client-account-submit" id="client-account-submit" aria-label="Update Password">Update Account</button>
                </form>
            </div>
        </section>

        <!-- BurgerHub Client Password -->
        <section class="section_client-password" id="section_password">
            <h1>Password</h1>
            <hr>
            <div class="container_client-password">
                <form action="" method="POST">
                    <label for="client-email-hidden">
                        <p>Email <span>*</span></p>
                        <input type="text" name="client-email-hidden" id="client-email-hidden" value="bernardsapida1706@gmail.com" autocomplete="email" disabled>
                    </label>
                    <div class="container_password">
                        <label for="client-password-current">
                            <p>Current Password <span>*</span></p>
                            <div class="container_client-password-current">
                                <input type="password" name="client-password-current" id="client-password-current" autocomplete="current-password" placeholder="Current password" value="<?php echo isset($_POST["client-password-current"]) ? $currentPassword : "" ?>">
                                <i class="fa-solid fa-eye-slash icon_hide-password" id="eye_client-password-current"></i>
                            </div>
                            <p class="err_message"><?php echo $errCurrentPassword ?></p>
                        </label>
                        <label for="client-password-new">
                            <p>New Password <span>*</span></p>
                            <div class="container_client-password-new">
                                <input type="password" name="client-password-new" id="client-password-new" autocomplete="new-password" placeholder="New password" value="<?php echo isset($_POST["client-password-new"]) ? $newPassword : "" ?>">
                                <i class="fa-solid fa-eye-slash icon_hide-password" id="eye_client-password-new"></i>
                            </div>
                            <p class="err_message"><?php echo $errNewPassword ?></p>
                        </label>
                        <label for="client-password-confirm">
                            <p>Confirm Password <span>*</span></p>
                            <div class="container_client-password-confirm">
                                <input type="password" name="client-password-confirm" id="client-password-confirm" autocomplete="new-password" placeholder="Confirm password" value="<?php echo isset($_POST["client-password-confirm"]) ? $confirmPassword : "" ?>">
                                <i class="fa-solid fa-eye-slash icon_hide-password" id="eye_client-password-confirm"></i>
                            </div>
                            <p class="err_message"><?php echo $errConfirmPassword ?></p>
                        </label>
                        <button type="submit" name="client-password-submit" id="client-password-submit" aria-label="Update Password">Update Password</button>
                    </div>
                </form>
            </div>
        </section>

        <?php
            if($updatedAccount) echo '<section class="section_modal-update-success">
                                        <div class="container_modal-update-success">
                                            <div class="animation-ctn">
                                                <div class="icon icon--added-success svg">
                                                    <svg width="80px" height="80px">  
                                                        <g fill="none" stroke="#22AE73" stroke-width="5"> 
                                                        <circle cx="40" cy="40" r="36"></circle>
                                                        <circle class="colored" fill="#22AE73" cx="40" cy="40" r="36"></circle>
                                                        <polyline class="st0" stroke="#fff" stroke-width="15" points="48.5, 87.8 67.7, 107.9 112.2, 52.4"/>   
                                                        </g> 
                                                    </svg>
                                                </div>
                                            </div>
                                            <h1>Your account has been updated!</h1>
                                            <button type="button" aria-label="Added successfully" id="btn_update">Okay</button>
                                        </div>
                                    </section>';
        ?>
    </main>
    
    <?php include_once 'global_footer.php' ?>
    <script src="js/client-acc.js"></script>
</body>
</html>