<?php
    session_start();

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "client") header("Location: index.php");

    $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub");
    $sql = mysqli_query($connect,"SELECT * FROM client_messages");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burgerhub Restaurant | Admin">
    <meta property="og:url" content="https://burgerhub.x10.mx/admin_messages.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/admin_header.css">
    <link rel="stylesheet" href="css/admin_messages.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Index Page -->
    <main>
        <!-- BurgerHub Sign In -->
        <section class="section_tabular-messages">
            <div class="container_tabular-header">
                <h1>Contact Us Messages</h1>
                <p>Clients feedback and question</p>
            </div>
            <div class="container_tabular-messages">
                <table>
                    <caption>Client Messages</caption>
                    <thead>
                        <tr>
                            <th class="client_number">#</th>
                            <th class="client_image">Image</th>
                            <th class="client_name">Customer</th>
                            <th class="client_email">Email</th>
                            <th class="client_email">subject</th>
                            <th class="client_question">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        while($row = mysqli_fetch_assoc($sql))
                        {
                            echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><img src='profile/" . $row['image'] . "' alt='Profile Image'></td>";
                                echo "<td>" . $row['fullname'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['subject'] . "</td>";
                                echo "<td>" . $row['message'] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
</body>
</html>