<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/app.js"></script>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel='icon' type='image/x-icon' href='../assets/logo.ico'>
        <title>View Bills | Water Billing System</title>
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                        <span class="icon"><img src="../assets/logo.png" alt="" width="60px"></span>
                        <span class="title">Water bill</span>
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
                            <span class="title">discount</span>
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
            </div>
            <div class="cus-section">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h2>Generate <b>Bill</b></h2>
                                </div>
                            </div>
                        </div>
                        <?php
                            include('./core.php');
                            $uid = $_REQUEST['id'];
                            $fetch_query2 = "select previous_reading from past_bill where customer_id = '$uid'";
                            $fetch_result2 = $db_connection -> query($fetch_query2);
                            $row2 = $fetch_result2 -> fetch_array(MYSQLI_ASSOC);
                            $prev_reading = $row2['previous_reading'];
                        ?>
                        <div id="editEmployeeModal" class="">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="./billEmployee.php">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Previous Reading</label>
                                                <input id="prevReading" name="prevReading" type="number" class="form-control" value="<?php echo $prev_reading?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Current Reading</label>
                                                <input id="currReading" name="currReading" type="number" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input id="price" name="price" type="number" class="form-control" >
                                            </div>
                                            <div class="form-group2" style="display:none;">
                                                <label>User ID</label>
                                                <input id="userid" name="userid" type="text" class="form-control" value="<?php echo $_REQUEST['id'];?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input onclick="window.location.href='./customers.php'" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-info" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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