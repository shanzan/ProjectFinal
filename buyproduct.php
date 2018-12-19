<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');

?>
<html>
         <head></head>
         <style>     
         table {
    border-collapse: collapse;
    width: 100%;
    border:2px solid green;
}

th, td {
    text-align: left;
    padding: 8px;
    border:2px solid green;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
         #browser,#browser1{
    width: 250px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 20px;
    background-color: white;
   
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 2px 20px 5px 20px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
                        #searchproduct{
                                 position: absolute;
                                left: 500;
                                top:20;
                                 width:30%;
                                color: white;
                                background-color: #4CAF50;
                                font-family: Georgia, 'Times New Roman', Times, serif;
                                font-size: 20;
                                border-radius: 4px;

                            }
                            .close {
                                position:relative;
                            color: black;
                            background-color:red;
                                top:0;
                                float: right;
                                font-size: 28px;
                                font-weight: bold;
                            }

                            .close:hover,
                            .close:focus {
                                color: #000;
                                text-decoration: none;
                                cursor: pointer;
                            }
         </style>
         <script>
        $(document).ready(function() {
  $("#order").click(function()  {
    var pn=$("#browser1").val();
    var ino=$("#no").val();
    if (ino.length == 0 || ino==0 || isNaN(ino)==true) { 
		$("#no").css("border-color","red");
	}else {
      $.ajax({
      type: "GET",
      url: "orderproduct.php",
      data:{p:pn,n:ino},
      success: function(result) {
           $("#show").css("display","none");
           $("#msg").css("display","block");
           $("#res").html(result);

      }
    });  
    }
  });
        });
        
         function getinformatrion(){
             str=document.getElementById('browser1').value;
	if (str.length == 0) { 
		$("#browser1").css("border-color","red");
	} 
	else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 $("#show").css("display","block");
                 $("#id11").html(xmlhttp.responseText);

                  
			}
		};
		xmlhttp.open("GET", "showproductInfo.php?p="+ str, true);
		xmlhttp.send();
	}
         }
        function getdata(){
                 str=document.getElementById('browser').value;
	if (str.length == 0) { 
		$("#browser").css("border-color","red");
	} 
	else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("browsers1").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "itembycatagory.php?q="+ str, true);
		xmlhttp.send();
	}
        }
        function getCatagoryproduct(){
                 str=document.getElementById('browser').value;
	if (str.length == 0) { 
		$("#browser").css("border-color","red");
	} 
	else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("orderitemconfirm").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "viewproductbycatagory.php?cat="+ str, true);
		xmlhttp.send();
	}
        }
        

         </script>
         <body >
<span>
    
   <h3 > Select Catagory: 
         <select list="browsers" id="browser" name="browser" >
          <datalist id="browsers">
                  <?php 
                  $query="select catagoryName from productcatagory";
                  $res=mysqli_query($link,$query)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res))
                           {
                           echo "<option value=".$row['catagoryName'].">".$row['catagoryName']."</option>";
                           }
                  ?> 
          </datalist></h3></select>
    <form id="searchform" action="" method="" >
        <h3>Select product: 
         <input type="text" list="browsers1" onfocus="getdata()" id="browser1" name="browser1" placeholder="select your product" >
          <datalist id="browsers1">
          </datalist></h3>
          <input type="button" id="searchproduct" onclick="getCatagoryproduct()" value="View product by Catagory">
         <input type="button" id="searchproduct" style="left:500;top:50;width:30%" onclick="getinformatrion()" value="Search Item">
          <input type="button" id="searchproduct" style="left:500;top:80;width:30%" onclick="$('#orderitemconfirm').load('submitorder.php')" value="View Selected Order">
    </form>
</span>
        <div  class="modal" id="show">
          <div style="margin:-1% auto 20% auto" class="modal-content animate">
         <button type="button" onclick="$('#show').css('display','none')" style="position:relative;background-color:red;top:-2;left:88%;width:50;" >X</button>
       <div id="id11">
       </div>
       <h3>No of item :<input type="text" id="no"></h3>
       <button type="button" id="order" style="left:110px" >ORDER PRODUCTS</button>
         </div>  
    </div>
    <div id="orderitemconfirm">
    <?php
    $invoice="select * from userinformation where userid='".$_SESSION["id"]."'";
    $sqlere=mysqli_query($link,$invoice)or die(mysqli_error_list($link));
    $resultinvo="";
    while ($row_in = mysqli_fetch_array($sqlere)) {
        $resultinvo=$row_in["getinvoice"];
    }
    if($resultinvo==1){
        echo "<form action='customerPrintinvoice.php' method='GET' target='_blank'>
                <p style='text-align:center;color:red;'>Your Order is Accepted,please give the invoice back after receive your product,If you do not get your odrer product between three please contact us </p>
                <input type='submit' value='Print Your Invoice' name='invo'/>
        </form>";
    }else {
        echo "<h4 style='text-align:center;color:red;'>These Order Is Pending(if you do not get your invoice before 3 days,please contact us)</h4>";
    }
    ?>
    <?php
        $jointhree="select * from userorder
                           INNER JOIN productinformation
                           ON userorder.productId=productinformation.productId
                           INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userinformation.userId='".$_SESSION['id']."'and userorder.deliveredornot='0'
                           ORDER BY userorder.orderDate;";
       $res=mysqli_query($link,$jointhree)or die(mysqli_error_list($link));
       $us1="";
    ?>
    <table>
        <tr>
            <th>ORDER DATE</th>
            <th>PRODUCT NAME</th>
            <th>No of Item</th>
            <th>Total Price</th>
         </th>
        </tr>
        <tr >
<?php
while ($row = mysqli_fetch_array($res)){
    $us1=$row["userId"];
?>
            <td><?php echo $row["orderDate"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["totalitemno"]; ?></td>
            <td><?php echo $row["totalprice"]; ?></td>
            
        </tr>
<?php
}
    $totalproduct="select SUM(totalitemno) as totalitem from userorder where userId='".$us1."' and customerinvoice='0' and deliveredornot='0';";
    $totalprice="select SUM(totalprice) as totalpri from userorder where userId='".$us1."'and customerinvoice='0' and deliveredornot='0';";
    $p1=mysqli_query($link,$totalproduct)or die(mysqli_error_list($link));
    $pri=mysqli_query($link,$totalprice)or die(mysqli_error_list($link));
?>
        <tr>
        <td>TOTAL=</td>
        <td></td>
        <td><?php while ($row1 = mysqli_fetch_array($p1)){echo $row1["totalitem"];} ?></td>
        <td><?php while ($row1 = mysqli_fetch_array($pri)){echo $row1["totalpri"];} ?></td>
        </tr>
</table>
<?php
mysqli_close($link);
?>
    </div>
    <div  class="modal" id="msg">
    <div style="margin:-1% auto 15% auto;" class="modal-content animate">
    <button type="button" onclick="$('#msg').css('display','none')" style="position:relative;background-color:red;top:-2;left:88%;width:50;" >X</button>
       <div id="res">
       </div>
       <button type="button" onclick="$('#msg').css('display','none')" style="left:110px" >OK</button>
         </div>
         </div>
    </body>
</html>
