<html>
         <head>
                  <title>Bikers Gadget</title>
                   <meta charset="utf-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                   <link rel="stylesheet" href="page.css">  
                   <script src="page1.js"></script>  
                   <script src="jquery.js"></script> 
<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }

$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$name="";$addr="";$age=0;$bike="";$mail="";
$desbike="";$phnNo="";$bkashNo="";$order=0;
$useri=$_SESSION["id"];
$show="select * from userInformation where userId='".$useri."'";
$res=mysqli_query($link,$show);
while($row=mysqli_fetch_array($res)){
         $name=$row["userName"];$age=$row["userage"];$bike=$row["userBike"];$phnNo=$row["userPhnNo"];
         $addr=$row["userAddress"];$bkashNo=$row["userBkashNo"];$order=$row["userOrder"];$desbike=$row["userDesiredBike"];
         $mail=$row["userEmail"];
}
?>
               <style>
         table {
    border-collapse: collapse;
    width: 100%;
    border:2px solid green;
}

th, td {
    text-align: left;
    padding: 8px;
    border:1px solid green;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}          /* table {
    font-family: BankGothic Lt BT;
    border-collapse: collapse;
    width: 100%;
    border-radius: 4px;
}

th, td {
    text-align: left;
    padding: 8px;
}

th {
    background-color: #4CAF50;
    color: white;
    text-align: center;
}
tr:nth-child(even){background-color: #f2f2f2}
table, th, td {
    border: 1px solid black;
}*/
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
                </head>
                <body>
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
</table>
</div>
<br/>
<?php mysqli_close($link); ?>
<div>

<a href="#" style="left:400;width:40%" onclick="document.getElementById('id02').style.display='block'" >UPDATE PROFILE</a>
</div>
             <div id="id02" class="modal">
                    <form class="modal-content animate" onsubmit="return validateupdate()" name="userform" action="update.php" method="post" >
                        <div class="container">
                        <h5>Name : <input type="text" name="name" value="<?php echo $name ?>" required /></h5>
                        <h5>Phone No : <input type="text" name="p_no" value="<?php echo $phnNo ?>" required /></h5>
                        <h5>BKASH Phone No : <input type="text" name="bkp_no" value="<?php echo $bkashNo ?>" placeholder="0XXXXXXXXXX" required /></h5>
                        <h5>Email : <input type="text" name="email" value="<?php echo $mail ?>" required /></h5>
                        <h5>AGE: <input type="text" name="age" value="<?php echo $age ?>" required /></h5>
                        <h5>Adress: <input type="text" name="add" value="<?php echo $addr ?>" required /></h5>
                        <h5>Your Bike: <input type="text" name="bik" value="<?php echo $bike ?>" required /></h5>
                        <h5>Desired bike /company: <input type="text" name="desbike" value="<?php echo $desbike ?>" required/></h5>
                        <hr>
                        <input type="submit" value="UPDATE" style="background-color:green;color:white;radius:3px" />
                        <button type="button" style="background-color:green;color:white;radius:3px" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                        <hr>
                        </div>
                    </form>
                  </div>
                  </div>
                  </body>
                  </html>