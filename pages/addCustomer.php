<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    include('./core.php');
    if ($_POST != null) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $branch = $_POST['branch'];
        $phone = $_POST['phonenumber'];
        $number = rand(1000000,900000);
        $insert_query = "insert into customer_details (customer_id, name, email, address, branch, phone_number) values ('$number', '$name', '$email', '$address', '$branch', '$phone')";
        $result = $db_connection -> query($insert_query);
        $insert_query1 = "insert into past_bill (customer_id) values ('$number')";
        $db_connection -> query($insert_query1);
        $insert_query2 = "insert into customer_bills (customer_id, name, branch) values ('$number', '$name', '$branch')";
        $db_connection -> query($insert_query2);
        if ($result) {
            echo '
            <script>
            window.onload = function() {
                Swal.fire({
                    title: "Success!",
                    text: "Successfully added new customer",
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
?>