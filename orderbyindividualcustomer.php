<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$id=$_GET["n"];
$uid="";
?>
<script>
$("#delete").on('click', function() {
  var checked = jQuery('input:checkbox:checked').map(function () {
    return this.value;
}).get();
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                jQuery('input:checkbox:checked').parents("tr").remove();
			}
		};
		xmlhttp.open("GET", "deleteorderbyadmin.php?q="+checked, true);
		xmlhttp.send();

});
$("#confirm").on('click', function() {
  var name=document.getElementById('abcd').value;
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // $("#i1011").css("display","block");
                // $("#id121").html(xmlhttp.responseText);
                 jQuery('input:checkbox').parents("tr").remove();
			}
		};
		xmlhttp.open("GET", "saveorderbyadmin.php?p="+name, true);
		xmlhttp.send();

});
</script>


<?php
$jointhree="select * from userorder
                           INNER JOIN productinformation
                           ON userorder.productId=productinformation.productId
                           INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userinformation.userId='".$id."'and userorder.deliveredornot='0'
                           ORDER BY userorder.orderDate;";       
  $res=mysqli_query($link,$jointhree)or die(mysqli_error_list($link));
         ?>
<div id="tab" style="position:relative;top:0;left:0;">
    <table>
        <tr>
             <th>Mark</th>
            <th>ORDER DATE</th>
            <th>PRODUCT NAME</th>
            <th>Item available</th>
            <th>No of Item</th>
            <th>Total Price</th>
        </tr>
        <?php
while ($row = mysqli_fetch_array($res)){
         $uid=$row["userId"];
         $_SESSION["temp"]=$row["userName"];
?>
        <tr >
         <td><input type="checkbox" value="<?php echo $row['orderid'];?>"></td>
            <td><?php echo $row["orderDate"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["availableitem"]; ?></td>
            <td><?php echo $row["totalitemno"]; ?></td>
            <td><?php echo $row["totalprice"]; }?></td>
            
        </tr>
<?php
   $totalproduct="select SUM(totalitemno) as totalitem from userorder where userId='".$uid."' and deliveredornot='0';";
    $totalprice="select SUM(totalprice) as totalpri from userorder where userId='".$uid."'and deliveredornot='0';";
    $p1=mysqli_query($link,$totalproduct)or die(mysqli_error_list($link));
    $pri=mysqli_query($link,$totalprice)or die(mysqli_error_list($link));
?>
        <tr>
        <td>TOTAL</td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php while ($row1 = mysqli_fetch_array($p1)){echo $row1["totalitem"];} ?></td>
        <td><?php while ($row1 = mysqli_fetch_array($pri)){echo $row1["totalpri"];} ?></td>
        </tr>
</table></div>
<hr/>
<p style="color:red;text-align:center">please print a customer copy for deliver the product before confirm</p>
<input type="button" style="position:relative;width:30%" value="delete selected" id="delete" />
<input type="button" style="position:relative;width:30%" value="confirm all" id="confirm" />
<?php
$quer="select * from userinformation where userId='".$uid."'";
$re=mysqli_query($link,$quer)or die(mysqli_error_list($link));
while ($row2= mysqli_fetch_array($re)) {
?>
<form style="display:inline" action="invoice.php" method="get" target="_blank">
<input type="hidden" value="<?php echo $row2['userid'];?>" name="abcd" id="abcd">
<input type="submit" style="position:relative;width:30%" value="Print Invoice" name="submit" />
</form>
<hr/>
<div>      
<h4 >User Name: <?php echo $row2["userName"]; ?></h4>
<h4>User Address: <?php echo $row2["userAddress"]; ?></h4>
<h4>Contact No: <?php echo $row2["userPhnNo"]; ?></h4>
<h4>Bkash No:<?php echo $row2["userBkashNo"]; ?></h4>
<div>
<?php
}
mysqli_close($link);
?>
<div  class="modal" id="i1011">
          <div style="width:60%" class="modal-content animate">
       <div id="id121">
       </div> 
       <button type="button" onclick="document.getElementById('i1011').style.display='none'" style="position:relative;background-color:red;width:50%;" >ok</button>
         </div>  
</div>

