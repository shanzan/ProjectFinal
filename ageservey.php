<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
?>
<?php
$age1=$_GET["a1"];
$age2=$_GET["a2"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');           
$usid="";
$getproid="select DISTINCT userorder.productId from userorder 
                         INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userinformation.userage between '".$age1."' and '".$age2."'";
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
            <th>Total item Ordered</th>
            <th>Total Transit ordered</th>
         </tr>
<?php
while ($rowx = mysqli_fetch_array($exeid)) {
     $ipu=$rowx["productId"];
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
$get="select SUM(totalitemno) as totalitem from userorder 
                         INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userorder.productId='".$ipu."' and userinformation.userage between '".$age1."' and '".$age2."' ";
 $tran="select SUM(totalprice) as totalpri from userorder 
                         INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userorder.productId='".$ipu."' and userinformation.userage between '".$age1."' and '".$age2."' ";
$exepro=mysqli_query($link,$get)or die(mysqli_error_list($link));
 $exepri=mysqli_query($link,$tran)or die(mysqli_error_list($link));
?>
            <td><?php while ($row1= mysqli_fetch_array($exepro)) { echo $row1["totalitem"]; } ?></td>
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