<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./js/app.js" type="text/javascript"></script>
        <link rel='icon' type='image/x-icon' href='./assets/logo.ico'>
        <title>Customer Portal | Water Billing System</title>
    </head>
    <body>
        <div class="main-container">
            <div class="requestBill">
                <img src="./assets/logo.png" alt="Logo image" class="logo">
                <div class="portal-title">Water Billing System</div>
                <form action="./pages/invoice_details.php" method="post">
                    <span class="info">Branch</span>
                    <select class="branch-dropdown" name="branch">
                        <option value="unknown">Select your branch</option>
                        <option value="jamal">Jamal</option>
                        <option value="kalanki">Kalanki</option>
                        <option value="maitidevi">Maitidevi</option>
                        <option value="naxal">Naxal</option>
                        <option value="newbaneshwor">New Baneshwor</option>
                    </select>
                    <div class="form">
                        <span class="info">Customer ID</span>
                        <div class="userId">
                        <input id="userID" name="userID" type="number" placeholder="e.g. 306659" required>
                        </div>
                    </div>
                    <button type="submit" id="submit-btn" class="request-btn">Request Bill</button>
                    </div>
                </form>
                <div class="admin-login">
                    <a style="color: black;" href="./pages/login.php">Admin login</a>
                </div>
                <?php // prompt error message
                    if (isset($_REQUEST['error'])) {
                        echo '
                        <script>
                        Swal.fire({
                            title: "Error!",
                            text: "We couldn\'t fetch customer details with that id.",
                            icon: "error",
                            confirmButtonColor: "#5388eb",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "./index.php";
                            }
                        });
                        </script>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>