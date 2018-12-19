<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$usid=$_GET["p"];$userno="";$orderno="";$noofproduct=""; $nooforder="";
$totalitem="";$totaltransit="";$itemnoproduct="";$itemorder="";
//
//find user  user name by id
$findorder="select * from userinformation where userId='".$usid."'";
$res2=mysqli_query($link,$findorder)or die(mysqli_error_list($link));
while ($row= mysqli_fetch_array($res2)) {
        $userno=$row["userid"];
        $nooforder=$row["userOrder"];
        $totalitem=$row["totalproduct"];
        $totaltransit=$row["totaltransit"];
        $username=$row["userName"];

}
//find all order by userid 
$findorder="select * from userorder where userid='".$userno."' and deliveredornot='0'";
$res=mysqli_query($link,$findorder)or die(mysqli_error_list($link));
while ($row= mysqli_fetch_array($res)) {
        $orderno=$row["orderid"]; //get order id
//find product id from the order
$finditemfromorder="select * from userorder where orderid='".$orderno."'";
$res11=mysqli_query($link,$finditemfromorder)or die(mysqli_error_list($link));
while ($row11= mysqli_fetch_array($res11)) {
        $productid=$row11["productId"]; //find product id from the order
        $noofproduct=$row11["totalitemno"];//get no of item of that order
        $transit=$row11["totalprice"];
$product="select * from productinformation where productId='".$productid."'";
$res00=mysqli_query($link,$product)or die(mysqli_error_list($link));
while ($row= mysqli_fetch_array($res00)) {
        $itemnoproduct=$row["availableitem"];
        $itemorder=$row["totalorder"]+1;
}
$itemnoproduct=$itemnoproduct-$noofproduct;
$updateproduct="update productinformation set availableitem='".$itemnoproduct."',totalorder='".$itemorder."' where productId='".$productid."'";
if(mysqli_query($link,$updateproduct)){     
$saveordertable="update userorder set deliveredornot='1' where orderid='".$orderno."'";
        if(mysqli_query($link,$saveordertable)){
                $totalitem=$totalitem+$noofproduct;
                $nooforder=$nooforder+1;
                $totaltransit=$totaltransit+$transit;
$saveuser="update userinformation set userOrder='".$nooforder."',getinvoice='1',totalproduct='".$totalitem."',totaltransit='".$totaltransit."' where userId='".$userno."'";
if(mysqli_query($link,$saveuser)){
        echo "ORDER DELIVERED";
}else {
        echo "<br/>First: Error:".mysqli_error($link);
}
        }else {
                echo "<br/>Second Error:".mysqli_error($link);
        }
}else {
        echo "<br/>Third Error:".mysqli_error($link);
}
}
}



// // $itemnoproduct=$noofitem-$itemnoproduct;
// $product="select * from productinformation where productId='".$productid."'";
// $res00=mysqli_query($link,$product)or die(mysqli_error_list($link));
// while ($row= mysqli_fetch_array($res00)) {
//         $itemnoproduct=$row["availableitem"]-$noofitem;
//         $itemorder=$row["totalorder"]+1;

// }

// else if(mysqli_query($link,$saveordertable)){
// $updateproduct="update productinformation set availableitem='".$itemnoproduct."',totalorder='".$itemorder."' where productId='".$productid."'";
// if(mysqli_query($link,$saveorder)){
//         if(mysqli_query($link,$updateproduct)){
//                 echo "<h3 style='text-align:center'>The product successfully delivered</h3>";
//         }
//         else {
//          echo "some error". mysqli_error($link);
// }
// }       
// }
// mysqli_close($link);
// 
?>