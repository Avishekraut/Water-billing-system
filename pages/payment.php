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
    <title>Payment| Water Billing System</title>
</head>
<body>
    <section class="payment-page">
    <form action="#" class="amount-input">
        <label for="amount">Enter the amount you want to pay:</label>
        <input type="text" id="amount" name="amount" value="<?php session_start(); echo $_SESSION["totalAmount"];?>" placeholder="Amount">
    </form>
    <h2>How do you want to pay?</h2>
    <div class="bank-option">
        <h3>Pay via bank :</h3>
        <button class="btn-bank" onclick="redirectPage('nmb')"><img src="../assets/nmb.png"width="130" height="35"></button>
        <button class="btn-bank" onclick="redirectPage('prabhu')"><img src="../assets/prabhu.png"width="130" height="35"> </button>
        <button class="btn-bank" onclick="redirectPage('globalime')"><img src="../assets/Gibl.png"width="130" height="35"> </button>
    </div>
    <div class="wallet-option">
        <h3>Pay via mobile wallet :</h3>
        <button class="btn-bank" onclick="redirectPage('esewa')"><img src="../assets/esewa.png"width="130" height="35"> </button>
        <button class="btn-bank" onclick="redirectPage('khalti')"><img src="../assets/khalti.png"width="130" height="35"> </button>
        <button class="btn-bank" onclick="redirectPage('imepay')"><img src="../assets/imepay.png"width="130" height="35"> </button>
    </div>
    </section>
</body>
</html>