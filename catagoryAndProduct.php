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
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');

?>
<script>
$("#allproduct").on('click', function() {
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 $("#id121").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "viewappprodutcs.php", true);
		xmlhttp.send();
});  
$("#delroduct").on('click', function() {
  var na=document.getElementById('alpro').value;
  if(na.length==0){
 $("#alpro").css("border-color","red");
  }else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
                 $("#id121").html(xmlhttp.responseText);
                 location.reload();
			}
		};
		xmlhttp.open("GET", "deleteproductdatabase.php?q="+na, true);
		xmlhttp.send();       
  }
});
$("#upproduct").on('click', function() {
  var na=document.getElementById('alpro').value;
  if(na.length==0){
 $("#alpro").css("border-color","red");
  }else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {    
                $("#i001").css("display","block");
                 $("#i002").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "productforupdate.php?n="+na, true);
		xmlhttp.send();       
  }
});

</script>
</head>
<body>
</hr>
<input type="button" style="left:120;width:80%" value="Add Catagory" onclick="document.getElementById('id02').style.display='block'" >
                            <hr/>
<input type="button" style="left:120;width:80%" value="Add products" onclick="document.getElementById('id01').style.display='block'" >
                            <hr/>
<input type="button" style="left:120;width:80%" value="view All Products" id="allproduct" >
                            <hr/>
            <input type="Text" list="prolist" style="left:120;width:80%" placeholder="Please Select a product" id="alpro" >
            <datalist id="prolist">
                  <?php 

                  $qu="select * from productinformation ORDER BY productId ASC;";
                  $re1=mysqli_query($link,$qu)or die(mysqli_error_list($link));
                           while($ro1= mysqli_fetch_array($re1))
                           {
                           echo "<option value=".$ro1['name'].">".$ro1['name']."</option>";
                           }
                  ?> 
               </datalist>
                            <hr/>
<input type="button" style="left:120;width:80%" value="Update Products" id="upproduct" >
                            <hr/>
<input type="button" style="left:120;width:80%" value="Delete Products" id="delroduct" >
                            <hr/>
                            <div id="tab"></div>
<div id="id01" class="modal">
                    <form name="aproduct" onsubmit="return addproduct()" class="modal-content animate" action="addproducttodatabase.php" method="post" enctype="multipart/form-data" >
                        <div class="container">
                        <h5>Upload product Image: <input type="file" name="pname" required /></h5>
                        <h5>product Name : <input type="text" name="proname" placeholder="Enter Product Name" required /></h5>
                        <h5>product Information: <input type="text" name="pinfo" placeholder="enter product information" required /></h5>
                        <h5>product price : <input type="text" name="pprice" placeholder="Enter price" required /></h5>
                        <h5>Number of products : <input type="text" name="nofproduct" placeholder="Enter No of products" required /></h5>
                        <h5>     Select Catagory: 
                    <select list="browsers" id="browser" name="browser" placeholder="select your catagory" >
          <datalist id="browsers"> 
          <?php 
                  $query="select catagoryName from productcatagory";
                  $res=mysqli_query($link,$query)or die(mysqli_error_list($link));
                           while ($row = mysqli_fetch_array($res))
                           {
                           echo "<option value=".$row['catagoryName'].">".$row['catagoryName']."</option>";
                           }
                  ?> 
          </datalist></h5></select><hr/>
                        <input type="submit"  value="Add Product" />
                        <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <hr>
                        </div>
                    </form>
         </div>
                  <div id="id02" class="modal">
                    <form  class="modal-content animate" action="addcatagory.php" method="post" >
                        <div class="container">
                        <h5>Catagory Name : <input type="text" name="cname" placeholder="Enter New catagory" required /></h5>
                        <h5>Catagory Information : <input type="text" name="cinformation" placeholder="Enter Catagory Information" required /></h5>
                        <button type="submit" name="catagorysubmit" style="background-color:green;color:white;radius:3px" >Ad Catagory</button>
                        <button type="button" style="background-color:green;color:white;radius:3px" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                        <hr>
                        </div>
                    </form>
            </div>
    <div id="id121">
       </div> 

         <div  class="modal" id="i001">
          <div style="width:60%" class="modal-content animate">
       <button type="button" onclick="document.getElementById('i001').style.display='none'" style="position:relative;background-color:red;top:-2;left:94%;width:50;" >X</button>
       <div id="i002">
       </div> 
         </div>  
</div>
</div>
</body>
</html>