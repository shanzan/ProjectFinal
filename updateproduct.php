<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$c=$_GET["p"];
$price=$_GET["pro"];
$no=$_GET["no"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$query="update productinformation set productPrice=".$price.",availableitem='".$no."' where name='".$c."'";
if(mysqli_query($link,$query)){
     header("location:admin.php");
}
else {
   echo  "Error: ". mysqli_error($link);
}

mysqli_close($link);
?>