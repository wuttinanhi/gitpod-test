<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";
