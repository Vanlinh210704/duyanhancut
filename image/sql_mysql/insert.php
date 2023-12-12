<?php
    // connect to the database
    require 'index.php';
    // create sql to insert date
    $sql = "INSERT INTO flights (origin, destination, duration) VALUE ('New York', 'England', '700')";
    // $sql = "INSERT INTO passengers"
    // run the sql query
    $conn -> query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "New flight create successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
?>