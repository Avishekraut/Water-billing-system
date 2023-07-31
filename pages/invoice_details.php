<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/app.js" type="text/javascript"></script>
        <link rel='icon' type='image/x-icon' href='../assets/logo.ico'>
        <title>Customer Details | Water Billing System</title>
        <script>
            var closebtn = document.getElementById('closebtn');
            closeNow = function() {
                closebtn.style.display = 'none';
            };
        </script>
    </head>
    <body>
        <div class="main-container">
            <div class="invoice-page">
                <img src="../assets/logo.png" alt="Logo image" class="logo1">
                <div class="title1">Water Billing System</div>
                <div class="customer-details">
                    <?php
                        include('./core.php');
                        $noti_query = "select * from notification order by time desc limit 1"; // storing sql query in defined variable.
                        $exec_result = $db_connection -> query($noti_query); // executing query.
                        
                        if ($exec_result -> num_rows > 0) {
                            while ($row = $exec_result -> fetch_assoc()) {
                                echo "<div class='alert'>";
                                echo "<strong>".$row['title']."</strong>: " .$row['message']. "";
                                echo "</div>";
                            }
                        } else {
                            echo "
                            <div class='notiText'>
                            <h2></h2>
                            </div>";
                        }
                    ?>
                    <div class="text-title">
                        <p>Customer Name: </p>
                        <p>Customer ID: </p>
                        <p>Branch: </p>
                        <p>Consumption Units: </p>
                        <p>Current Due: </p>
                    </div>
                    <div class="text-inputs">
                        <?php
                        $total_due_value=0;
                            session_start();
                            include('./core.php');
                            if ($_POST != null) {
                                $customer_id = $_POST['userID']; // stores customer id using post post in defined variable.
                                $branch = $_POST['branch']; // stores branch name using post post in defined variable.
                                $checkUser = "select * from customer_bills where customer_id = '$customer_id' and branch = '$branch'"; // storing sql query in defined variable.
                                $result = $db_connection -> query($checkUser); // executing query.
                                if ($result -> fetch_assoc()) { // return an associative array with elements.
                                    $query = "select * from customer_bills where customer_id = '$customer_id' and branch = '$branch' order by time desc"; // storing sql query in defined variable.
                                    $result = $db_connection -> query($query); // executing query.
                                    if ($result -> num_rows > 0) {
                                        $row = $result -> fetch_assoc();
                                        echo "<p>" .$row['name']. "</p>";
                                        echo "<p>" .$row['customer_id']. "</p>";
                                        echo "<p>" .$row['branch']. "</p>";
                                        echo "<p>" .$row['consumption_units']. " Units</p>";
                                        echo "<p>Rs. " .$row['total_amount']. "</p>";
                                        $_SESSION["totalAmount"]= $row['total_amount'];
                                    }
                                } else {
                                    header("Location: ../index.php?error"); // redirecting customer portal page.
                                }
                            }
                            
                        ?>
                    </div>
                </div>
                <?php
                    include('./core.php');
                    $query = "select * from customer_bills where customer_id = '$customer_id' and branch = '$branch' order by time desc limit 3"; // storing sql query in defined variable.
                    $result = $db_connection -> query($query); // executing query.
                    if ($result -> num_rows > 0) {
                        echo "
                        <table class='content-table'>
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Units</th>
                                    <th>Tax</th>
                                    <th>Bill amount</th>
                                    <th>Discount</th>
                                    <th>Total amount</th>
                                </tr>
                            </thead>
                            <tbody>
                        ";
                        while ($row = $result -> fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['time']. "</td>";
                            echo "<td>".$row['consumption_units']. "</td>";
                            echo "<td>".$row['tax']. "%</td>";
                            echo "<td>".$row['bill_amount']. "</td>";
                            echo "<td>".$row['discount']. "%</td>";
                            echo "<td>".$row['total_amount']. "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                    }
                    echo "
                    </tbody>
                    </table>
                    ";
                ?>
                <div class="btn1">
                    <button type="submit" class="invoice-btn" onclick="location.href='./payment.php'">PROCEED</button>
                    <button type="submit" onclick="confirmLogout()" class="invoice-btn">CANCEL</button>
                    <button class="print-btn" onclick="window.print()">Print Bill</button>
                </div>
                <div class="footer-links">
                    <p>Contact: 021-534469<br><span class="copyright">Copyright © 2022 Kathamndu water supply Ltd.</span></p>
                </div>
            </div>
        </div>
    </body>
</html>