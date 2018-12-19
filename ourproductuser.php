
<?php


$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$query="select * from productinformation
         INNER JOIN productcatagory
         ON productcatagory.catagoryId=productinformation.catagoryId";
$rect=mysqli_query($link,$query)or die(mysqli_error_list($link));
?>
<html>
         <head>
                  <title>Bikers Gadget</title>
                   <meta charset="utf-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                   <link rel="stylesheet" href="page.css">  
                   <script src="page1.js"></script>  
                   <script>
        function getinformatrion(){
             str=document.getElementById('browser1').value;
	if (str.length == 0) { 
		$("#browser1").css("border-color","red");
	} 
	else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("i1001").innerHTML = xmlhttp.responseText;

                  
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
                document.getElementById("i1001").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "viewproductbycatagory.php?cat="+ str, true);
		xmlhttp.send();
	}
        }
                   </script>
                   <style>
#image11{
         position:relative;
         left : 20;
         width :80%;
         height :100;
}
#somep{
         position:relative;
}
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
    height:20%;
}
 #searchproduct{
        position:relative;
                            left:30;display: inline;
                                color: white;
                                background-color: #4CAF50;
                                font-family: Georgia, 'Times New Roman', Times, serif;
                                font-size: 20;
                                border-radius: 4px;

                            }
</style>
         </head>
         <body style="background:whitesmoke">
                  <div id="firstIcon">
                           <h1><b>Welcome to <spin style="color:red" >Bikers Gadget</spin></b></h1>
                           <img src="image/logo3.png" height="78px" width="160px" alt="Image not found">
                  
                  </div>
                    <div id="id01" class="modal">
                    <form class="modal-content animate" action="userlogin.php" method="post" name="loginform" >
                        <div class="container">
                        <h3>User Name : <input type="text" placeholder="Enter Username" name="n_0u" id="n_0u" required></h3>
                        <h3>Password : <input type="password" placeholder="Enter Password" name="n_0p" id="n_0p" required></h3>
                        <hr>
                        <button type="submit" id="login1" style="background-color:green;color:white;radius:3px" >Login</button>
                        <button type="button" style="background-color:green;color:white;radius:3px" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <hr/>
                        </div>
                    </form>
                  </div>
                  <div id="id02" class="modal">
                    <form class="modal-content animate" action="userinformation.php" method="post" >
                        <div class="container">
                        <h5>Name : <input type="text" name="name" placeholder="Enter your Name" required /></h5>
                        <h5>Phone No : <input type="text" name="p_no" placeholder="0XXXXXXXXXX" required /></h5>
                        <h5>BKASH Phone No : <input type="text" name="bkp_no" placeholder="0XXXXXXXXXX" required /></h5>
                        <h5>Email : <input type="text" name="email" placeholder="somthing@mail.com" required /></h5>
                        <h5>AGE: <input type="text" name="age" required /></h5>
                        <h5>Password : <input type="password" name="pass" required /></h5>
                        <h5>Confirm Passward : <input type="password" name="cpass" required /></h5>
                        <h5>Adress: <input type="text" name="add" required /></h5>
                        <h5>Your Bike: <input type="text" name="bik" required /></h5>
                        <h5>Desired bike /company: <input type="text" name="desbike" required/></h5>
                        <hr>
                        <button type="submit" style="background-color:green;color:white;radius:3px" >Sign Up</button>
                        <button type="button" style="background-color:green;color:white;radius:3px" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                        <hr>
                        </div>
                    </form>
                  </div>
                  </div>
                    <div id="id03" class="modal">
                    <form class="modal-content animate" action="feedbackpage.php" method="post" >
                        <div class="container">
                        <h3>Name : <input type="text" placeholder="Enter Name" name="name" id="n_0u" required></h3>
                        <h3>Email : <input type="Text" placeholder="Enter Email" name="email" id="n_0p" required></h3>
                        <h3>Feedback: <input type="Text" style="height:20%" placeholder="Give feedback" name="feedback" id="n_0p" required></h3>
                        <hr>
                        <button type="submit" style="background-color:green;color:white;radius:3px" >Submit</button>
                        <button type="button" style="background-color:green;color:white;radius:3px" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                        <hr/>
                        </div>
                    </form>
                  </div>
                  <div id="nevibar">
                            <ul>
                                    <li><a class="active" href="homepage.html">Home</a></li>
                                    <li><a href="ourproductuser.php">Our Products</a></li>
                                    <li><a href="#" onclick="document.getElementById('id03').style.display='block'" >Feedback</a></li>
                                   <li><a href="contact_us.html">Contact</a></li>
                                    <li><a href="about_us.html">About Us</a></li>
                                    <li><a href="#" onclick="document.getElementById('id01').style.display='block'" >Login</a></li>
                                    <li><a href="#"  onclick="document.getElementById('id02').style.display='block'" >Sign Up</a></li>
                           </ul>
                  </div>
