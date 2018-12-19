<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }


?>
<?php
    if(isset($_FILES['pname'])){
      $file_name = $_FILES['pname']['name'];
      $file_size =$_FILES['pname']['size'];
      $file_tmp =$_FILES['pname']['tmp_name'];
        if(move_uploaded_file($file_tmp,"image/product/".$file_name)){
          $pname=$_POST["proname"];
          $proinfo=$_POST["pinfo"];
          $cataname=$_POST["browser"];
          $proprice=$_POST["pprice"];
          $noofproduct=$_POST["nofproduct"];
      $link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');     
      $catagory="select * from productcatagory where catagoryName='".$cataname."'";
      $res=mysqli_query($link,$catagory)or die(mysqli_error_list($link));

      while($row=mysqli_fetch_array($res)){
        $catid=(int)$row["catagoryId"];
        echo $catid;
$query="Insert into productInformation (name, productInformation, catagoryId, productPrice, availableitem, imagename,totalorder)
     VALUES ('$pname','$proinfo',$catid,$proprice,$noofproduct,'$file_name',0)";
                  if (mysqli_query($link,$query)) {
                      header("location:admin.php");
                  } else {
                  echo "Error: ". mysqli_error($link);
                  }
      }  
      mysqli_close($link);      
   }
                 else {
                 echo "false";
        }
   }

?>