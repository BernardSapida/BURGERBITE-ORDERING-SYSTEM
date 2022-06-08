<?php
    session_start();
    
    if(empty($_SESSION["type"]) || $_SESSION["type"] == "admin") header("Location: index.php");
    $clientID = $_SESSION["clientid"];

    $errFirstname = "";
    $errLastname = "";
    $errMobile = "";
    $errAddress = "";
    $errEmail = "";
    $errCity = "";
    $errBarangay = "";
    $errImage = "";
    $errCurrentPassword = "";
    $errNewPassword = "";
    $errConfirmPassword = "";
    $updatedAccount = "";

    if(isset($_POST["client-account-submit"])) {
        $firstname = htmlspecialchars($_POST["client-account-firstname"]);
        $lastname = htmlspecialchars($_POST["client-account-lastname"]);
        $mobile = htmlspecialchars($_POST["client-account-mobile"]);
        $street_address = htmlspecialchars($_POST["client-account-street-address"]);
        $city = htmlspecialchars($_POST["client-account-city"]);
        $barangay = htmlspecialchars($_POST["client-account-barangay"]);
        $email = $_POST["client-account-email"];
        $image = htmlspecialchars($_SESSION["image"]);
        $image_new_name = "";

        $image_name = $_FILES["client-account-image"]["name"];
        $image_size = $_FILES["client-account-image"]["size"];
        $image_tmp = $_FILES["client-account-image"]["tmp_name"];
        $image_err = $_FILES["client-account-image"]["error"];

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($street_address) && !empty($city) && !empty($barangay)) {
            if($image_err === 0) {
                if($image_size > 800000) {
                    $errImage = "Sorry, your profile image is too large!";
                } else {
                    $image_external = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_external_lowercase = strtolower($image_external);
                    $allowed_externals = array("jpg", "jpeg", "png");
                    
                    if(in_array($image_external_lowercase, $allowed_externals)){
                        $image_new_name = uniqid("IMG-", true) . '.' . $image_external_lowercase;
                        $image_upload_path = 'profile/' . $image_new_name;
                        move_uploaded_file($image_tmp, $image_upload_path);

                        $image = $image_new_name;
                        $_SESSION["image"] = $image;
                    }
                }
            }
            
            $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub") or die("ERROR: Could not connect. " .  $connect->connect_error);;
            $sql_information = "UPDATE client_information 
            SET image = '$image', `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `mobile` = '$mobile', `street address` = '$street_address', `city` = '$city', `barangay` = '$barangay' WHERE clientid = '$clientID'";
            mysqli_query($connect, $sql_information);

            $sql_accounts = "UPDATE client_accounts 
            SET image = '$image', `fullname` = '$firstname $lastname', `email` = '$email' WHERE clientid = '$clientID'";
            mysqli_query($connect, $sql_accounts);

            $sql_accounts = "UPDATE client_orders 
            SET `firstname` = '$firstname', `lastname` = '$lastname', image = '$image', `street address` = '$street_address', `city` = '$city', `barangay` = '$barangay' WHERE clientid = '$clientID'";
            mysqli_query($connect, $sql_accounts);

            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["email"] = $email;
            $_SESSION["mobile"] = $mobile;
            $_SESSION["street-address"] = $street_address;
            $_SESSION["city"] = $city;
            $_SESSION["barangay"] = $barangay;
            $updatedAccount = true;

            $firstname = "";
            $lastname = "";
            $mobile = "";
            $street_address = "";
            $city = "";
            $barangay = "";
            $email = "";
            $image = "";
        } else {
            if(empty($firstname)) $errFirstname = "Firstname is required!";
            if(empty($lastname)) $errLastname = "Lastname is required!";
            if(empty($email)) $errEmail = "Email is required!";
            if(empty($mobile)) $errMobile = "Mobile is required!";
            if(empty($street_address)) $errAddress = "Street Address is required!";
            if(empty($city)) $errCity = "City is required!";
            if(empty($barangay)) $errBarangay = "Barangay is required!";
        }
    }

    if(isset($_POST["client-password-submit"])) {
        $currentPassword = $_POST["client-password-current"];
        $newPassword = $_POST["client-password-new"];
        $confirmPassword = $_POST["client-password-confirm"];

        if(!empty($currentPassword) && !empty($newPassword) && !empty($confirmPassword)) {
            if(password_verify($currentPassword, $_SESSION["password"])) {
                if(strlen($newPassword) > 8) {
                    if(!preg_match_all("/\W/i", $newPassword)) $errNewPassword = "Your password should contain unique symbols!";
                    if(!preg_match_all("/[A-Z]/", $newPassword)) $errNewPassword = "Your password should have 1 or more uppercase letters!";
                    if(!preg_match_all("/[a-z]/", $newPassword)) $errNewPassword = "Your password should have 1 or more lowercase letters!";
                    if(!preg_match_all("/[0-9]/", $newPassword)) $errNewPassword = "Your password should have 1 or more numerical values!";
                        
                    if($newPassword == $confirmPassword && empty($errNewPassword)) {
                        $encryptPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub") or die("ERROR: Could not connect. " .  $connect->connect_error);
                        $sql_accounts = "UPDATE client_accounts 
                        SET password = '$encryptPassword' WHERE clientid = '$clientID'";
                        mysqli_query($connect, $sql_accounts);
                        
                        $_SESSION["password"] = $encryptPassword;
                        $updatedAccount = true;
                        
                        $currentPassword = "";
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
                $errCurrentPassword = "Your current password is incorrect!";
            }
        } else {
            if(empty($currentPassword)) $errCurrentPassword = "Current password is required!";
            if(empty($newPassword)) $errNewPassword = "New password is required!";
            if(empty($confirmPassword)) $errConfirmPassword = "Confirm password is required!";
        }
        echo "<script>location.href = '#section_password'</script>";
    }
?>