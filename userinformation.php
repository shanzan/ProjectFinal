<?php
$name=$_POST["name"];$p_no=$_POST["p_no"];$bkash=$_POST["bkp_no"];$mail=$_POST["email"];
$age=$_POST["age"];$pass=md5($_POST["pass"]);$address=$_POST["add"];$bike=$_POST["bik"];
$desiredbike=$_POST["desbike"];
$m="";$n="";$o="";
$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');

$check="select * from userInformation where userName='".$name."'";
$res=mysqli_query($link,$check);
while($row=mysqli_fetch_array($res)){
	$m=$row["userName"];
         $n=$row["userPhnNo"];
         $o=$row["userEmail"];
}
if($m==$name && $n==$p_no && $o==$mail){
         echo "<br/>You already registered<br/>";
}else {
 $query="Insert into userinformation (userName,userpassward,userAddress,userEmail,userage,userPhnNo,userBkashNo,userBike,userDesiredBike,userviews,userOrder) 
                  values('$name','$pass','$address','$mail','$age','$p_no','$bkash','$bike','$desiredbike','1','0')";
                  if (mysqli_query($link,$query)) {
                           echo "alert(You sucessfully create a account)";
                           header('location:homepage.html');
                  } else {
                  echo "Error: ". mysqli_error($link);
                  }        
}
mysqli_close($link);
?>