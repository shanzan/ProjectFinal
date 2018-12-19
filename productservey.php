<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }
?>

<?php
$productName=$_GET["n"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');           
$idp="";
$getproductid="select * from productinformation where name='".$productName."'";
$exequery=mysqli_query($link,$getproductid);
while ($row = mysqli_fetch_array($exequery)) {
    $idp=$row["productId"];
?>
<h3>Product name:<?php echo $row["name"]?><br/>
Product Price:<?php echo $row["productPrice"]?><br/>
Product Information:<?php echo $row["productInformation"]?><br/>
Product Views:<?php echo $row["totalviewp"]?><br/>
Product Order:<?php echo $row["totalorder"]?><br/>
Product Insert Date:<?php echo $row["insertdate"]?></h3>
<?php
}
$getuserid="select DISTINCT userId from userorder where productId='".$idp."'";
$exeid=mysqli_query($link,$getuserid)or die(mysqli_error_list($link));
?>
<p style="text-align:center">All Delivered Order</p>
    <table>
        <tr>
            <th>User Name</th>
            <th>User Age</th>
            <th>Total Views</th>
            <th>Total Order</th>
            <th>Total Transit</th>
            <th>Contact No</th>
            
            <th><?php echo $productName ;?> order</th>
            <th>Transit for <?php echo $productName ;?> </th>
         </tr>
<?php
while ($row = mysqli_fetch_array($exeid)) {
     $idu=$row["userId"];
$user="select * from userinformation where userId='".$idu."'";
$Exeuser=mysqli_query($link,$user)or die(mysqli_error_list($link));
while ($row= mysqli_fetch_array($Exeuser)) {
?>

        <tr >
         <td><?php echo $row["userName"]; ?></td>
          <td><?php echo $row["userage"]; ?></td>
            <td><?php echo $row["userviews"]; ?></td>
            <td><?php echo $row["userOrder"]; ?></td>
            <td><?php echo $row["totaltransit"]; ?></td>
            <td><?php echo $row["userPhnNo"]; }?></td>
<?php
$get="select SUM(totalitemno) as totalitem from userorder where userId='".$idu."' and productId='".$idp."'";
$tran="select SUM(totalprice) as totalpri from userorder where userId='".$idu."' and productId='".$idp."'";
$exepro=mysqli_query($link,$get)or die(mysqli_error_list($link));
$exepri=mysqli_query($link,$tran)or die(mysqli_error_list($link));
?>
            <td><?php while ($row1= mysqli_fetch_array($exepro)) { echo $row1["totalitem"]; }?></td>
            <td><?php while ($row1= mysqli_fetch_array($exepri)){echo $row1["totalpri"];} ?></td>
        </tr>
<?php 
} 
?>
</table></div>
<?php
mysqli_close($link);
?>
