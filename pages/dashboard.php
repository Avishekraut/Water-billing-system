<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/dashboard.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/app.js" type="text/javascript"></script>
        <link rel='icon' type='image/x-icon' href='../assets/logo.ico'>
        <title>Dashboard | Water Billing System</title>
    </head>
    <body>
        <?php
            include('./core.php');
            $fetch_query = "select * from customer_details";
            $result = $db_connection -> query($fetch_query);
            $customers = mysqli_num_rows($result);
           
            $fetch_query1 = "select sum(consumption_units) as `units` from customer_bills";
            $result1 = $db_connection -> query($fetch_query1);
            $row = $result1 -> fetch_array(MYSQLI_ASSOC);
            $consum_units = $row['units'];
            
            $fetch_query2 = "select sum(total_amount) as `amount` from customer_bills";
            $result2 = $db_connection -> query($fetch_query2);
            $row1 = $result2 -> fetch_array(MYSQLI_ASSOC);
            $total_amount = $row1['amount'];
        ?>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li id="water-logo">
                        <a href="#">
                        <span id="WLogo" class="icon"><img src="../assets/logo.png" alt="" width="60px"></span>
                        <span class="title">Water Billing System</span>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="./customers.php">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="./discount.php">
                            <span class="icon">
                                <ion-icon name="create-outline"></ion-icon>
                            </span>
                            <span class="title">Discount</span>
                        </a>
                    </li>
                    <li>
                        <a href="./notification.php">
                            <span class="icon">
                                <ion-icon name="notifications-outline"></ion-icon>
                            </span>
                            <span class="title">Notification</span>
                        </a>
                    </li>
                    <li id="log-out">
                    <a href="./logout.php">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- main -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <!--userImg -->
                    <div class="user">
                        <img src="../assets/user.png" width="150px" height="150px">
                    </div>
                </div>
                <!-- cards -->
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $customers ?></div>
                            <div class="cardName">Customers</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $consum_units ?></div>
                            <div class="cardName">Consumed units</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="water-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $total_amount ?></div>
                            <div class="cardName">Total Collection</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="recentTable">
                    <h2>Recent bills</h2>
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">Customer Id</div>
                            <div class="col col-2">Customer Name</div>
                            <div class="col col-3">Total Amount</div>
                        </li>
                        <?php
                            include('./core.php');
                            $query = "select * from customer_bills order by time desc limit 5"; // storing sql query in defined variable.
                            $result = $db_connection -> query($query); // executing query.
                            if ($result -> num_rows > 0) {
                                while ($row = $result -> fetch_assoc()) {
                                    echo "<li class='table-row'>";
                                    echo "<div class='col col-1' data-label='Job Id'>" .$row['customer_id']."</div>";
                                    echo "<div class='col col-2' data-label='Customer Name'>".$row['name']."</div>";
                                    echo "<div class='col col-3' data-label='Amount'>" .$row['total_amount']. "</div>";
                                    echo "</li>";
                                }
                            } else {
                                echo "<li class='table-row'>";
                                echo "<div class='col col-1' data-label='Job Id'></div>";
                                echo "<div class='col col-2' data-label='Customer Name'></div>";
                                echo "<div class='col col-3' data-label='Amount'></div>";
                                echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script>
            //menuToggle
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            
            toggle.onclick = function () {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
            
            //add hovered class
            let list = document.querySelectorAll('.navigation li');
            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('hovered'));
                this.classList.add('hovered');
            }
            list.forEach((item) =>
                item.addEventListener('mouseover', activeLink));
        </script>
    </body>
</html>