<?php
    include_once 'connection.php';
    session_start();

    if(isset($_POST)){
        if(isset($_POST['login'])){
            $sqlquery="SELECT count(*) as ct FROM users WHERE email = '$email'";
            $result=$connection->query($sqlquery);
            echo $result;
            
        }
        elseif(isset($_POST['signup'])){
            echo "We are here";
        }  
    }
?>