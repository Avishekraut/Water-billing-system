<?php
    // Ensuring Database Connection
    $servername = '127.0.0.1'; // servername/ip of server host.
    $username = 'root'; // name of user to connect with.
    $password = ''; // user's password.
    $database = 'wbs_db'; // database you want to connect with.

    $db_connection = new mysqli($servername, $username, $password, $database); // creating database connection by making a new object.
    if ($db_connection -> connect_error) {
        die('<h1>Connection failed: ' .$db_connection -> connect_error. '</h1>'); // prompt this message if any error occurs while creating database connection.
    }
?>