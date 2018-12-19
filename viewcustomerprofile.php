<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }

$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$name="";$addr="";$age=0;$bike="";$mail="";$item=0;$price=0;
$desbike="";$phnNo="";$bkashNo="";$order=0;$view=0;
$uid1=$_GET["q"];
$show="select * from userInformation where userId='".$uid1."'";
$res=mysqli_query($link,$show);
while($row=mysqli_fetch_array($res)){
         $name=$row["userName"];$age=$row["userage"];$bike=$row["userBike"];$phnNo=$row["userPhnNo"];
         $addr=$row["userAddress"];$bkashNo=$row["userBkashNo"];$order=$row["userOrder"];$desbike=$row["userDesiredBike"];
         $mail=$row["userEmail"];$view=$row["userviews"];$item=$row["totalproduct"];$price=$row["totaltransit"];
}
?>
               <style>
td{
    text-align: left;
    padding: 8px;
    width:50%;
}
                    #update{
                            position: relative;
                                width: 90%;
                                left: 15;
                                color: white;
                                background-color: #4CAF50;
                                font-family: Georgia, 'Times New Roman', Times, serif;
                                font-size: 20;
                                border-radius: 4px;

                            }
                </style>
<div>
<table>
    <th colspan="2" style="text-align:center">Profile Information</th>
    <tr>
        <td>Customer Name:</td>
        <td><?php echo $name;?></td>
    </tr>
    <tr>
        <td>Customer Mail</td>
        <td><?php echo $mail;?></td>
    </tr>
    <tr>
    <tr>
        <td>Customer Address</td>
        <td><?php echo $addr;?></td>
    </tr>
    <tr>
        <td>Customer Phone Number</td>
        <td><?php echo $phnNo;?></td>
    </tr>
    <tr>
        <td>Customer Bkash No</td>
        <td><?php echo $bkashNo;?></td>
    </tr>
    <tr>
        <td>Customer Age</td>
        <td><?php echo $age;?></td>
    </tr>
    <tr>
        <td>Recently Used Bike</td>
        <td><?php echo $bike;?></td>
    </tr>
    <tr>
        <td>Desired Bike</td>
        <td><?php echo $desbike;?></td>
    </tr>
     <tr>
        <td>Total Order</td>
        <td><?php echo $order;?></td>
    </tr>
    <tr>
        <td>User View</td>
        <td><?php echo $view;?></td>
    </tr>
    <tr>
        <td>Total Buy Products</td>
        <td><?php echo $item;?></td>
    </tr>
    <tr>
        <td>Total Transit</td>
        <td><?php echo $price;?></td>
    </tr>
</table>
</div>
<br/>
<?php mysqli_close($link); ?>
<div>
</div>
</div>
