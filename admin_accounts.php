<?php
    session_start();

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "client") header("Location: index.php");

    $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub");
    $sql_accounts = mysqli_query($connect, "SELECT * FROM client_accounts");
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
    <meta property="og:url" content="https://burgerhub.x10.mx/admin_accounts.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/admin_header.css">
    <link rel="stylesheet" href="css/admin_accounts.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Index Page -->
    <main>
        <!-- BurgerHub Sign In -->
        <section class="section_tabular-accounts">
            <div class="container_tabular-header">
                <h1>Client Accounts</h1>
                <p>Clients registered accounts and date</p>
            </div>
            <div class="container_tabular-accounts">
                <table>
                    <caption>Client accounts</caption>
                    <thead>
                        <tr>
                            <th class="client_number">#</th>
                            <th class="client_date-created">Date Created</th>
                            <th class="client_image">Image</th>
                            <th class="client_name">Name</th>
                            <th class="client_email">Email</th>
                            <th class="client_password">Password</th>
                            <th class="client_type">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($sql_accounts)) {
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td><img src='profile/". $row['image'] ."' alt='Profile Image'></td>";
                                    echo "<td>" . $row['fullname'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>";
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