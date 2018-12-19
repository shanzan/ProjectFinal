<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');

$jointhree="select * from userorder
                           INNER JOIN productinformation
                           ON userorder.productId=productinformation.productId
                           INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userorder.deliveredornot='1'
                           ORDER BY userorder.orderDate;";       
$res=mysqli_query($link,$jointhree);
?>
<p style="text-align:center">All Delivered Order</p>
    <table>
        <tr>
            <th>ORDER No</th>
            <th>ORDER DATE</th>
            <th>USER NAME</th>
            <th>Contact No</th>
            <th>Product Name</th>
            <th>No of Item</th>
            <th>Total Price</th>
         </tr>
<?php
while ($row = mysqli_fetch_array($res)){
?>

        <tr >
         <td><?php echo $row["orderid"]; ?></td>
            <td><?php echo $row["orderDate"]; ?></td>
            <td><?php echo $row["userName"]; ?></td>
            <td><?php echo $row["userPhnNo"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["totalitemno"]; ?></td>
            <td><?php echo $row["totalprice"]; ?></td>
        </tr>
<?php 
} 
?>
</table></div>
<?php
mysqli_close($link);
?>
