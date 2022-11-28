<?php
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    if($_SESSION["type"] == "client") header("Location: index.php");
    if($_SESSION["type"] == "admin") header("Location: index.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $success_email = false;

    if(isset($_POST["submit"])) {
        $email = $_POST["email"];
        $err_email = "";

        if(!empty($email)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $connect = mysqli_connect("localhost", "root", "", "burgershot") or die("ERROR: Could not connect. " .  $connect->connect_error);
                $sql_accounts = "SELECT * FROM client_accounts where email = '" . $email . "'";
                $result = mysqli_query($connect, $sql_accounts);
                $row_result = mysqli_fetch_array($result);

                if(is_array($row_result)) {
                    $_SESSION["token_email"] = $email;
                    $_SESSION["token_url"] = uniqid();

                    $mail = new PHPMailer(true);

                    try {
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                                      //Display output
                        $mail->isSMTP(); 
                        $mail->Host       = 'smtp.office365.com';                                   //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                                   //Enable SMTP authentication
                        $mail->Username   = 'burgershot.service@outlook.com';                       //SMTP username
                        $mail->Password   = 'burgershot';                                           //SMTP password
                        $mail->SMTPSecure = "STARTTLS";                                             //Enable implicit TLS encryption
                        $mail->Port       = 587;                                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                        // Recipients
                        $mail->setFrom('burgershot.service@outlook.com', 'Burger Shot Service');
                        $mail->addAddress($email, $row_result['fullname']);                         //Add a recipient & Name is optional
                        $mail->addReplyTo('burgershot.service@outlook.com', 'Reply');
        
                        // Content
                        $mail->isHTML(true);                                                        //Set email format to HTML
                        $mail->Subject = 'Message from Burger Shot';
                        $mail->Body    = 'We received your message, thank you for reaching us out and we will try out best to respond soonest!<br/>- Mr. Mark';
                        $mail->AltBody = 'We received your message, thank you for reaching us out and we will try out best to respond soonest!';
        
                        $mail->send();
                        
                        $success_email = true;
                        $email = "";
                    } catch (Exception $e) {
                        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    $err_email = "Your email didn't exist!";
                }
            } else {
                $err_email = "Email is invalid!";
            }
        } else {
            $err_email = "Email is required!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mark Jigger Masacupan">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burger Shot Restaurant | Reset Password">
    <meta property="og:url" content="https://Burgershot.x10.mx/forgot-password.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/Burgershot.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/forgot_password.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Burger Shot</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- Burger Shot Forgot Password Page -->
    <main>
        <section class="section_forgot-password">
            <div class="container_forgot-password">
                <div class="container_title">
                    <p class="danger-icon"><i class="fa-solid fa-exclamation"></i></p>
                    <h1>Forgot Password</h1>
                    <p>Enter your email and we'll send you a link to reset your password.</p>
                </div>
                <div class="container_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <label for="email">
                            <p>Email Address:</p>
                            <input type="text" name="email" id="email" aria-label="Email" value="<?php echo (isset($_POST["email"])) ? $email : '' ?>" placeholder="Enter your email">
                            <?php if(!empty($err_email)) echo '<p class="err_message">' . $err_email . '</p>' ?>
                        </label>
                        <button type="submit" name="submit" id="submit" aria-label="Forgot Password">Submit</button>
                    </form>
                </div>
                <p><a href="signin.php"><span><i class="fa-solid fa-chevron-left"></i></span> Back to Sign In</a></p>
            </div>
        </section>

        <?php
            if($success_email) {
                echo '<section class="section_modal-email-success">
                        <div class="container_modal-email-success">
                            <div class="animation-ctn">
                                <div class="icon icon--email-success svg">
                                    <svg width="80px" height="80px">  
                                        <g fill="none" stroke="#22AE73" stroke-width="3"> 
                                        <circle cx="40" cy="40" r="36"></circle>
                                        <circle class="colored" fill="#22AE73" cx="40" cy="40" r="36"></circle>
                                        <polyline class="st0" stroke="#fff" stroke-width="15" points="48.5, 87.8 67.7, 107.9 112.2, 52.4"/>   
                                        </g> 
                                    </svg>
                                </div>
                            </div>
                            <h1>Successfully sent to email</h1>
                            <p>You can check your email now to reset your password.</p>
                            <button type="button" aria-label="Successfully sent email" id="btn_success">Okay</button>
                        </div>
                    </section>';
            }
        ?>
    </main>
    
    <?php include_once 'global_footer.php' ?>
    <script src="js/forgot_password.js"></script>
</body>
</html>