<style>
</style>
<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$totalproduct="select SUM(noofitem) as totalitem from temporder where userId='".$_SESSION["id"]."';";
$totalprice="select SUM(Price) as totalpri from temporder where userId='".$_SESSION["id"]."';";
$p1=mysqli_query($link,$totalproduct)or die(mysqli_error_list($link));
$pri=mysqli_query($link,$totalprice)or die(mysqli_error_list($link));
$query1="select * from temporder where userId='".$_SESSION["id"]."';";
$res1=mysqli_query($link,$query1)or die(mysqli_error_list($link));
?>

 <script>
$("#delete").on('click', function() {
  var checked = jQuery('input:checkbox:checked').map(function () {
    return this.value;
}).get();
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#i1011").css("display","block");
                document.getElementById("id121").innerHTML = xmlhttp.responseText;
                jQuery('input:checkbox:checked').parents("tr").remove();

			}
		};
		xmlhttp.open("GET", "deleteOrder.php?q="+checked, true);
		xmlhttp.send();

});
$("#confirm").on('click', function() {
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#i1011").css("display","block");
                document.getElementById("id121").innerHTML = xmlhttp.responseText;
                 jQuery('input:checkbox').parents("tr").remove();
			}
		};
		xmlhttp.open("GET", "submitordertomaindatabase.php?", true);
		xmlhttp.send();

});

</script>
<div  class="modal" id="i1011">
          <div  class="modal-content animate">
       <div id="id121">
       </div> 
       <input type="button" value="OK" style="width:30%;left:150" onclick="$('#i1011').css('display','none');" >
         </div>  
    </div>
<form id="submitform" name="myform" action="">
<table>
        <tr>
            <th>Mark</th>
            <th>Product Name</th>
            <th>ORDER date</th>
            <th>No of Item</th>
            <th>Total Price</th>
         </th>
        </tr>
        <tr >
<?php
while ($row = mysqli_fetch_array($res1)){
?>
            <td><input type="checkbox" value="<?php echo $row['temporderID']; ?>" name="delete"/></td>
            <td><?php echo $row["ProductName"]; ?></td>
            <td><?php echo $row["OrderDate"]; ?></td>
            <td><?php echo $row["noofitem"]; ?></td>
            <td><?php echo $row["Price"]; ?></td>
            
        </tr>
<?php
}
?>
        <tr>
        <td>TOTAL=</td>
        <td></td>
        <td></td>
        <td><?php while ($row = mysqli_fetch_array($p1)){echo $row["totalitem"];} ?></td>
        <td><?php while ($row = mysqli_fetch_array($pri)){echo $row["totalpri"];} ?></td>
        </tr>
</table>
<button type="button" style="width:50%;left:250" id="delete">Delete</button>
<button type="button" style="width:50%;left:250" id="confirm">Confirm Order</button>
</form>
<?php
mysqli_close($link);
?>