<?php
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$name=$_GET["q"];
$query1="select * from productinformation
                           INNER JOIN productcatagory
                           ON productinformation.catagoryId=productcatagory.catagoryId
                           WHERE productcatagory.catagoryName='".$name."'
                           ORDER BY productinformation.name;";
                  $res1=mysqli_query($link,$query1)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res1))
                           {
                           echo "<option value=".$row['name'].">".$row['name']."</option>";
                           }
mysqli_close($link);
?>  