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
            $sqlquery="INSERT INTO zuri VALUES('$email', '$password')";
            $result = QueryCon($connection, $sqlquery);
            if($result){
                $_SESSION['email'] = $email;
                header('location: main.php');
            }
            else{
                header('location: signup.php');
            }
        }  
    }
?>