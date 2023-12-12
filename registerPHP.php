<?php
        if(isset($_POST['first-name']) AND 
        isset($_POST['surname']) AND 
        isset($_POST['email']) AND
        isset($_POST['username']) AND
        isset($_POST['password']) AND
        isset($_POST['confirm-password']) AND
        isset($_POST['confirm'])){
            $firstName = $_POST['first-name'];
            $surName = $_POST['surname'];
            $email = $_POST['email'];
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            $confirm = $_POST['confirm'];
            var_dump($password);
            var_dump($confirmPassword);
            echo $password;
            echo $confirmPassword;
            require 'connDatabase.php';
            $sqlInsertInto = "INSERT INTO account(first_name, sur_name, email, user_name, password) VALUE ('$firstName', '$surName', '$email', '$userName', '$_POST[password]')";
            if($_POST['password'] == $_POST['confirm-password']){
                $sqlSelectStudentCheckEmail = "SELECT * FROM account WHERE email='$email'";
                $resurlSelectStudentCheckEmail = $conn->query($sqlSelectStudentCheckEmail);
                if($resurlSelectStudentCheckEmail->num_rows>0){
                    echo ""
                }
        }
    ?>