<hr/>
<div>
<h3 > Select Catagory: 
         <select list="browsers" style="width:20%" id="browser" name="browser" >
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
          <input type="button"  id="searchproduct" onclick="getCatagoryproduct()" value="View product by Catagory">
        <h3>Select product: 
         <input type="text" style="width:20%" list="browsers1" onfocus="getdata()" id="browser1" name="browser1" placeholder="select your product" >
          <datalist id="browsers1">
          </datalist></h3>
         <input type="button" style="top:-48;left:430;width:20%" id="searchproduct"  onclick="getinformatrion()" value="Search Item">
    </div>
    <hr/>
<div id="i1001">
				  <table>
        <tr>
         <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Catagory</th>
            <th>Product Information</th>
            <th>Product Price</th>
            <th>Product Available</th>
            <th>Total Product Order</th>
            <th>Total product view</th>
         </tr>
<?php
while ($row = mysqli_fetch_array($rect)){
?>

        <tr >
         <td><img id="image11" src="image/product/<?php echo  $row["imagename"]; ?>"</td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["catagoryName"]; ?></td>
            <td><?php echo $row["productInformation"]; ?></td>
            <td><?php echo $row["productPrice"]; ?></td>
            <td><?php echo $row["availableitem"]; ?></td>
            <td><?php echo $row["totalorder"]; ?></td>
            <td><?php echo $row["totalviewp"]; ?></td>
        </tr>
<?php 
} 
?>
</table>
</div>
<hr/>
<div  class="modal" id="i1011">
          <div style="width:60%" class="modal-content animate">
       <div id="id121">
       </div> 
       <button type="button" onclick="document.getElementById('i1011').style.display='none'" style="position:relative;background-color:red;width:50%;" >ok</button>
         </div>  
</div>

<?php
mysqli_close($link);
?>
				  
				  
				  




				  <div class="footer">
    
    <div class="container1" >
	     <div><b>Get in touch</b></div></br>
	     <div>Sec:11 road:5 Uttara Dhaka</div></br>
		 <div>Contact: 01xxxxxxxxx</div></br>
		 <div>Email:xxxxxxxx@gmail.com</div></br>
	</div>
	
	 <div class="container2">
	     <div><b>Business Hours</b></div></br>
	     <div>Sunday to Tuesday: 8am to 6pm</div></br>
		 <div>Saturday: 9am to 4pm</div></br>
		 <div>Friday: Closed</div></br>
		 <div>Support Hours is 24/7 every day</div></br>
	</div>
	
<div class="container3">
	     <div><b>Important Links</b></div></br>
	     <a href="https://www.facebook.com/">find us on facebook</a></br>
		 <a href="https://twitter.com/?lang=en">find us on Twiter</a></br>
		 <a href="https://www.google.com.bd/#gws_rd=cr">find us on Google</a></br>
	</div>
	
	<div class="container4">
	     <div><b>About Us</b></div></br>
	     <div>We provide our customers fashionable product with great qualities. So they dont have to take the pain to find good products. Now they can order from anywhere in bangladesh. We are taking the responsibilities to reach them and give them the desired products.</div></br>
		
	</div>
	
   
</div>

                  
         </body>        

<html>