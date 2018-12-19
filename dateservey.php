<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');         
$date=$_GET["n"];
$date1=$_GET["n1"];
$jointhree="select *  from userorder
                           INNER JOIN productinformation
                           ON userorder.productId=productinformation.productId
                           INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userorder.orderDate between '".$date."' and '".$date1."'
                           ORDER BY userorder.orderDate;"; 
?>
    <table>
        <tr>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>No of Product</th>
            <th>Total Price</th>
            <th>Deliver or not </th>
         </tr>
<?php
$re1=mysqli_query($link,$jointhree)or die(mysqli_error_list($link));
                           while($row= mysqli_fetch_array($re1))
                           {
?>

        <tr >
         <td><?php echo $row["userName"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["totalitemno"]; ?></td>
            <td><?php echo $row["totalprice"]; ?></td>
              <td><?php if($row["deliveredornot"]==1 && $row["customerinvoice"]==1){
                   echo "Deliver";
              }else {
                   echo "Not Deliver";
              } 
              ?></td>
              </tr>
              <?php
                           }
                           mysqli_close($link);
     ?>
              </table>