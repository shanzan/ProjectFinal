<?php
// @ob_start();
// session_start();
// if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
//                 header ("Location:homepage.html");
//             }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$name=trim($_GET["p"]);
//show from product information
$query1="select * from productinformation where name='".$name."';";
                  if($res1=mysqli_query($link,$query1)or die(mysqli_error_list($link))){
                           if ($row = mysqli_fetch_array($res1))
                           {
//

?>
<style>
/*image style*/
#image11{
         position:relative;
         left : 5%;
         width :90%;
         height :300px;
}
#somep{
         position:relative;
}

</style>
<div>
    <img id="image11" src="image/product/<?php echo  $row["imagename"]; ?>" >
<br/>
                <div  id="somep">
                            <p>Product Name: <?php echo trim($row["name"]); ?><br/>
                            Product Information: <?php echo $row["productInformation"]; ?><br/>
                            Date Inserted:<?php echo $row["insertdate"]; ?><br/>
                            Product Price:<?php echo $row["productPrice"]; ?><br/>
                            Item Avaiable:<?php echo $row["availableitem"]; ?></p>
                </div>
        </div>
<?php
    $abcd=$row["totalviewp"]+1;
    $update="update productinformation set totalviewp='".$abcd."'where name='".$row["name"]."';";
    mysqli_query($link,$update)or die(mysqli_error_list($link));
                           }
                  }else {
                      echo "<h3>Nothing found with this name</h3>";
                  }
mysqli_close($link);
?>
