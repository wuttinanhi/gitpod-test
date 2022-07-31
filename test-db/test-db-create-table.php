<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $create_table_sql = "
        CREATE TABLE IF NOT EXISTS test (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
    ";

    // sql to drop table
    $drop_table_sql = "DROP TABLE IF EXISTS test";

    // use exec() because no results are returned
    $conn->exec($create_table_sql);
    echo "Table test created successfully <br>";

    $conn->exec($drop_table_sql);
    echo "Table test drop successfully";
} catch (PDOException $e) {
    echo $create_table_sql . "<br>" . $e->getMessage();
}

$conn = null;
