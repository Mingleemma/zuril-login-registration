<?php
    if(isset($_POST)){
        if(isset($_POST['login'])){
            echo "We were there";
        }
        elseif(isset($_POST['signup'])){
            echo "We are here";
        }  
    }
?>