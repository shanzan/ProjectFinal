<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
            $avilitem="";
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$getfromTempOrder="select * from temporder where userid='".$_SESSION["id"]."';";
$res1=mysqli_query($link,$getfromTempOrder)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res1))
                           {
$ProductName="select * from productinformation where name='".$row['ProductName']."';";
$res2=mysqli_query($link,$ProductName)or die(mysqli_error_list($link));
while($row1=mysqli_fetch_array($res2)){
         $productid=$row1["productId"];
         $avilitem=$row1["availableitem"];
}
$userid="select * from userinformation where userId='".$_SESSION["id"]."';";
$res3=mysqli_query($link,$userid)or die(mysqli_error_list($link));
while($row2=mysqli_fetch_array($res3)){
         $useid=$row2["userid"];
}
if($row['noofitem']<$avilitem){
    $inserttoOrder="Insert into userorder (userId,productId,totalitemno,totalprice,orderDate)
                  values($useid,$productid,".$row['noofitem'].",".$row['Price'].",'".date("Y-m-d")."')";
                  if(mysqli_query($link,$inserttoOrder)){
$deletefromtemporder="delete from temporder where userId='".$_SESSION["id"]."';";
                  if(mysqli_query($link,$deletefromtemporder)){
                           echo "<h3>successfully Confirmed</h3>";
                  }else {
                           echo "ORDER NOT CONFIRMED";
                  }      

                  }else{
                           echo "Confirm not successfull".mysqli_error($link);
                  }
                           }
                           else {
                               echo "please delete the product ".$row['ProductName']."<br/> because the number of product you entered is already sold or not avaiable";
                           }
}

mysqli_close($link);
?>