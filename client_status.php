<?php
    session_start();
    
    if(empty($_SESSION["type"]) || $_SESSION["type"] == "admin") header("Location: index.php");
    if(empty($_GET["status"])) header("Location: client_status.php?status=Pending");
    $clientid = $_SESSION['clientid'];
    $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub");
    $sql_accounts_pending = mysqli_query($connect,"SELECT * FROM client_orders where status = 'Pending' and clientid = '". $_SESSION['clientid']. "'");
    $sql_accounts_processing = mysqli_query($connect,"SELECT * FROM client_orders where status = 'Processing' and clientid = '". $_SESSION['clientid']. "'");
    $sql_accounts_delivering = mysqli_query($connect,"SELECT * FROM client_orders where status = 'Delivering' and clientid = '". $_SESSION['clientid']. "'");
    $sql_accounts_completed = mysqli_query($connect,"SELECT * FROM client_orders where status = 'Completed' and clientid = '". $_SESSION['clientid']. "'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BERNARD V. SAPIDA, JAN MARICHIE Z. MOJICA, ZILDJIAN LEE G. LOREN, JOHN HERSON L. RADONES">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burgerhub Restaurant | Client">
    <meta property="og:url" content="https://burgerhub.x10.mx/client_status.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/client_header.css">
    <link rel="stylesheet" href="css/client_status.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- BurgerHub Order Status Page -->
    <main>
        <!-- BurgerHub Order Status -->
        <section class="section_order-status">
            <div class="container_heading-status">
                <p class="favicon"><i class="fa-solid fa-burger"></i></p>
                <h1>Order Status</h1>
            </div>
            <form action="" method="POST">
                <label for="order_status">
                    <select name="order_status" id="order_status" name="order_status" onchange="location.href='client_status.php?status='+this.value+''" aria-label="Order Status">
                        <option value="Pending" <?php echo $_GET["status"] == "Pending" ? "selected" : "" ?>>Pending</option>
                        <option value="Processing" <?php echo $_GET["status"] == "Processing" ? "selected" : "" ?>>Processing</option>
                        <option value="Delivering" <?php echo $_GET["status"] == "Delivering" ? "selected" : "" ?>>Delivering</option>
                        <option value="Completed" <?php echo $_GET["status"] == "Completed" ? "selected" : "" ?>>Completed</option>
                    </select>
                </label>
            </form>
            <div class="container_order-status" id="container_order-status">
                
                <?php
                    if($_GET["status"] == "Pending") {
                        if(mysqli_num_rows($sql_accounts_pending) == 0) {
                            echo "<div class='empty-status'>
                                    <h1>No pending orders</h1>
                                </div>";
                        } else {
                            while($row = mysqli_fetch_assoc($sql_accounts_pending)) {
                                echo "<div class='container_order-status-entry'>
                                        <div class='container_orderNo-Date'>
                                            <p class='orderNo'>Order No. ".$row["orderNo"]."</p>
                                            <p class='date'>".explode(" ", $row["date"])[0]."</p>
                                        </div>
                                        <p class='transaction-number'>Transaction number: <span>".$row["transactionNo"]."</span></p>
                                        <p class='status'>Status: <span>".$row["status"]."</span></p>
                                        <div class='container_quantity-amount'>
                                            <p class='quantity'>Quantity: <span>".$row["quantity"]."</span></p>
                                            <p class='total-amount'>Total Amount: <span>₱".number_format($row["total"])."</span></p>
                                        </div>
                                    </div>";
                            }
                        }
                    }

                    if($_GET["status"] == "Processing") {
                        if(mysqli_num_rows($sql_accounts_processing) == 0) {
                            echo "<div class='empty-status'>
                                    <h1>No processing orders</h1>
                                </div>";
                        } else {
                            while($row = mysqli_fetch_assoc($sql_accounts_processing)) {
                                echo "<div class='container_order-status-entry'>
                                        <div class='container_orderNo-Date'>
                                            <p class='orderNo'>Order No. ".$row["orderNo"]."</p>
                                            <p class='date'>".explode(" ", $row["date"])[0]."</p>
                                        </div>
                                        <p class='transaction-number'>Transaction number: <span>".$row["transactionNo"]."</span></p>
                                        <p class='status'>Status: <span>".$row["status"]."</span></p>
                                        <div class='container_quantity-amount'>
                                            <p class='quantity'>Quantity: <span>".$row["quantity"]."</span></p>
                                            <p class='total-amount'>Total Amount: <span>₱".number_format($row["total"])."</span></p>
                                        </div>
                                    </div>";
                            }
                        }
                        
                    }

                    if($_GET["status"] == "Delivering") {
                        if(mysqli_num_rows($sql_accounts_delivering) == 0) {
                            echo "<div class='empty-status'>
                                    <h1>No delivering orders</h1>
                                </div>";
                        } else {
                            while($row = mysqli_fetch_assoc($sql_accounts_delivering)) {
                                echo "<div class='container_order-status-entry'>
                                        <div class='container_orderNo-Date'>
                                            <p class='orderNo'>Order No. ".$row["orderNo"]."</p>
                                            <p class='date'>".explode(" ", $row["date"])[0]."</p>
                                        </div>
                                        <p class='transaction-number'>Transaction number: <span>".$row["transactionNo"]."</span></p>
                                        <p class='status'>Status: <span>".$row["status"]."</span></p>
                                        <div class='container_quantity-amount'>
                                            <p class='quantity'>Quantity: <span>".$row["quantity"]."</span></p>
                                            <p class='total-amount'>Total Amount: <span>₱".number_format($row["total"])."</span></p>
                                        </div>
                                    </div>";
                            }
                        }
                    }

                    if($_GET["status"] == "Completed") {
                        if(mysqli_num_rows($sql_accounts_completed) == 0) {
                            echo "<div class='empty-status'>
                                    <h1>No completed orders</h1>
                                </div>";
                        } else {
                            while($row = mysqli_fetch_assoc($sql_accounts_completed)) {
                                echo "<div class='container_order-status-entry'>
                                        <div class='container_orderNo-Date'>
                                            <p class='orderNo'>Order No. ".$row["orderNo"]."</p>
                                            <p class='date'>".explode(" ", $row["date"])[0]."</p>
                                        </div>
                                        <p class='transaction-number'>Transaction number: <span>".$row["transactionNo"]."</span></p>
                                        <p class='status'>Status: <span>".$row["status"]."</span></p>
                                        <div class='container_quantity-amount'>
                                            <p class='quantity'>Quantity: <span>".$row["quantity"]."</span></p>
                                            <p class='total-amount'>Total Amount: <span>₱".number_format($row["total"])."</span></p>
                                        </div>
                                    </div>";
                            }
                        }
                    }
                ?>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
</body>
</html>