<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$deleten=$_GET["q"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$query1="Delete from productinformation where name='".$deleten."';";
$res1=mysqli_query($link,$query1)or die(mysqli_error_list($link));
if($res1){
         echo "<h3 style='text-align:center'>Your selected Product successfully Deleted</h3>";
}else {
         echo "Some error".mysqli_error($link);
}
mysqli_close($link);
?>