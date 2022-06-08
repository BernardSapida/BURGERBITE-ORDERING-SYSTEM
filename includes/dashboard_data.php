<?php
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "client") header("Location: index.php");

    $connect = mysqli_connect("localhost", "grgpiwqy_burgerhub", "burgerhub30241715", "grgpiwqy_burgerhub");
    $sql = mysqli_query($connect,"SELECT * FROM client_orders");
    $sql_accounts_incomplete_orders = mysqli_query($connect,"SELECT * FROM client_orders WHERE status != 'Completed'");
    $sql_accounts_complete_orders = mysqli_query($connect,"SELECT * FROM client_orders WHERE status = 'Completed'");
    $sql_accounts = mysqli_query($connect,"SELECT * FROM client_accounts");

    $total_income = 0;

    while($row = mysqli_fetch_array($sql_accounts_complete_orders)) {
        $total_income += $row['total'];
    }

    $target_income = 60000000;
    $target_clients = 10000;
    $target_incomplete_orders = 10000;
    $target_complete_orders = 5000;

    $calculate_income = floor(($total_income/$target_income)*100);
    $calculate_clients = floor(empty(mysqli_num_rows($sql_accounts)) ? 0 : (mysqli_num_rows($sql_accounts)/$target_clients)*100);
    $calculate_incomplete_orders = floor((empty(mysqli_num_rows($sql_accounts_incomplete_orders)) ? 0 : mysqli_num_rows($sql_accounts_incomplete_orders)/$target_incomplete_orders)*100);
    $calculate_complete_orders = floor((empty(mysqli_num_rows($sql_accounts_complete_orders)) ? 0 : mysqli_num_rows($sql_accounts_complete_orders)/$target_complete_orders)*100);

    $accumulated_income = $calculate_income > 100 ? 100 : $calculate_income;
    $accumulated_clients = $calculate_clients > 100 ? 100 : $calculate_clients;
    $accumulated_incomplete_orders = $calculate_incomplete_orders > 100 ? 100 : $calculate_incomplete_orders;
    $accumulated_complete_orders = $calculate_complete_orders > 100 ? 100 : $calculate_complete_orders;

    if(isset($_GET["tn"]) && isset($_GET["ci"]) && isset($_GET["st"])) {
        $sql_client_order_details = mysqli_query($connect,"SELECT * FROM client_orders WHERE transactionNo = '". $_GET["tn"] ."' and clientid= '". $_GET["ci"] ."'");
        $updated_status = $_GET["st"];
        $sql_update_status = "UPDATE client_orders SET `status` = '$updated_status' WHERE transactionNo = '". $_GET["tn"] ."' and clientid= '". $_GET["ci"] ."'";
        mysqli_query($connect, $sql_update_status);
        header("location: admin_dashboard.php?tn=" . $_GET["tn"] . "&ci=" . $_GET["ci"] . "&ts=" . $_GET["ci"] . "");
    }
?>