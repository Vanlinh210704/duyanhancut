<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="JS/registerJS.js"></script>
</head>

        <!-- BACKEND -->
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
            // KIỂM TRA EMAIL
            $sqlSelectStudentCheckEmail = "SELECT * FROM account WHERE email='$email'";
            $resurlSelectStudentCheckEmail = $conn->query($sqlSelectStudentCheckEmail);
            // KIỂM TRA TÊN ĐĂNG NHẬP
            $sqlSelectStudentCheckUser = "SELECT * FROM account WHERE user_name='$userName'";
            $resurlSelectStudentCheckUser = $conn->query($sqlSelectStudentCheckUser);
            if($resurlSelectStudentCheckEmail->num_rows>0){
                $emailFail = "Email name is already taken, please enter another email.";
            } elseif($resurlSelectStudentCheckUser->num_rows>0){
                $userFail = "Username is already taken, please enter another username.";
            } else {
                if($conn->query($sqlInsertInto)){
                    header('location: login.php');
                }
            }
    }
    ?>
<body>
    <header>
        <div class="home-page">
            <div class="logo">
                <div class="item-logo">
                    <img src="image/img-british-council.jpg" title="british_council" class="img-logo">
                </div>
                <div class="item-logo">
                    <h2 class="title-header">LearnEnglish</h2>
                </div>
            </div>
            <div class="account">
                <div class="item-account"><a class="text-item-acc text-left" href="login.php">Login</a></div>
                <div class="item-account"><a class="text-item-acc text-right" href="register.html">Register</a></div>
            </div>
        </div>
        <nav class="menu">
            <div class="item-menu"><a class="text-item-menu" href="interface.html">Home</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">Online Courses</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">Skills</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">Grammar</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">Vocabulary</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">Business English</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">General English</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">Learning hub</a></div>
            <div class="item-menu"><a class="text-item-menu" href="">English levels</a></div>
        </nav>
    </header>
    <content>
        <h1 class="text-register">Create new account</h1>
        <div class="input-infomation">
            <form action="" method="post">
                <p class="panel-title">Your details</p> <br>
                <b class="input-content text-input-content">First name*</b> <br>
                <input type="text" name="first-name" class="input-content input required" value='<?php if(isset($_POST['first-name'])){ echo $_POST['first-name'];} ?>'> <br> <br>
                <b class="input-content text-input-content">Surname*</b> <br>
                <input type="text" name="surname" class="input-content input required" value='<?php if(isset($_POST['surname'])){ echo $_POST['surname'];} ?>'> 
                <br>
                <br>
                <br>
                <p class="panel-title">Set up your account</p> <br>
                <b class="input-content text-input-content">Email address*</b><br>
                <input type="email" name="email" class="input-content input required" id='email' value='<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>'>
                <span class='fail' id='failEmail'><?php if(isset($emailFail)){echo $emailFail;} ?></span> <br><br>
                <b class="input-content text-input-content">Username*</b> <br>
                <input type="text" name="username" class="input-content input required" value='<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>'>
                <span class='fail'><?php if(isset($userFail)){echo $userFail;} ?></span> <br> <br>
                <b class="input-content text-input-content required">Password*</b> <br>
                <input type="password" name="password" minlength="6" class="input-content input required" id='password' value='<?php if(isset($_POST['password'])){ echo $_POST['password'];} ?>'> <br> <br>
                <b class="input-content text-input-content required">Confirm password*</b> <br>
                <input type="password" name="confirm-password" minlength="6" class="input-content input" id='re-password'>
                <span class='fail' id='fail'><?php if(isset($passwordFail)){echo $passwordFail;} ?></span>
                <br>
                <br>
                <br>
                <p class="panel-title">Terms of use</p>
                <br> <br> <br>
                <label class="input-form">
                    <input type="checkbox" name="confirm[]" value='Yes' class="input-content checkbox-input">
                    <span class="text-checkbox text-checkbox-top">Yes, I would like to receive a monthly newsletter with fresh learning tips, helpful advice and offers via email about LearnEnglish and other activities, services and events provided by the British Council.</span>
                </label>
                 <br> <br> <br>
                <label class="input-form-18">
                    <input type="checkbox" name="confirm[]" value='Yes' class="input-content checkbox-input">  
                    <span class="text-checkbox">I am 18 years old or above.</span>  
                </label>
                <br><br><br>
                <label class="buttom">
                    <input type="submit" value="Create new account" name='submit' class="create">
                </label>
                <br>
                
            </form>
            <form action="login.php">
                <label class="buttom-select-login">
                    <input type="submit" value="Log in" class="login">
                </label>
                <br>
                <br>
                <br>
            </form>
        </div>
    </content>
    <footer class="footer">
        <div class="box-footer">


            <div class="content-footer-left">
                <div class="header-menu-footer"><p>Learn English British Council</p></div>
                <div class="footer-left">
                    <a href="" target="_blank" class="text-content-footer-left"><i class="item-footer-left fa-solid fa-location-dot"></i>10 Tran Phu, Ha Dong</a>
                </div>
                <div class="footer-left">
                    <a href="tel:018001299" target="_blank" class="text-content-footer-left"><i class="item-footer-left fa-solid fa-phone"></i>018001299</a>
                </div>
                <div class="footer-left">
                    <a href="mailto:bchanoi@britishcouncil.org.vn" target="_blank" class="text-content-footer-left"><i class="item-footer-left fa-solid fa-envelope"></i>bchanoi@britishcouncil.org.vn</a>
                </div>
                <div class="bottom-left-footer">
                    <div><a href="https://www.facebook.com/" target="_blank"><i class="item-footer-left-bottom fa-brands fa-facebook fa-2xl"></i></a></div>
                    <div><a href="https://www.tiktok.com/vi-VN/" target="_blank"><i class="item-footer-left-bottom fa-brands fa-tiktok fa-2xl"></i></a></div>
                    <div><a href="https://www.instagram.com/" target="_blank"><i class="item-footer-left-bottom fa-brands fa-square-instagram fa-2xl"></i></a></div>
                    <div><a href="https://www.youtube.com/" target="_blank"><i class="item-footer-left-bottom fa-brands fa-youtube fa-2xl"></i></a></div>
                    <div><a href="https://twitter.com/?lang=vi" target="_blank"><i class="item-footer-left-bottom fa-brands fa-twitter fa-2xl"></i></a></div>
                </div>
            </div>


            <div class="content-footer-center">
                <div class="header-menu-footer"><p>Access</p></div>
                <div class="footer-center">
                    <div class="footer-center-nav">
                        <a href="" class="item-footer-center">Home</a>
                        <a href="" class="item-footer-center">Online Course</a>
                        <a href="" class="item-footer-center">Skills</a>
                        <a href="" class="item-footer-center">Grammar</a>
                        <a href="" class="item-footer-center">Vocabulary</a>
                    </div>
                    <div  class="footer-center-nav">
                        <a href="" class="item-footer-center">Business</a>
                        <a href="" class="item-footer-center">General English</a>
                        <a href="" class="item-footer-center">Learning hub</a>
                        <a href="" class="item-footer-center">English Levels</a>
                    </div>
                </div>
            </div>


            <div class="content-footer-right">
                <div class="header-menu-footer"><p>British Council</p></div>
                <div class="footer-right"><p>
                    The United Kingdom's international organisation
                    for cultural relations and educational opportunities.
                    A registered charity: 209131 (England and Wales) SC037733 (Scotland).
                </p></div>
            </div>
        </div>
    </footer>
</body>
</html>