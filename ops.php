<?php
    include 'connection.php';
    session_start();

    if(isset($_POST)){
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $sqlquery="SELECT * FROM users WHERE email = '$email'";
            $result = QueryCon($connection, $sqlquery);
            if($result){
                $_SESSION['email'] = $email;
                header('location: main.php');
            }
            else{
                header('location: index.php');
            }
            
        }
        elseif(isset($_POST['signup'])){
            $email = $_POST['email'];
            $passwd = $_POST['password'];
            $sqlquery="INSERT INTO users VALUES('$email', '$password')";
            $result = QueryCon($connection, $sqlquery);
            if($result){
                $_SESSION['email'] = $email;
                header('location: main.php');
            }
            else{
                header('location: signup.php');
            }
        }
        elseif(isset($_POST['newcourse'])){
            $coursecode = $_POST['coursecode'];
            $coursename = $_POST['coursename'];
            $sqlquery="SELECT * FROM courses WHERE coursecode='$coursecode' AND coursename='$coursename')";
            $result = QueryCon($connection, $sqlquery);
            if(!$result){
                $sqlquery = "INSERT INTO courses VALUES('$coursecode', '$coursename')";
                $result = QueryCon($connection, $sqlquery);
                header('location: main.php');
            }
            else{
                echo "Course Already Exists<br>";
                echo "Click <a href='main.php'>here</a> to return to the main page";
            }
        }  
    }
?>