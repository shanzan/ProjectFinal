<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' )){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error'); 
$name=trim($_GET["n"]);
//show from product information
$query1="select * from productinformation where name='".$name."';";
     if($res1=mysqli_query($link,$query1)or die(mysqli_error_list($link))){
                           if ($row = mysqli_fetch_array($res1))
                           {
//

?>
<script>
$("#up").on('click', function() {
  var na=document.getElementById('pro').value;
  var price=document.getElementById('pr').value;
  var numb=document.getElementById('n').value;
  if(price.length==0 || price == ""|| isNaN(price)==true){
 $("#pr").css("border-color","red");
  }
  else if(numb.length==0 || numb == ""|| isNaN(numb)==true){
 $("#n").css("border-color","red");
  }else {
   var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {    
                 $("#i001").css("display","none");
                 $("#i002").html(xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET","updateproduct.php?p="+na+"&pro="+price+"&no="+numb, true);
		xmlhttp.send();       
  }
});

</script>



<style>
/*image style*/
#image11{
         position:relative;
         left : 5%;
         width :90%;
         height :300px;
}
#somep{
         position:relative;
}

</style>
<div>
    <img id="image11" src="image/product/<?php echo  $row["imagename"]; ?>" >
<br/>
                <div  id="somep">
                            <p>Product Name: <?php echo $row["name"]; ?><br/>
                            Product Information: <?php echo $row["productInformation"]; ?><br/>
                            Date Inserted:<?php echo $row["insertdate"]; ?><br/>
                            Product Price:<input type="text" id="pr" value="<?php echo $row["productPrice"]; ?>"/><br/>
                            <input type="hidden" id="pro" value="<?php echo $row["name"]; ?>"/>
                            Item Avaiable:<input type="text" id="n" value="<?php echo $row["availableitem"]; ?>"/></p>
                </div>
        </div>
 <?php } }?>       
        <input type="button" value="update" id="up"/>
<?php
mysqli_close($link);
?>