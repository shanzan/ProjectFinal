<?php
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$abcd=$_POST["name"];
$email=$_POST["email"];
$feedbac=$_POST["feedback"];
$sql="insert into  feedback(fname,femail,ffeddback,date)
value('".$abcd."','".$email."','".$feedbac."','".date("Y-m-d")."')";
 if(mysqli_query($link,$sql)){
                  header('location:homepage.html');
            }
mysqli_close($link);
?>