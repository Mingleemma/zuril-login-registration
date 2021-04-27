<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "zuri";

    $connection = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
    function QueryCon($connection, $sqlquery){
        $result=$connection->query($sqlquery);
        return $result;
    }

    function CloseCon($connection){
        $connection -> close();
    }
   
?>