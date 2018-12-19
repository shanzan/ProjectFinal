<?php
 @ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$uid=$_GET["un"];
$proname=$_GET["p"];
$noitem=$_GET["n"];
$proprice="";
$usid="";
$proid="";
$query="select * from userinformation where userId='".$uid."';";
$res=mysqli_query($link,$query)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res))
                           {    
                                $usid=$row["userid"];
                              
                           }
$query1="select * from productinformation where name='".$proname."';";
$res1=mysqli_query($link,$query1)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res1))
                           {    $proid=$row["productId"];
                                $proprice=$row["productPrice"]*$noitem;
                                $availitem=$row["availableitem"];
                           }
$order="Insert into userorder(userId,productId,totalitemno,totalprice,orderDate)
                  values('$usid','$proid','$noitem','$proprice','".date("Y-m-d")."')";
        if($noitem<$availitem){
 if(mysqli_query($link,$order)){
    echo "<h3 style='text-align:center'>Selected ORDER Successfull</h3>";
}else {
    echo  "Error: ". mysqli_error($link);
}
        }else {
            echo "<h3 style='text-align:center'>Product not available</h3>";
        }
mysqli_close($link);

 ?>