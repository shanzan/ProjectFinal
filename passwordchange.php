<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
$pass1=md5($_POST["pass1"]);
$newpass=md5($_POST["newpass"]);

if($pass1==$_SESSION["p"]){
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$query1="UPDATE userinformation SET userpassward='".$newpass."' where userpassward='".$pass1."' and userId='".$_SESSION["id"]."';";
if(mysqli_query($link,$query1)or
 die(mysqli_error_list($link))){
    if($_SESSION["admin"]=="admin"){
        $_SESSION["p"]=$newpass;
         header("location:admin.php");
    }else {
        $_SESSION["p"]=$newpass;
         header("location:customer.php");
    }
}
mysqli_close($link);
}

?>
<html>
<head>
<link rel="stylesheet" href="page.css">  
</head>
<body>
<div class='modal-content animate'>
<h3>Prvious passward didn't match<br/>
<?php
if($_SESSION["admin"]=="admin"){
    echo "<a href='admin.php'>Back to your page</a>";
}
else if($_SESSION["admin"]==""){
    echo "<a href='customer.php'>Back to your page</a>";
}
?>
</h3>
</div>
</body>
</html>