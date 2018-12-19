<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }
?>
<?php          
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');  
    $catname=$_POST["cname"];
     $catinfo=$_POST["cinformation"];
    $query="Insert into productcatagory (catagoryName,catagoryInformation)
     VALUES ('$catname','$catinfo')";
                  if (mysqli_query($link,$query)) {
                        header("location:admin.php");
                  } else {
                  echo "Error: ". mysqli_error($link);
                  }  
                  mysqli_close($link);  
?>