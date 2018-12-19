<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');         
$get1=$_GET["n"];
$sql="Select * from userinformation where userName='".$get1."'";
$query=mysqli_query($link,$sql)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($query))
                           {
                                echo "<h3>".$ro1["feedBack"]."</h3>";
                           }
?>