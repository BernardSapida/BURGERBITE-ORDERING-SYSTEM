<?php
    session_start();

    $err_email = "";
    $err_password = "";

    if(isset($_POST["signin_btn"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if(!empty($email) && !empty($password)) {
            $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub") or die("ERROR: Could not connect. " .  $connect->connect_error);
            $message = "";
            $sql_account = mysqli_query($connect, "SELECT * FROM client_accounts WHERE email='" . $email . "' ");
            $sql_information = mysqli_query($connect, "SELECT * FROM client_information WHERE email='" . $email . "' ");
            $row_account  = mysqli_fetch_array($sql_account);
            $row_information  = mysqli_fetch_array($sql_information);

            if(is_array($row_account)) {
                // echo $row_account["password"];
                if(password_verify($password, $row_account["password"])) {
                    $_SESSION["firstname"] = explode(" ", $row_account['fullname'])[0];
                    $_SESSION["lastname"] = explode(" ", $row_account['fullname'])[1];
                    $_SESSION["email"] = $row_account['email'];
                    $_SESSION["password"] = $row_account['password'];
                    $_SESSION["type"] = $row_account['type'];
                    $_SESSION["clientid"] = $row_account['clientid'];
                    $_SESSION["image"] = $row_account['image'];

                    if(is_array($row_information)) {
                        $_SESSION["mobile"] = $row_information['mobile'];
                        $_SESSION["street-address"] = $row_information['street address'];
                        $_SESSION["city"] = $row_information['city'];
                        $_SESSION["barangay"] = $row_information['barangay'];
                    }
                } else {
                    $err_password = "Password is incorrect!";
                }
            } else {
                $err_email = "Email didn't exist!";
            }
        } else {
            if(empty($email)) $err_email = "Email is required!";
            if(empty($password)) $err_password = "Password is required!";
        }
    }

    if(!empty($_SESSION["email"])) {
        if($_SESSION["type"] == "admin") {
			header("Location: admin_dashboard.php");
		} else {
			header("Location: client_menu.php");
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burgerhub Restaurant | Sign In">
    <meta property="og:url" content="https://burgerhub.x10.mx/signin.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Sign Up Page -->
    <main>
        <section class="section_signin">
            <div class="container_signin">
                <div class="container_title">
                    <h1>Sign In to BurgerHub</h1>
                    <p>New user? <a href="signup.php">Create an account</a></p>
                </div>
                <div class="container_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <label for="email">
                            <p>Email Address</p>
                            <input type="text" name="email" id="email" placeholder="Enter your email address" aria-label="Email" autocomplete="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>">
                            <?php if(!empty($err_email)) echo "<p class=\"err_message\"> $err_email </p>" ?>
                        </label>
                        <label for="password">
                            <p>Password</p>
                            <div class="signin_password">
                                <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="current-password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>">
                                <span class="checkbox_password">
                                    <label for="checkbox_toggle-password">
                                        <input type="checkbox" name="checkbox_toggle-password" id="checkbox_toggle-password" aria-label="Password">
                                        <i class="fa-solid fa-eye-slash icon_hide-password" id="eye"></i>
                                    </label>
                                </span>
                            </div>
                            <?php if(!empty($err_password)) echo "<p class=\"err_message\"> $err_password </p>" ?>
                        </label>
                        <button type="submit" name="signin_btn" id="signin_btn">Sign In</button>
                        <div class="signin_keep-logged">
                            <label for="keep-logged">
                                <p>
                                    <input type="checkbox" name="keep-logged" id="keep-logged"> Keep me logged in
                                </p>
                            </label>
                            <p>
                                <a href="forgot_password.php">Forgot Password?</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
    
    <script src="js/signin.js"></script>
</body>
</html>