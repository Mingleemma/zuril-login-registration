<?php
include_once 'connection.php';
include 'query.php';

session_start();

if(count($_SESSION) != 0){
    //session area
    $firstname= $_SESSION['fname'] ;
    $lastname= $_SESSION['lname'] ;
    $userid =  $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<style>
    .header{
        padding:2px;
        text-align: center;
    }
    .form{
        border: 1px solid #FB6600;
        padding:5px;
        font-size:20px;
        text-align:center;
        margin: auto;
        width:25%;
    }
    
</style>
<body>
        <div class="header">
            <h1>  RESET PASSWORD <h1>
            <h2> PLEASE ENTER YOUR EMAIL ADDRESS AND NEW PASSWORD BELOW <h2>
        </div>
        <div class="form">
            <form method="POST">                                    
                <input type="email" id="email" name="email" placeholder="test@email.com"><br><br>
                <input type="password" id="pword" name="pword" placeholder="PASSWORD"><br><br>
                <input type="password" id="cpword" name="cpword" placeholder="CONFIRM PASSWORD"><br><br>
                <input type="submit" name="submit" value="submit">                
            </form>
        </div>
        <?php 

        if(isset($_POST['submit'])){

            $newpassword= $_POST['pword'];
            $confirmpassword = $_POST['cpword'];
            $emailinput=$_POST['email'];
            $message='';
           
        
            if(empty($emailinput)) {
                $message .= "<li>Email cannot be empty</li>";
            }
            if(empty($newpassword)) {
                    $message .= "<li>Password cannot be empty</li>";
                }
            if(empty($confirmpassword)) {
                    $message .= "<li>Password cannot be empty</li>";
                }

                if(!empty($message)) {
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }else{
                    //get email from database
                    $connection = OpenCon();
                    $sqlQuery= searchuseremail($emailinput);
                    $result=QueryCon($connection, $sqlQuery);                   
                    if ($result->num_rows > 0) {
                        $info = $result->fetch_assoc();
                        $count =  $info['ct'];                                                 
                    }
                    //check if email address matches the one in the database
                    //if it does not match,
                    if ($count == 0) {
                        echo "<script type='text/javascript'>alert('Please sign up for a new account');</script>";         
                   }else{
                    //if the email matches, update information based on userid                   
                    $dataQuery=updateuserpassword ($emailinput, $newpassword);
                    $data=QueryCon($connection, $dataQuery);
                    if ($data === TRUE) {
                    //if successful,
                    echo "<script type='text/javascript'> alert('New Password Successfully Added, You can sign in now');</script>";
                    header("Location: landing.php");  
                    exit;                      
                    }                        
                       
                   }
                //    header("Location: landing.php");               
                //    exit;
                }
        }

        ?>
</body>
</html>
<?php }else {
     header("Location: landing.php");
} ?>