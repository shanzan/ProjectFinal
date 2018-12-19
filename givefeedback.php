<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
$abcd=$_GET["pros"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$sql="UPDATE `userinformation` SET `feedBack`='".$abcd."' where userId='".$_SESSION["id"]."';";
 if(mysqli_query($link,$sql)){
                  header('location:customer.php');
            }
            else {
             echo  mysqli_error_list($link);
            }
mysqli_close($link);
?>