<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
?>
<?php
$customername=$_GET["n"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');           
$usid="";
$getCustid="select * from userinformation where userName='".$customername."'";
$exequery=mysqli_query($link,$getCustid);
while ($row = mysqli_fetch_array($exequery)) {
    $usid=$row["userid"];
?>
<h3>Customer Name:<?php echo $row["userName"]?><br/>
Customer Age:<?php echo $row["userage"]?><br/>
Customer Email:<?php echo $row["userEmail"]?><br/>
Customer Phone no:<?php echo $row["userPhnNo"]?><br/>
Customer Order:<?php echo $row["userOrder"]; ?>
<?php
}
$getproid="select DISTINCT productId from userorder where 	userId='".$usid."'";
$exeid=mysqli_query($link,$getproid)or die(mysqli_error_list($link));
?>
<p style="text-align:center">All Delivered Order</p>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Views</th>
            <th>Product Order</th>
            <th>Product Available</th>
            <th>No of item</th>
            <th>Total Price </th>
         </tr>
<?php
while ($row = mysqli_fetch_array($exeid)) {
     $ipu=$row["productId"];
$user="select * from productinformation where productId='".$ipu."'";
$Exeuser=mysqli_query($link,$user)or die(mysqli_error_list($link));
while ($row= mysqli_fetch_array($Exeuser)) {
?>

        <tr >
         <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["productPrice"]; ?></td>
            <td><?php echo $row["totalviewp"]; ?></td>
            <td><?php echo $row["totalorder"]; ?></td>
              <td><?php echo $row["availableitem"]; ?></td>
<?php
$get="select SUM(totalitemno) as totalitem from userorder where userId='".$usid."' and productId='".$ipu."'";
$tran="select SUM(totalprice) as totalpri from userorder where userId='".$usid."' and productId='".$ipu."'";
$exepro=mysqli_query($link,$get)or die(mysqli_error_list($link));
$exepri=mysqli_query($link,$tran)or die(mysqli_error_list($link));
?>
            <td><?php while ($row1= mysqli_fetch_array($exepro)) { echo $row1["totalitem"]; }?></td>
            <td><?php while ($row1= mysqli_fetch_array($exepri)){echo $row1["totalpri"];} ?></td>
        </tr>

<?php 
} 
}
?>
</table></div>
<?php
mysqli_close($link);
?>