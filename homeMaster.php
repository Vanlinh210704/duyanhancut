<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style-class.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <script src="JS/addClass.js"></script>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user_name'])){
            require 'connDatabase.php';
            $user = $_SESSION['user_name'];
            $sql = "SELECT * FROM teachers t JOIN position p ON t.position = p.id_position WHERE t.user_name = '$user'";
            $resurlSql = $conn->query($sql);
            if($resurlSql->num_rows>0){
                $row = $resurlSql->fetch_assoc();
                $position = $row['id_position'];
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
                    <div class="buttom-logout-to-interface">
                        <div class='hello-logout'>
                            <div class='item-hello-logout'>
                                <?php echo "<a class='logout'>". $user . "      <i class='fa-solid fa-user-tie fa-xl' style='color: #ffffff;'></i>" ."</a>";?>
                                <div class="hello-logout-drop">
                                    <a href="">Information</a>
                                    <a href="logout.php" class="">Log out</a>
                                </div>
                            </div> 
                        </div>
                        <div class="icon-menu">
                            <a href=""><i class="fa-sharp fa-solid fa-bars fa-2xl icon-item-menu"></i></i></a>
                            <div class="menu-drop">
                                <a class="text-item-menu" href="homeMaster.php">Class</a>
                                <a class="item-menu-drop" href="">Online Courses</a>
                                <a class="item-menu-drop" href="grammar.html">Teachers Management</a>
                                <a class="item-menu-drop" href="vocabulary.html">Students Management</a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="menu">
                    <div class="item-menu"><a class="text-item-menu" id='class' href="online_">Class</a></div>
                    <div class="item-menu"><a class="text-item-menu" href="skill.html">Online Courses</a></div>
                    <div class="item-menu"><a class="text-item-menu" href="grammar.html">Teacher Management</a></div>
                    <div class="item-menu"><a class="text-item-menu" href="grammar.html">Students Management</a></div>
                </nav>
                
            </header>
            <content>
                <h1>Class</h1>
                <div class='content'>
                    <div class='add-form'>
                        <div class='form-select item-content item-add-form'>
                            <form action="" method='post'>
                            <select name='select-class' class='select'>
                                <option value="all" selected='selected'>All</option>
                                <option value="yes">Select the class you are studying</option>
                                <option value="no">Select a class you haven't taken yet</option>
                            </select>
                            <input type="submit" class='submit' value='FIND'>
                            </form>
                        </div>    
                        <div class='item-add-form'>
                            <button id='add-new-class'>ADD NEW CLASS</button>   
                        </div>
                    </div>
                    <div class='item-content table'>
                        <div id='form-input-add-new-class'>
                            <form action="" class='form-add-new-class' method='post'>
                                <div class='item-form-add-new-class'>
                                    Name Class: <input type="text" name='name_new_class' class='input-add-class'>
                                </div>
                                <div class='item-form-add-new-class'>
                                    <?php
                                        $sqlQueryIDCourse = "SELECT id_course, name_course FROM course";
                                        $resurlQueryIDCourse = $conn->query($sqlQueryIDCourse);
                                        if($resurlQueryIDCourse->num_rows>0){
                                            echo "Course: ";
                                            echo "<select name='name_course_add' class='select-add-class'>";
                                                for($i=0;$resurlQueryIDCourse->num_rows>$i;$i++){
                                                    $idCourse = $row['id_course'];
                                                    $row = $resurlQueryIDCourse->fetch_assoc();
                                                    echo "<option value=$idCourse> $row[name_course] </option>";
                                                }
                                            echo "</select>";
                                        }
                                    ?>
                                </div>
                                <div class='item-form-add-new-class'>
                                    <input type="submit" value='Add New Class' class='submit-add-class'>
                                </div>
                            </form>
                        </div>
                        <br>
                    <?php
                        if(isset($_POST['select-class'])){
                            $select = $_POST['select-class'];
                            if($select=='all'){
                    ?>
                                <table class='table-class'>
                                    <tr>
                                        <th>ID CLASS</th>
                                        <th>NAME CLASS</th>
                                        <th>NUMBER STUDENT</th>
                                        <th>LECTURERS</th>
                                        <th>DETAIL</th>
                                    </tr>
                                <?php
                                    $sqlClass = "SELECT * FROM class";
                                    $resurlSqlCLass = $conn->query($sqlClass);
                                    if($resurlSqlCLass->num_rows>0) {
                                        for($i=0;$i<$resurlSqlCLass->num_rows;$i++){
                                            $row = $resurlSqlCLass->fetch_assoc();
                                            #Tên class
                                            $IDclass = $row['id_class'];
                                            # Đếm số học sinh
                                            $sqlNumberStudent = "SELECT * FROM class JOIN info_student ON class.id_class = info_student.id_class WHERE class.id_class = '$IDclass'";
                                            $resurlNumberStudent = $conn->query($sqlNumberStudent);
                                            # Giáo viên dạy 
                                            $sqlTeacher = "SELECT * FROM class JOIN teacher_care ON class.id_class = teacher_care.id_class JOIN teachers ON teacher_care.id_teacher = teachers.id_teacher WHERE class.id_class = '$IDclass'";
                                            $resurlTeacher = $conn->query($sqlTeacher);
                                            if($resurlTeacher->num_rows>0){
                                                $rowTeacher = $resurlTeacher->fetch_assoc();
                                                $nameTeacher = $rowTeacher['sur_name'] . " " .$rowTeacher['first_name'];
                                            } else {
                                                $nameTeacher = "NULL";
                                            }
                                            echo "<tr>";
                                                echo "<td>" . $row['id_class'] . "</td>";
                                                echo "<td>" . $row['name_class'] . "</td>";
                                                echo "<td>" . $resurlNumberStudent->num_rows . "</td>";
                                                echo "<td>" . $nameTeacher . "</td>";
                                                echo "<td>" . "<a class='info-class' href='#'>List</a>" . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                ?>        
                            </table>
                    <?php
                            } elseif($select=='yes') {
                    ?>
                                <table class='table-class'>
                                    <tr>
                                        <th>ID CLASS</th>
                                        <th>NAME CLASS</th>
                                        <th>NUMBER STUDENT</th>
                                        <th>LECTURERS</th>
                                        <th>DETAIL</th>
                                    </tr>
                                <?php
                                    $sqlClass = "SELECT * FROM class";
                                    $resurlSqlCLass = $conn->query($sqlClass);
                                    if($resurlSqlCLass->num_rows>0) {
                                        for($i=0;$i<$resurlSqlCLass->num_rows;$i++){
                                            $row = $resurlSqlCLass->fetch_assoc();
                                            #Tên class
                                            $IDclass = $row['id_class'];
                                            # Đếm số học sinh
                                            $sqlNumberStudent = "SELECT * FROM class JOIN info_student ON class.id_class = info_student.id_class WHERE class.id_class = '$IDclass'";
                                            $resurlNumberStudent = $conn->query($sqlNumberStudent);
                                            if($resurlNumberStudent->num_rows==0){
                                                # Giáo viên dạy 
                                                $sqlTeacher = "SELECT * FROM class JOIN teacher_care ON class.id_class = teacher_care.id_class JOIN teachers ON teacher_care.id_teacher = teachers.id_teacher WHERE class.id_class = '$IDclass'";
                                                $resurlTeacher = $conn->query($sqlTeacher);
                                                if($resurlTeacher->num_rows>0){
                                                    $rowTeacher = $resurlTeacher->fetch_assoc();
                                                    $nameTeacher = $rowTeacher['sur_name'] . " " .$rowTeacher['first_name'];
                                                } else {
                                                    $nameTeacher = "NULL";
                                                }
                                                echo "<tr>";
                                                    echo "<td>" . $row['id_class'] . "</td>";
                                                    echo "<td>" . $row['name_class'] . "</td>";
                                                    echo "<td>" . $resurlNumberStudent->num_rows . "</td>";
                                                    echo "<td>" . $nameTeacher . "</td>";
                                                    echo "<td>" . "<a href='#'>List</a>" . "</td>";
                                                echo "</tr>";
                                            }
                                            
                                        }
                                    }
                                ?>        
                                </table>
                    <?php
                            } elseif($select=='no'){
                    ?>
                                <table class='table-class'>
                                    <tr>
                                        <th>ID CLASS</th>
                                        <th>NAME CLASS</th>
                                        <th>NUMBER STUDENT</th>
                                        <th>LECTURERS</th>
                                        <th>DETAIL</th>
                                    </tr>
                                <?php
                                    $sqlClass = "SELECT * FROM class";
                                    $resurlSqlCLass = $conn->query($sqlClass);
                                    if($resurlSqlCLass->num_rows>0) {
                                        for($i=0;$i<$resurlSqlCLass->num_rows;$i++){
                                            $row = $resurlSqlCLass->fetch_assoc();
                                            #Tên class
                                            $IDclass = $row['id_class'];
                                            # Đếm số học sinh
                                            $sqlNumberStudent = "SELECT * FROM class JOIN info_student ON class.id_class = info_student.id_class WHERE class.id_class = '$IDclass'";
                                            $resurlNumberStudent = $conn->query($sqlNumberStudent);
                                            if($resurlNumberStudent->num_rows>0){
                                                # Giáo viên dạy 
                                                $sqlTeacher = "SELECT * FROM class JOIN teacher_care ON class.id_class = teacher_care.id_class JOIN teachers ON teacher_care.id_teacher = teachers.id_teacher WHERE class.id_class = '$IDclass'";
                                                $resurlTeacher = $conn->query($sqlTeacher);
                                                if($resurlTeacher->num_rows>0){
                                                    $rowTeacher = $resurlTeacher->fetch_assoc();
                                                    $nameTeacher = $rowTeacher['sur_name'] . " " .$rowTeacher['first_name'];
                                                } else {
                                                    $nameTeacher = "NULL";
                                                }
                                                echo "<tr>";
                                                    echo "<td>" . $row['id_class'] . "</td>";
                                                    echo "<td>" . $row['name_class'] . "</td>";
                                                    echo "<td>" . $resurlNumberStudent->num_rows . "</td>";
                                                    echo "<td>" . $nameTeacher . "</td>";
                                                    echo "<td>" . "<a href='#'>List</a>" . "</td>";
                                                echo "</tr>";
                                            }
                                            
                                        }
                                    }
                                ?>        
                                </table>
                    <?php
                            }
                        }
                    ?>
                    </div>
                </div>
            </content>
            <br><br>
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
    <?php    
            } else {
                echo "Fail";
            }
        } else{
            echo "fail";
        }
    ?>
    <?php
        if(isset($_POST['name_new_class'])){
            $nameNewClass = $_POST['name_new_class'];
            $idCourseAdd = $_POST['name_course_add'];
            $sqlAddNewCLass = "INSERT INTO class(id_course, name_class) VALUE ('$idCourseAdd', '$nameNewClass')";
            $resurlAddNewClass = $conn->query($sqlAddNewCLass);
        }
    ?>
</body>
</html>