<?php
    session_start();
    if(empty($_SESSION["token_url"])) header('location: signin.php');
    if($_SESSION["type"] == "client") header("Location: index.php");
    if($_SESSION["type"] == "admin") header("Location: admin_dashboard.php");

    $errNewPassword = "";
    $errConfirmPassword = "";
    $success_reset_password = false;
    
    if(isset($_POST["reset-password"])) {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if(!empty($newPassword) && !empty($confirmPassword)) {

            if(strlen($newPassword) > 8) {
                if(!preg_match_all("/\W/i", $newPassword)) $errNewPassword = "Your password should contain unique symbols!";
                if(!preg_match_all("/[A-Z]/", $newPassword)) $errNewPassword = "Your password should have 1 or more uppercase letters!";
                if(!preg_match_all("/[a-z]/", $newPassword)) $errNewPassword = "Your password should have 1 or more lowercase letters!";
                if(!preg_match_all("/[0-9]/", $newPassword)) $errNewPassword = "Your password should have 1 or more numerical values!";
                    
                if($newPassword == $confirmPassword && empty($errNewPassword)) {
                    $encryptPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub") or die("ERROR: Could not connect. " .  $connect->connect_error);
                    $sql_accounts = "UPDATE client_accounts SET password = '$encryptPassword' WHERE email = '" . $_SESSION['token_email'] . "'";
                    $result = mysqli_query($connect, $sql_accounts);
                    
                    $success_reset_password = true;
                    $newPassword = "";
                    $confirmPassword = "";

                } else {
                    if(empty($errNewPassword)) {
                        $errConfirmPassword = "Your new password and confirm password didn't matched!";
                    }
                }
            } else {
                $errNewPassword = "Your password is too short!";
            }
        } else {
            if(empty($newPassword)) $errNewPassword = "Password is required!";
            if(empty($confirmPassword)) $errConfirmPassword = "Confirm password is required!";
        }
    }

    if(isset($_POST["btn_success"])) {
        session_destroy();
        header("Location: signin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta property="og:title" content="Burgerhub Restaurant | Reset Password" />
    <meta property="og:url" content="https://burgerhub.x10.mx/reset_password.php"/>
    <meta property="og:image" content="images/website-image.jpg"/>
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset_password.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Reset Password Page -->
    <main>
        <section class="section_reset-password">
            <div class="container_reset-password">
                <div class="container_title">
                    <h1>Reset your password</h1>
                </div>
                <div class="container_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <label for="new_password">
                            <p>New Password</p>
                            <div class="container_new-password">
                                <input type="password" name="new_password" id="new_password" placeholder="Enter new password" autocomplete="current-password" value="<?php echo (isset($_POST["new_password"])) ? $newPassword : ""; ?>">
                                <span class="checkbox_password">
                                    <label for="checkbox_toggle-password">
                                        <input type="checkbox" name="checkbox_toggle-new-password" id="checkbox_toggle-new-password" aria-label="Password">
                                        <i class="fa-solid fa-eye-slash icon_hide-password" id="eye_new-password"></i>
                                    </label>
                                </span>
                            </div>
                            <?php if($errNewPassword) echo '<p class="err_message">' . $errNewPassword . '</p>' ?>
                        </label>
                        <label for="confirm_password">
                            <p>Confirm Password</p>
                            <div class="container_confirm-password">
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" autocomplete="new-password" value="<?php echo (isset($_POST["confirm_password"])) ? $confirmPassword : ""; ?>">
                                <span class="checkbox_password">
                                    <label for="checkbox_toggle-password">
                                        <input type="checkbox" name="checkbox_toggle--confirm-password" id="checkbox_toggle-confirm-password" aria-label="Confirm Password">
                                        <i class="fa-solid fa-eye-slash icon_hide-password" id="eye_confirm-password"></i>
                                    </label>
                                </span>
                            </div>
                            <?php if($errConfirmPassword) echo '<p class="err_message">' . $errConfirmPassword . '</p>' ?>
                        </label>
                        <button type="submit" name="reset-password" id="btn_reset-password">Reset Password</button>
                    </form>
                </div>
            </div>
        </section>

        <?php
            if($success_reset_password) {
                echo '<section class="section_modal-reset-password-success">
                        <div class="container_modal-reset-password-success">
                            <div class="animation-ctn">
                                <div class="icon icon--reset-password-success svg">
                                    <svg width="80px" height="80px">  
                                        <g fill="none" stroke="#22AE73" stroke-width="3"> 
                                        <circle cx="40" cy="40" r="36"></circle>
                                        <circle class="colored" fill="#22AE73" cx="40" cy="40" r="36"></circle>
                                        <polyline class="st0" stroke="#fff" stroke-width="15" points="48.5, 87.8 67.7, 107.9 112.2, 52.4"/>   
                                        </g> 
                                    </svg>
                                </div>
                            </div>
                            <h1>Successfully reset password</h1>
                            <p>You can now Sign In with your new password.</p>
                            <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                                <button type="submit" name="btn_success" aria-label="Successfully reset password" id="btn_success">Okay</button>
                            </form>
                        </div>
                    </section>';
            }
        ?>
    </main>
    
    <?php include_once 'global_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/reset_password.js"></script>
</body>
</html>