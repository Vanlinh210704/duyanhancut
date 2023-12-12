<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $origin = $_GET['origin'];
        $destination = $_GET['destination'];
        $duration = $_GET['duration'];
        require 'index.php';
        // create sql to insert date
        $sql = "INSERT INTO flights (origin, destination, duration) VALUE ('$origin', '$destination', '$duration')";
        // $sql = "INSERT INTO passengers"
        // run the sql query
        //$conn -> query($sql);        //chạy lại 1 lần

    // KIỂM TRA
// Bắt buộc khi insert giá trị phải có $conn -> query($sql);
        if ($conn->query($sql) === TRUE) {
            echo "New flight create successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn -> close();
    ?>
</body>
</html>