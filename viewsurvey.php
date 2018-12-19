
<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');         
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
}
</style>
<script>
$("#subpdt").on('click', function() {
  var na=document.getElementById('spro').value;
  if(na.length==0){
 $("#spro").css("border-color","red");
  }else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
                 $("#i2222").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "productservey.php?n="+na, true);
		xmlhttp.send();       
  }
});  
$("#cus").on('click', function() {
  var na=document.getElementById('setcust').value;
  if(na.length==0){
 $("#setcust").css("border-color","red");
  }else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                 $("#i2222").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "customerseryey.php?n="+na, true);
		xmlhttp.send();       
  }
});
$("#subdate").on('click', function() {
  var na=document.getElementById('dt0').value;
  var na1=document.getElementById('dt1').value;
  if(na.length==0){
 $("#dt0").css("border-color","red");
  }else if(na1.length==0){
 $("#dt1").css("border-color","red");
  }
  else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {      
                 $("#i2222").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "dateservey.php?n="+na+"&n1="+na1, true);
		xmlhttp.send();       
  }
});
$("#feed").on('click', function() {
  var na=document.getElementById('setcust').value;
  if(na.length==0){
 $("#dt0").css("border-color","red");
  }else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {      
                 $("#i2222").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "custfeedback.php?n="+na, true);
		xmlhttp.send();       
  }
});
$("#fa1").on('click', function() {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {      
                 $("#i2222").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "allfeedback.php?", true);
		xmlhttp.send();       
});
$("#subage").on('click', function() {
  var na=document.getElementById('ag0').value;
  var na1=document.getElementById('ag1').value;
  if(na.length==0 || isNaN(na)==true){
 $("#ag0").css("border-color","red");
  }else if(na1.length==0 || isNaN(na1)==true){
 $("#ag1").css("border-color","red");
  }
  else if(na>na1){
 $("#ag1").css("border-color","red");
  $("#ag1").css("background-color","red");
  }
  else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {      
                 $("#i2222").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "ageservey.php?a1="+na+"&a2="+na1, true);
		xmlhttp.send();       
  }
});

</script>
          select a Product:<input type="text" style="width:30%" list="listproduct" id="spro"/>
               <datalist id="listproduct">
                  <?php 

                  $qu="select * from productinformation ORDER BY productId ASC;";
                  $re1=mysqli_query($link,$qu)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['name'].">".$ro1['name']."</option>";
                           }
                  ?> 
               </datalist>
     <input type="button" style="width:30%" value="Product Servey" id="subpdt"/>
     <input type="button" style="width:20%" value="All Feedback" id="fa1"/>
     <hr/>
     Select a Customer: <select type="text"  style="width:20%" list="listcust" id="setcust">
          <datalist id="listcust">
                  <?php 

                  $qu="select * from userinformation ORDER BY userId ASC;";
                  $re1=mysqli_query($link,$qu)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['userName'].">".$ro1['userName']."</option>";
                           }
                  ?> 
          </datalist></select>
     <input type="button" value="Customer Servey" style="width:20%" id="cus">
     <input type="button" value="Customer Feedback" style="width:20%" id="feed">
      <hr/>
     select date: <select style="width:20%" list="datelist" id="dt0">
     <datalist id="datelist">
                  <?php
                  $abc="select DISTINCT orderDate from userorder";
                   $re1=mysqli_query($link,$abc)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['orderDate'].">".$ro1['orderDate']."</option>";
                           }

                  ?> 
</datalist></select>
     <select  style="width:20%" list="datelist" id="dt1">
          <datalist id="datelist">
                  <?php
                  $abc="select DISTINCT orderDate from userorder";
                   $re1=mysqli_query($link,$abc)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['orderDate'].">".$ro1['orderDate']."</option>";
                           }

                  ?> 
</datalist></select>
     <input type="submit" value="Find By Date" style="width:30%" id="subdate"><hr/>
     select date: <input type="text" style="width:20%" list="agelist" id="ag0">
     <input type="text" style="width:20%" list="agelist" id="ag1">
     <datalist id="agelist">
                  <?php
                  for($i=15;$i<99;$i++){
                             echo "<option value=".$i.">".$i."</option>";
                  }
                  ?> 
</datalist>
     <input type="submit" value="Find By Age" style="width:30%" id="subage"><hr/>
<div id="i1111">
        <div id="i2222">
        <table>
        <tr>
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Customer Phone No</th>
        <th>Customer Bkash No</th>
        <th>Customer Age</th>
        <th>Customer Address</th>
        <th>Customer Email</th>
        </tr>
        <?php
$allcust="select * from userinformation";
$query=mysqli_query($link,$allcust)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($query))
                           {
?>
        <tr>
        <td><?php echo $ro1["userid"];?></td>
        <td><?php echo $ro1["userName"];?></td>
        <td><?php echo $ro1["userPhnNo"];?></td>
        <td><?php echo $ro1["userBkashNo"];?></td>
        <td><?php echo $ro1["userage"];?></td>
        <td><?php echo $ro1["userAddress"];?></td>
        <td><?php echo $ro1["userEmail"];?></td>
        </tr>
<?php } ?>
        </table>
       </div> 
         </div>  
</div>
<?php
mysqli_close($link);
?>