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
        // Tạo câu truy vấn với filghts là tên bảng, id tên id 
        $result = mysqli_query($conn, "SELECT * FROM flights WHERE id=5");
        // Lấy giá trị từ kết quả truy vấn
        $row = mysqli_fetch_array($result);
        // In ra với giá trị destination là cái muốn in
        echo $row['destination'];
        mysqli_close($conn);
    ?>
</body>
</html>