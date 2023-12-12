<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['origin'])) {
            $origin = $_GET['origin'];
            $destination = $_GET['destination'];
            $duration = $_GET['duration'];
        }
        require 'index.php';
        // create sql to insert date
        $sql = "INSERT INTO flights (origin, destination, duration) VALUE ('$origin', '$destination', '$duration')";
        // $sql = "INSERT INTO passengers"
        // run the sql query
        // $conn -> query($sql);        chạy lại 1 lần
        if ($conn->query($sql) === TRUE) {
            echo "New flight create successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn -> close();
    ?>
    <h1>ADD NEW FLIGHT</h1>
    <form action="insert_input.php" method="GET">
        <p>Origin: </p>
        <input type="text" name="origin" value=<?php echo $_GET['origin']; ?>>
        <p>Destination: </p>
        <input type="text" name="destination" value=<?php echo $_GET['destination']; ?>>
        <p>Duration: </p>
        <input type="number" min="0" placeholder="0" name="duration" value=<?php echo $_GET['duration']; ?>>
        <input type="submit" value="submit">
    </form>

</body>
</html>