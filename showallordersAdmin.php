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
}
</style>
<script>
 function showorder(){
             str=document.getElementById('selcustomer').value;
	if (str.length == 0) { 
		$("#selcustomer").css("border-color","red");
	} 
	else {
           $("#selcustomer").css("border-color","white");
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 $("#i1011").css("display","block");
                 $("#id121").html(xmlhttp.responseText);

                  
			}
		};
		xmlhttp.open("GET", "orderbyindividualcustomer.php?n="+ str, true);
		xmlhttp.send();
	}
         }
                
$("#showprofile").on('click', function() {
  var st=document.getElementById('selcustomer').value;
  if (st.length == 0) { 
		$("#selcustomer").css("border-color","red");
	} else{
        $("#selcustomer").css("border-color","white");
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                     $("#i1011").css("display","block");
                 $("#id121").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "viewcustomerprofile.php?q="+st, true);
		xmlhttp.send();
    }

});    
 $("#allorder").on('click', function() {
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 $("#table1").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "viewallorders.php", true);
		xmlhttp.send();
});

 $("#spcust").on('click', function() {
      var sc=document.getElementById('selcustomer').value;
      var sp=document.getElementById('selproduct').value;
if (sc.length == 0 ) { 
		$("#selcustomer").css("border-color","red");
	} 
    else if (sp.length == 0 ) { 
		$("#selproduct").css("border-color","red");
	} 
    
    else {
        $("#i001").css("display","block");
    }
        
});    

       $("#order").on('click', function() {
    var sc=document.getElementById('selcustomer').value;
      var sp=document.getElementById('selproduct').value;
      var tx=document.getElementById('txt').value;
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  $("#i001").css("display","block");
                 $("#i002").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "specialorder.php?p="+sp+"&un="+sc+"&n="+tx, true);
		xmlhttp.send();
});
</script>



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
                           WHERE userorder.deliveredornot='0' 
                           ORDER BY userorder.orderDate;";       
$res=mysqli_query($link,$jointhree)or die(mysqli_error_list($link));
?>
select a customer: <input type="text" style="left:20;width:20%" list="listcustomer" id="selcustomer"/>
          <datalist id="listcustomer">
                  <?php 

                  $qu="select * from userinformation;";
                  $re1=mysqli_query($link,$qu)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['userid'].">".$ro1['userid']."</option>";
                           }
                  ?> 
</datalist>
<input type="button" style="position:relative;width:30%" value="Pending order" id="search" onclick="showorder()" />
<input type="button" style="position:relative;width:30%" value="customer Profile" id="showprofile" />
<hr/>
select a Product: <input type="text" style="left:20;width:20%" list="listproduct" id="selproduct"/>
          <datalist id="listproduct">
                  <?php 

                  $qu="select * from productinformation;";
                  $re1=mysqli_query($link,$qu)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['name'].">".$ro1['name']."</option>";
                           }
                  ?> 
</datalist>
<input type="button" style="position:relative;width:30%" value="Order for special customer" onclick='' id="spcust" />
<input type="button" style="position:relative;width:30%" value="View all orders" id="allorder" />
<hr/>
<div id="table1">
<p style="text-align:center">Current order which not deliver</p>
    <table>
        <tr>
            <th>ORDER DATE</th>
            <th>USER ID</th>
             <th>USER Name</th>
            <th>Contact No</th>
            <th>Product Name</th>
            <th>No of Item</th>
            <th>Total Price</th>
         </tr>
<?php
while ($row = mysqli_fetch_array($res)){
?>

        <tr >
            <td><?php echo $row["orderDate"]; ?></td>
            <td><?php echo $row["userId"]; ?></td>
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
<div  class="modal" id="i1011">
          <div style="width:60%" class="modal-content animate">
       <button type="button" onclick="document.getElementById('i1011').style.display='none'" style="position:relative;background-color:red;top:-2;left:94%;width:50;" >X</button>
       <div id="id121">
       </div> 
         </div>  
</div>
<div  class="modal" id="i001">
          <div style="width:60%" class="modal-content animate">
       <button type="button" onclick="document.getElementById('i001').style.display='none'" style="position:relative;background-color:red;top:-2;left:94%;width:50;" >X</button>
      
       <div id="i002">
      No of item: <input type="Text" style="position:relative;width:30%" id="txt" />
       <input type="button" style="position:relative;width:30%" value="Order" id="order" />
       </div> 
         </div>  
</div>
<?php
mysqli_close($link);
?>

