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
    <title>Discount | Water Billing System</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li id="water-logo">
                    <a href="#">
                        <span class="icon"><img src="../assets/logo.png" alt="" width="60px"></span>
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
            <?php
                include('./core.php');
                $insert_query = "select * from info";
                $result = $db_connection -> query($insert_query);
                $row = $result -> fetch_array(MYSQLI_ASSOC);
                $current_discount = $row['discount'];
            ?>
            <div class="wrapper">
                <header>Update Discount %</header>
                <div class="current">
                <div class="currentRate">Discount Rate(%): <span><?php echo $current_discount; ?></span>%</div>
                </div>
                <div class="newRate"><h4>New Rates</h4>
                <form action="./updateDiscount.php">
                  <div class="amount">
                    <p>Enter Discount Rate(%)</p>
                    <input type="number" name="discountamount" id="discountamount" value="">
                  </div>
                  <button type="submit">Update</button>
                </form>
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