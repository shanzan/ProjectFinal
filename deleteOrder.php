<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }

$deleteNo=$_GET["q"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$query1="Delete from temporder where temporderID='".$deleteNo."';";
$res1=mysqli_query($link,$query1)or die(mysqli_error_list($link));
if($deleteNo==0){
         echo "<h3 style='text-align:center'>You do not select any item</h3>";
}
else if($res1){
         echo "<h3 style='text-align:center'>Your selected order successfully Deleted</h3>";
}else {
         echo "Some error".mysqli_error($link);
}
mysqli_close($link);
?>