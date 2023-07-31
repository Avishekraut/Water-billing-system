<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include('./core.php');
    if ($_REQUEST != null) {
        $uid = $_REQUEST['userid'];
        $prev_reading = $_REQUEST['prevReading'];
        $curr_reading = $_REQUEST['currReading'];
        $final_reading = $curr_reading - $prev_reading;
        $price = $_REQUEST['price'];
        $total_amount = $final_reading * $price;
        
        $fetch_query = "select * from info";
        $result = $db_connection -> query($fetch_query);
        $display_row = $result -> fetch_array(MYSQLI_ASSOC);
        $discount = $display_row['discount'];
        $currTax = $display_row['tax'];
        $final_price = $total_amount - ($total_amount * ($discount / 100));
        $calculated_price = intval($final_price - ($final_price * ($currTax / 100)));
        
        $insert_query2 = "select * from customer_details where customer_id = '$uid'";
        $result2 = $db_connection -> query($insert_query2);
        $display_row2 = $result2 -> fetch_array(MYSQLI_ASSOC);
        $uname = $display_row2['name'];
        $ubranch = $display_row2['branch'];

        $insert_query = "insert into customer_bills (customer_id, name, branch, previous_reading, current_reading, consumption_units, tax, discount, bill_amount, total_amount) values ('$uid', '$uname', '$ubranch', '$prev_reading', '$curr_reading', '$final_reading', '$currTax', '$discount', '$total_amount', '$calculated_price')";
        $result = $db_connection -> query($insert_query);
        if ($result) {
            echo '
            <script>
            window.onload = function() {
                Swal.fire({
                    title: "Success!",
                    text: "Billed Successfully!",
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
        $insert_query1 = "update past_bill set previous_reading = '$curr_reading' where customer_id = '$uid'";
        $db_connection -> query($insert_query1);

    }
?>