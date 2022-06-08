<?php
    require_once "includes/dashboard_data.php";
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
    <meta property="og:url" content="https://burgerhub.x10.mx/admin_dashboard.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/burgerhub.ico">
    <link rel="stylesheet" href="css/admin_header.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>BurgerHub</title>
</head>
<body>
    <?php include_once 'header.php' ?>
    <!-- BurgerHub Header -->

    <!-- BurgerHub Index Page -->
    <main>
        <!-- BurgerHub Sign In -->
        <section class="section_dashboard">
            <div class="container_dashboard-header">
                <h1>BurgerHub Dashboard</h1>
                <p>Welcome to BurgerHub admin panel</p>
            </div>
            <div class="container_dashboard">
                <div class="container_cards">
                    <div class="card-title-header">
                        <p class="title">Total Income</p>
                        <p class="badges income">Updated</p>
                    </div>
                    <p class="amount">₱<?php echo ($total_income != 0) ? number_format($total_income) : 0; ?></p>
                    <div class="card-track">
                        <p class="track-label">Total Income</p>
                        <p class="track-percentage income" id="income"><?php echo !empty($accumulated_income) ? $accumulated_income . "%" : "0%" ?></p>
                    </div>
                    <div class="progress-line">
                        <div class="progress-line-amount"></div>
                    </div>
                </div>
                <div class="container_cards">
                    <div class="card-title-header">
                        <p class="title">Clients</p>
                        <p class="badges clients">Overall</p>
                    </div>
                    <p class="amount"><?php echo (mysqli_num_rows($sql_accounts) != 0) ? mysqli_num_rows($sql_accounts) : 0; ?></p>
                    <div class="card-track">
                        <p class="track-label">Total Clients</p>
                        <p class="track-percentage clients" id="clients"><?php echo !empty($accumulated_clients) ? $accumulated_clients . "%" : "0%" ?></p>
                    </div>
                    <div class="progress-line">
                        <div class="progress-line-clients"></div>
                    </div>
                </div>
                <div class="container_cards">
                    <div class="card-title-header">
                        <p class="title">Incomplete Orders</p>
                        <p class="badges incomplete-orders">New</p>
                    </div>
                    <p class="amount"><?php echo (mysqli_num_rows($sql_accounts_incomplete_orders) != 0) ? mysqli_num_rows($sql_accounts_incomplete_orders) : 0; ?></p>
                    <div class="card-track">
                        <p class="track-label">Total Incomplete Orders</p>
                        <p class="track-percentage incomplete-orders" id="incomplete-orders"><?php echo !empty($accumulated_incomplete_orders) ? $accumulated_incomplete_orders . "%" : "0%" ?></p>
                    </div>
                    <div class="progress-line">
                        <div class="progress-line-incomplete-orders"></div>
                    </div>
                </div>
                <div class="container_cards">
                    <div class="card-title-header">
                        <p class="title">Completed Orders</p>
                        <p class="badges completed-orders">Overall</p>
                    </div>
                    <p class="amount"><?php echo (mysqli_num_rows($sql_accounts_complete_orders) != 0) ? mysqli_num_rows($sql_accounts_complete_orders) : 0; ?></p>
                    <div class="card-track">
                        <p class="track-label">Total Orders</p>
                        <p class="track-percentage completed-orders" id="completed-orders"><?php echo !empty($accumulated_complete_orders) ? $accumulated_complete_orders . "%" : "0%" ?></p>
                    </div>
                    <div class="progress-line">
                        <div class="progress-line-total-orders"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section_tabular-orders">
            <div class="container_search">
                <input type="text" name="search" id="search" placeholder="Search clients">
                <span class="icon_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <div class="container_tabular-order">
                <table class="table_client-orders">
                    <caption>Client Orders</caption>
                    <thead>
                        <tr>
                            <th class="client_number">#</th>
                            <th class="client_image">Image</th>
                            <th class="client_name">Customer</th>
                            <th class="client_transaction-number">Transaction Number</th>
                            <th class="client_order-no">Order No.</th>
                            <th class="client_quantity">Quantity</th>
                            <th class="client_amount">Amount</th>
                            <th class="client_order-time">Order Time</th>
                            <th class="client_status">Status</th>
                            <th class="client_details">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td><img src='profile/".$row['image']."' alt='Profile Image'></td>";
                                    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['transactionNo'] . "</td>";
                                    echo "<td>" .$row['orderNo'] . "</td>";
                                    echo "<td>" . $row['quantity'] . "</td>";
                                    echo "<td>₱" . number_format($row['total']) . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td><div class='status ". ($row['status'] == 'Pending' ? 'pending' : ($row['status'] == 'Processing' ? "processing" : ($row['status'] == 'Delivering' ? "delivering" : ($row['status'] == 'Completed' ? "completed" : ""))))."'></div>" . $row['status'] . "</td>";
                                    echo "<td><button type='button' class='view_details' onclick='location.href=\"admin_dashboard.php?tn=" . $row['transactionNo'] . "&ci=". $row['clientid'] ."\"' aria-label='View details'>View Details</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php
            if(isset($_GET["tn"]) && isset($_GET["ci"])) {
                $sql_client_order_details = mysqli_query($connect,"SELECT * FROM client_orders WHERE transactionNo = '". $_GET["tn"] ."' and clientid= '". $_GET["ci"] ."'");
                echo "<section class='section_modal_client-details'>
                        <div class='container_modal-client-details'>
                            <div class='container_table-header'>
                                <h1>Client Order Details" . $_GET["st"] . "</h1>
                                <button type='button' aria-label='Close modal' id='close-modal' onclick='location.href=`admin_dashboard.php`'><i class='fa-solid fa-x'></i></button>
                            </div>
                            <table>";
                                while($row = mysqli_fetch_array($sql_client_order_details)) {
                                    echo "<tr>";
                                        echo "<td>Client ID</td>";
                                        echo "<td>" . $row['clientid'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Name</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Transaction No.</td>";
                                        echo "<td>" . $row['transactionNo'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Order No.</td>";
                                        echo "<td>" . $row['orderNo'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Street Address</td>";
                                        echo "<td>" . $row['street address'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>City</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Barangay</td>";
                                        echo "<td>" . $row['barangay'] . "</td>";
                                    echo "</tr>";
                                    if($row["item1"]) {
                                        echo "<tr>";
                                            echo "<td>Item 1</td>";
                                            echo "<td>" . $row['item1'] . "<span>" . ($row["item1"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item2"]) {
                                        echo "<tr>";
                                            echo "<td>Item 2</td>";
                                            echo "<td>" . $row['item2'] . "<span>" . ($row["item2"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item3"]) {
                                        echo "<tr>";
                                            echo "<td>Item 3</td>";
                                            echo "<td>" . $row['item3'] . "<span>" . ($row["item3"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item4"]) {
                                        echo "<tr>";
                                            echo "<td>Item 4</td>";
                                            echo "<td>" . $row['item4'] . "<span>" . ($row["item4"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item5"]) {
                                        echo "<tr>";
                                            echo "<td>Item 5</td>";
                                            echo "<td>" . $row['item5'] . "<span>" . ($row["item5"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item6"]) {
                                        echo "<tr>";
                                            echo "<td>Item 6</td>";
                                            echo "<td>" . $row['item6'] . "<span>" . ($row["item6"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item7"]) {
                                        echo "<tr>";
                                            echo "<td>Item 7</td>";
                                            echo "<td>" . $row['item7'] . "<span>" . ($row["item7"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item8"]) {
                                        echo "<tr>";
                                            echo "<td>Item 8</td>";
                                            echo "<td>" . $row['item8'] . "<span>" . ($row["item8"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item9"]) {
                                        echo "<tr>";
                                            echo "<td>Item 9</td>";
                                            echo "<td>" . $row['item9'] . "<span>" . ($row["item9"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item10"]) {
                                        echo "<tr>";
                                            echo "<td>Item 10</td>";
                                            echo "<td>" . $row['item10'] . "<span>" . ($row["item10"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item11"]) {
                                        echo "<tr>";
                                            echo "<td>Item 11</td>";
                                            echo "<td>" . $row['item11'] . "<span>" . ($row["item11"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item12"]) {
                                        echo "<tr>";
                                            echo "<td>Item 12</td>";
                                            echo "<td>" . $row['item12'] . "<span>" . ($row["item12"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item13"]) {
                                        echo "<tr>";
                                            echo "<td>Item 13</td>";
                                            echo "<td>" . $row['item13'] . "<span>" . ($row["item13"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item14"]) {
                                        echo "<tr>";
                                            echo "<td>Item 14</td>";
                                            echo "<td>" . $row['item14'] . "<span>" . ($row["item14"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item15"]) {
                                        echo "<tr>";
                                            echo "<td>Item 15</td>";
                                            echo "<td>" . $row['item15'] . "<span>" . ($row["item15"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item16"]) {
                                        echo "<tr>";
                                            echo "<td>Item 16</td>";
                                            echo "<td>" . $row['item16'] . "<span>" . ($row["item16"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item17"]) {
                                        echo "<tr>";
                                            echo "<td>Item 17</td>";
                                            echo "<td>" . $row['item17'] . "<span>" . ($row["item17"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item18"]) {
                                        echo "<tr>";
                                            echo "<td>Item 18</td>";
                                            echo "<td>" . $row['item18'] . "<span>" . ($row["item18"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item19"]) {
                                        echo "<tr>";
                                            echo "<td>Item 19</td>";
                                            echo "<td>" . $row['item19'] . "<span>" . ($row["item19"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item20"]) {
                                        echo "<tr>";
                                            echo "<td>Item 20</td>";
                                            echo "<td>" . $row['item20'] . "<span>" . ($row["item20"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item21"]) {
                                        echo "<tr>";
                                            echo "<td>Item 21</td>";
                                            echo "<td>" . $row['item21'] . "<span>" . ($row["item21"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item22"]) {
                                        echo "<tr>";
                                            echo "<td>Item 22</td>";
                                            echo "<td>" . $row['item22'] . "<span>" . ($row["item22"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item23"]) {
                                        echo "<tr>";
                                            echo "<td>Item 23</td>";
                                            echo "<td>" . $row['item23'] . "<span>" . ($row["item23"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item24"]) {
                                        echo "<tr>";
                                            echo "<td>Item 24</td>";
                                            echo "<td>" . $row['item24'] . "<span>" . ($row["item24"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item25"]) {
                                        echo "<tr>";
                                            echo "<td>Item 25</td>";
                                            echo "<td>" . $row['item25'] . "<span>" . ($row["item25"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item26"]) {
                                        echo "<tr>";
                                            echo "<td>Item 26</td>";
                                            echo "<td>" . $row['item26'] . "<span>" . ($row["item26"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    if($row["item27"]) {
                                        echo "<tr>";
                                            echo "<td>Item 27</td>";
                                            echo "<td>" . $row['item27'] . "<span>" . ($row["item27"] > 1 ? "pcs" : "pc") . "</span></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td>Status</td>
                                        <td> 
                                                <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'> 
                                                    <label for='status'>
                                                        <select name='status' id='status' name='status' onchange='location.href = "admin_dashboard.php?tn=<?php echo $_GET["tn"]?>&ci=<?php echo $_GET["ci"]?>&st="+this.value' aria-label='Order Status'>
                                                            <option value='Pending' <?php echo ($row["status"] == "Pending" ? "selected" : "") ?>>Pending</option>
                                                            <option value='Processing' <?php echo ($row["status"] == "Processing" ? "selected" : "") ?>>Processing</option>
                                                            <option value='Delivering' <?php echo ($row["status"] == "Delivering" ? "selected" : "") ?>>Delivering</option>
                                                            <option value='Completed' <?php echo ($row["status"] == "Completed" ? "selected" : "") ?>>Completed</option>
                                                        </select>
                                                    </label>
                                                </form>
                                            </td>
                                    </tr>
                                    <?php
                                    echo "<tr>";
                                        echo "<td>Total</td>";
                                        echo "<td>₱" . number_format($row['total']) . "</td>";
                                    echo "</tr>";
                                }
                echo        "</table>
                        </div>
                    </section>";
                    // location.href=
            }
        ?>
    </main>
    <?php include_once 'global_footer.php' ?>
    <script src="js/admin-dashboard.js"></script>
</body>
</html>