<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$proname=$_GET["p"];
$noitem=$_GET["n"];
$id=$_SESSION["id"];
$query1="select * from productinformation where name='".$proname."';";
$res1=mysqli_query($link,$query1)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res1))
                           {    $proprice=$row["productPrice"]*$noitem;
$order="Insert into temporder (userid,ProductName,price,noofitem)
                  values('$id','$proname','$proprice','$noitem')";
        if($noitem<$row["availableitem"]){
 if(mysqli_query($link,$order)){
    echo "<h3 style='text-align:center'>Selected ORDER Successfull</h3>";
}else {
    echo  "Error: ". mysqli_error($link);
}
        }else {
            echo "<h3 style='text-align:center'>Product no available</h3>";
        }
                           }
mysqli_close($link);
?>