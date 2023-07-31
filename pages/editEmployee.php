<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include('./core.php');
    if ($_REQUEST != null) {
        $uid = $_REQUEST['userid'];
        if ($_REQUEST['editname']) {
            $name = $_REQUEST['editname'];
            $insert_query = "update customer_details set name = '$name' where customer_id = '$uid'";
            $result = $db_connection -> query($insert_query);
            if ($result) {
                echo '
                <script>
                window.onload = function() {
                    Swal.fire({
                        title: "Success!",
                        text: "Successfully Updated Name",
                        icon: "success",
                        confirmButtonColor: "#5388eb",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "./customers.php";
                        }
                    });
                };
                </script>';
            }
        } else if ($_REQUEST['editemail'])  {
            $email = $_REQUEST['editemail'];
            $insert_query = "update customer_details set email = '$email' where customer_id = '$uid'";
            $result = $db_connection -> query($insert_query);
            if ($result) {
                echo '
                <script>
                window.onload = function() {
                    Swal.fire({
                        title: "Success!",
                        text: "Successfully Updated Email",
                        icon: "success",
                        confirmButtonColor: "#5388eb",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "./customers.php";
                        }
                    });
                };
                </script>';
            }
        } else if ($_REQUEST['editaddress'])  {
            $address = $_REQUEST['editaddress'];
            $insert_query = "update customer_details set address = '$address' where customer_id = '$uid'";
            $result = $db_connection -> query($insert_query);
            if ($result) {
                echo '
                <script>
                window.onload = function() {
                    Swal.fire({
                        title: "Success!",
                        text: "Successfully Updated Address",
                        icon: "success",
                        confirmButtonColor: "#5388eb",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "./customers.php";
                        }
                    });
                };
                </script>';
            }
        } else if ($_REQUEST['editphone'])  {
            $phone = $_REQUEST['editphone'];
            $insert_query = "update customer_details set phone_number = '$phone' where customer_id = '$uid'";
            $result = $db_connection -> query($insert_query);
            if ($result) {
                echo '
                <script>
                window.onload = function() {
                    Swal.fire({
                        title: "Success!",
                        text: "Successfully Updated Phone Number",
                        icon: "success",
                        confirmButtonColor: "#5388eb",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "./customers.php";
                        }
                    });
                };
                </script>';
            }
        }
    }
?>