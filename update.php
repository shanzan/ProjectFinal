<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
$name=$_POST["name"];$p_no=$_POST["p_no"];$bkash=$_POST["bkp_no"];$mail=$_POST["email"];
$age=$_POST["age"];$address=$_POST["add"];$bike=$_POST["bik"];
$desiredbike=$_POST["desbike"];
$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$query="Update userInformation SET userName='".$name."',userAddress='".$address."',userEmail='".$mail."',userage='".$age."',userPhnNo='".$p_no."',userBkashNo='".$bkash."',userBike='".$bike."',userDesiredBike='".$desiredbike."' where userId='".$_SESSION["id"]."';";
           if(mysqli_query($link,$query)){
            if($_SESSION['admin']==''){
              $_SESSION["view"]=$name;
                  header('location:customer.php');
            }else {
              $_SESSION["view"]=$name;
                  header('location:admin.php');
            }
                    
           }
mysqli_close($link);
?>