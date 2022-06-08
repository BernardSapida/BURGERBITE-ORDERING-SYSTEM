<?php
    error_reporting(E_ERROR | E_PARSE);

    if(isset($_POST["signup_btn"])) {
        $uid = uniqid(rand(0,999));
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $mobile = "";
        $street_address = "";
        $city = "";
        $barangay = "";
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];
        $image = "default.jpg";
        $type = "client";

        $errFirstname = "";
        $errLastname = "";
        $errEmail = "";
        $errPassword = "";
        $errConfirmPassword = "";
      	$signup_success = false;

        if(empty($firstname)) $errFirstname = "Firstname is required!";
        if(empty($lastname)) $errLastname = "Lastname is required!";
        if(empty($email)) $errEmail = "Email is required!";
        if(empty($password)) $errPassword = "Password is required!";
        if(empty($confirmPassword)) $errConfirmPassword = "Confirm password is required!";

        if(strlen($firstname) < 2) $errFirstname = "Firstname is too short!";
        if(strlen($lastname) < 2) $errLastname = "Lastname is too short!";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errEmail = "Email is invalid!";

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
            if(!preg_match_all("/\W/i", $password)) $errPassword = "Your password should contain unique symbols!";
            if(!preg_match_all("/[A-Z]/", $password)) $errPassword = "Your password should have 1 or more uppercase letters!";
            if(!preg_match_all("/[a-z]/", $password)) $errPassword = "Your password should have 1 or more lowercase letters!";
            if(!preg_match_all("/[0-9]/", $password)) $errPassword = "Your password should have 1 or more numerical values!";
            if($password != $confirmPassword) $errConfirmPassword = "Your new password and confirm password didn't matched!";

            if(empty($errFirstname) && empty($errLastname) && empty($errEmail) && empty($errPassword) && empty($errConfirmPassword)) {
              	$signup_success = true;
                $encryptPassword = password_hash($password, PASSWORD_DEFAULT);

                $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub") or die("ERROR: Could not connect. " .  $connect->connect_error);
                $sqlAccounts = "INSERT INTO client_accounts (`clientid`, `image`, `fullname`, `email`, `password`, `type`)
                VALUES ('$uid', '$image', '$firstname $lastname', '$email', '$encryptPassword', '$type')";
                mysqli_query($connect, $sqlAccounts);

                $sqlInformation = "INSERT INTO client_information (`clientid`, `image`, `firstname`, `lastname`, `email`, `mobile`, `street address`, `city`, `barangay`) 
                VALUES ('$uid', '$image', '$firstname', '$lastname', '$email', '$mobile', '$street_address', '$city', '$barangay')";
                mysqli_query($connect, $sqlInformation);
              
                $firstname = "";
                $lastname = "";
                $email = "";
                $password = "";
                $confirmPassword = "";
            }
            
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
  	<meta property="og:title" content="Burgerhub Restaurant | Sign Up">
    <meta property="og:url" content="https://burgerhub.x10.mx/signup.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>  

    <!-- BurgerHub Sign Up Page -->
    <main>
        <section class="section_signup">
            <div class="container_signup">
                <div class="container_title">
                    <h1>Sign Up to BurgerHub</h1>
                    <p>Create your BurgerHub account</p>
                </div>
                <div class="container_form">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="container_fullname">
                            <label for="firstname">
                            <p>Firstname</p>
                            <input type="text" name="firstname" id="firstname" placeholder="First name" aria-label="Firstname" autocomplete="given-name" value="<?php echo isset($_POST["firstname"]) ? $firstname : ""?>">
                                <?php if($errFirstname != "") echo "<p class='err_message'>$errFirstname</p>"?>
                            </label>
                            <label for="lastname">
                                <p>Lastname</p>
                                <input type="text" name="lastname" id="lastname" placeholder="Last name" aria-label="Lastname" autocomplete="family-name" value="<?php echo isset($_POST["lastname"]) ? $lastname : ""?>">
                                <?php if($errLastname != "") echo "<p class='err_message'>$errLastname</p>"?>
                            </label>
                        </div>
                        <label for="email">
                            <p>Email Address</p>
                            <input type="text" name="email" id="email" placeholder="Email address" aria-label="Email" autocomplete="email" value="<?php echo isset($_POST["email"]) ? $email : ""?>">
                            <?php
                                if($errEmail == "") {
                                    echo "<p class='reminder'>You can use letters, numbers, & periods</p>";
                                } else {
                                    echo "<p class='err_message'>$errEmail</p>";
                                }
                            ?>
                        </label>
                        <div class="container_password">
                            <label for="password">
                                <p>Password</p>
                                <div class="container_password">
                                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password" value="<?php echo isset($_POST["password"]) ? $password : ""?>">
                                    <span class="checkbox_password">
                                        <label for="checkbox_toggle-password">
                                            <input type="checkbox" name="checkbox_toggle-password" id="checkbox_toggle-password" aria-label="Password">
                                            <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-password"></i>
                                        </label>
                                    </span>
                                </div>
                                <?php if($errPassword != "") echo "<p class='err_message'>$errPassword</p>"?>
                            </label>
                            <label for="confirm-password">
                                <p>Confirm Password</p>
                                <div class="container_confirm-password">
                                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password" autocomplete="new-password" value="<?php echo isset($_POST["confirm-password"]) ? $confirmPassword : ""?>">
                                    <span class="checkbox_password">
                                        <label for="checkbox_toggle-confirm-password">
                                            <input type="checkbox" name="checkbox_toggle-confirm-password" id="checkbox_toggle-confirm-password" aria-label="Confirm Password">
                                            <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-confirm-password"></i>
                                        </label>
                                    </span>
                                </div>
                                <?php 
                                    if($errConfirmPassword != "") echo "<p class='err_message'>$errConfirmPassword</p>";
                                ?>
                            </label>
                        </div>
                        <p class='reminder'>Use 8 or more characters with a mix of letters, numbers, and symbols.</p>
                        <button type="submit" name="signup_btn" id="signup_btn">Sign Up</button>
                    </form>
                </div>
            </div>
        </section>
        <?php
              if($signup_success) echo '<section class="section_modal-signup-success">
                      <div class="container_modal-signup-success">
                          <div class="animation-ctn">
                              <div class="icon icon--signup-success svg">
                                  <svg width="80px" height="80px">  
                                      <g fill="none" stroke="#22AE73" stroke-width="5"> 
                                      <circle cx="40" cy="40" r="36"></circle>
                                      <circle id="colored" fill="#22AE73" cx="40" cy="40" r="36"></circle>
                                      <polyline class="st0" stroke="#fff" stroke-width="15" points="48.5, 87.8 67.7, 107.9 112.2, 52.4"/>   
                                      </g> 
                                  </svg>
                              </div>
                          </div>
                          <h1>Account successfully created!</h1>
                          <p>You can signin now and make an order.</p>
                          <button type="button" aria-label="Account successfully created" id="btn_success">Okay</button>
                      </div>
                  </section>';
          ?>
    </main>

    <?php include_once 'global_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>