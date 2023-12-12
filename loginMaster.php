<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN MASTER</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>
    <?php
        if(isset($_POST['user-name']) AND isset($_POST['password'])){
            $userNameLogin = $_POST['user-name'];
            $passwordLogin = $_POST['password'];
            require 'connDatabase.php';
            // session_start();
            // KIỂM TRA TÀI KHOẢN HIỆU TRƯỞNG
            $sqlSelectLoginUserMaster = "SELECT * FROM teachers WHERE user_name='$userNameLogin'";
            $resurlLoginUserMaster = $conn->query($sqlSelectLoginUserMaster);
            $sqlSelectLoginPasswordMaster = "SELECT * FROM teachers WHERE password='$passwordLogin'";
            $resurlLoginPasswordMaster = $conn->query($sqlSelectLoginPasswordMaster);
            // KIỂM TRA
            if($resurlLoginUserMaster->num_rows==0){
                $userLoginFail = "Username does not exist";
                echo $userLoginFail;
            } elseif($resurlLoginPasswordMaster->num_rows==0){
                $passwordLoginFail = "Incorrect password";
                echo $passwordLoginFail;
            } else{
                echo "success";
                $row = $resurlLoginUserMaster->fetch_assoc();
                $userName = $row['user_name'];
                $position = $row['position_name'];
                session_start();
                $_SESSION['user_name'] = $userName;
                $_SESSION['position_name'] = $position;
                header('location: homeMaster.php');
            }
        }
        
    ?>
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
                <div class="item-account"><a class="text-item-acc text-left" href="login.html">Login</a></div>
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
        <h1 class="text-register">Log in master</h1>
        <div class="login-input">
            <form action="" method="post">
                <p class="panel-title">Login Master</p> <br>
                <b class="input-content text-input-content">Username*</b> <br>
                <input type="text" name="user-name" class="input-content input">
                <span><?php if(isset($userLoginFail)){echo $userLoginFail;} ?></span> <br> <br>
                <b class="input-content text-input-content">Password*</b> <br>
                <input type="password" name="password" class="input-content input">
                <span><?php if(isset($passwordLoginFail)){echo $passwordLoginFail;} ?></span>
                <br><br>
                <label class="buttom">
                    <input type="submit" value="Login" class="buttom-login">
                </label>
                <br>
            </form>
            <form action="register.php" class="item-button-extra">
                    <lable class="register-account">
                        <input type="submit" value="Register" class="buttom-register">
                    </lable>
            </form>
            
            <br><br><br>
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