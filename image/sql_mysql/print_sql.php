<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require 'index.php';
        $result = mysqli_query($conn, "SELECT * FROM flights");
        while ($row = mysqli_fetch_array($result)) {
            echo $row['origin'] . "<br>";  
            echo $row['destination'] . "<br>";
            echo $row['duration'] . "<br>"; 
            echo "<br><br><br><br>";
        }
        mysqli_close($conn);
    ?>
</body>
</html>