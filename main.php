<?php
    include_once 'connection.php';
    session_start();

    if( $_SESSION['email'] ){
    $firstname = $_SESSION['email'];

?> 
    <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Zuri System - Login</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		
    <center><h2>Welcome to Course Dashboard</h2><center>
    <div style="content-align:right">
        Add New Course<br>
        <form action="ops.php" method="post">
            <input type="text" name="coursecode" placeholder="Enter a new course code" required>
			&bull;
            <input type="text" name="coursename" placeholder="Enter a new course name" required>
            <br><br>
            <input type="submit" value="SUBMIT" name="newcourse">
        </form>
    </div>
		<p style="color:red; text-align: center">
            <table border=1 style="width:80%">
                <tr width="100%">
                    <td>CourseCode</td>
                    <td>Course</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>

                <tr>
                    <td>PHP101</td>
                    <td>introduction to PHP</td>
                    <td><a href="ops.php?del=php101">Delete</a></td>
                    <td><a href="ops.php?edit=php101">Edit</a></td>
                </tr>
            </table>
		</p>
	</body>
</html>
<?php
    }
    else{
        header('location: index.php');
    }
?>