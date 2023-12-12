<?php
    $userlLogin = $_POST['user-name'];
    $passwordLogin = $_POST['password'];
    require 'connDatabase.php';
    $sqlSelect = "SELECT * FROM account";
    $resurlSqlSelect = $conn->query($sqlSelect);
    for($i=0;$i<$resurlSqlSelect->num_rows;$i++){
        if($resurlSqlSelect->num_rows > 0) {
            $row = $resurlSqlSelect->fetch_assoc();
            if($userlLogin==$row['user_name'] AND $passwordLogin==$row['password']){
                header('location: homeLogin.html');
            } else {echo "Sai ten đăng nhaaoj ";}
        }
    }
?>