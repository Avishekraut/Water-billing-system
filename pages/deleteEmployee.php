<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include('./core.php');
    if ($_REQUEST != null) {
        $uid = $_REQUEST['id'];
        $insert_query = "delete from customer_details where customer_id = $uid";
        $result = $db_connection -> query($insert_query);
        $insert_query1 = "delete from customer_bills where customer_id = $uid";
        $result = $db_connection -> query($insert_query1);
        if ($result) {
            echo '
            <script>
            window.onload = function() {
                Swal.fire({
                    title: "Success!",
                    text: "Successfully Deleted",
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