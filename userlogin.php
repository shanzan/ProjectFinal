<?php
session_start();
$yourName=$_POST["n_0u"];
$yourPass=md5($_POST["n_0p"]);
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$query="select * from userinformation where userName='".$yourName."' and userpassward='".$yourPass."'";
$res=mysqli_query($link,$query)or die(mysqli_error_list($link));

while($row=mysqli_fetch_array($res)){
         $dbu=$row["userName"];
         $dbp=$row["userpassward"];
         $dbm=$row["userid"];
         $dbv=$row["userviews"]+1;
$upquery="update userinformation set userviews='".$dbv."'where userName='".$yourName."'";
         if($dbu==$yourName && $dbp==$yourPass && $row["usertype"]==1){
        if(mysqli_query($link,$upquery)){
                $_SESSION["view"]=$dbu;
                $_SESSION["p"]=$dbp;
                $_SESSION["id"]=$dbm;
                $_SESSION["admin"]="admin";
                header('location:admin.php');
                 }
         }
         else if($dbp==$yourPass && $dbu==$yourName && $row["usertype"]==0){
               if(mysqli_query($link,$upquery)){
                 $_SESSION["view"]=$dbu;
                 $_SESSION["p"]=$dbp;
                 $_SESSION["id"]=$dbm;
                 $_SESSION["admin"]="";
                 header('location:customer.php');
               }
         }
         else {
                  echo "error";
         }
}
mysqli_close($link);
?>
<html>
<head>
<link rel="stylesheet" href="page.css">  
</head>
<body>
<div class='modal-content animate'>
<h3>Wrong username or password<br/>
<a href="homepage.html">Go Back to homepage</a>
</h3>
</div>
</body>
</html>