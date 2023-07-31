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
        <title>Customers | Water Billing System</title>
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
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
            </div>
            <div class="cus-section">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h2>Manage <b>Customers</b></h2>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Customer</span></a>
                                </div>
                            </div>
                        </div>
                        <?php
                            include('./core.php');
                            // session_start();
                            $query = "select * from customer_details"; // storing sql query in defined variable.
                            $result = $db_connection -> query($query); // executing query.
                            if ($result -> num_rows > 0) {
                                echo "
                                <table class='table table-striped table-hover'>
                                    <thead>
                                        <tr>
                                           
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";
                                    while ($row = $result -> fetch_assoc()) {
                                        $_SESSION["id"] = $row['customer_id'];
                                        $userID = $_SESSION["id"];
                                        echo "<tr>";
                                        echo "<td>" .$row['customer_id']. "</td>";
                                        echo "<td>" .$row['name']. "</td>";
                                        echo "<td>" .$row['email']. "</td>";
                                        echo "<td>" .$row['address']. "</td>";
                                        echo "<td>" .$row['phone_number']. "</td>";
                                        echo "<td>";
                                        echo "<a href='./view.php?id=$userID' class='view' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Billing'>&#xe417;</i></a>";
                                        echo "<a href='./edit.php?id=$userID' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>";
                                        echo "<a href='./delete.php?id=$userID' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                            } else {
                                echo "<tr>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                            }
                            echo "
                            </tbody>
                            </table>
                            ";
                            ?>
                    </div>
                </div>
            </div>
            <!-- Edit Modal HTML -->
            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="./addCustomer.php" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Customer</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <span class="info">Branch</span>
                                <select class="branch-dropdown" name="branch" required>
                                    <option value="unknown">Select your branch</option>
                                    <option value="jamal">Jamal</option>
                                    <option value="kalanki">Kalanki</option>
                                    <option value="maitidevi">Maitidevi</option>
                                    <option value="Naxal">Naxal</option>
                                    <option value="newbaneshwor">New Baneshwor</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" name="email" type="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea id="address" name="address" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" id="phonenumber" name="phonenumber" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-success2" value="Add">
                            </div>
                        </form>
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