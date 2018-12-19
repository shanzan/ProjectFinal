<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
    $deleteNo=$_GET["q"];
$delquery="Delete from userorder where orderid='".$deleteNo."';";
$re=mysqli_query($link,$delquery)or die(mysqli_error_list($link));
if($deleteNo==0){
         echo "<h3 style='text-align:center'>You do not select any item</h3>";
}
else if($re){
         echo "<h3 style='text-align:center'>The Requested Order deleted</h3>";
}else {
         echo "Some error".mysqli_error($link);
}
mysqli_close($link);
?>