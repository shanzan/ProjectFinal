<?php
$catname=$_GET["cat"];
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$show="select * from productinformation
                           INNER JOIN productcatagory
                           ON productcatagory.catagoryId=productinformation.catagoryId
                           where productcatagory.catagoryName='".$catname."'";
$res=mysqli_query($link,$show);
?>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "data/arrays.txt",
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button>Click!</button>"
        } ]
    } );
 
    $('#example tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert( data[0] +"'s salary is: "+ data[ 5 ] );
    } );
} );
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
</style>
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
while ($row = mysqli_fetch_array($res)){
?>

        <tr >
         <td><img id="image11" src="image/product/<?php echo  $row["imagename"]; ?>"</td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["catagoryName"]; ?></td>
            <td><?php echo $row["productInformation"]; ?></td>
            <td><?php echo $row['productPrice']; ?></td>
            <td><?php echo $row["availableitem"]; ?></td>
            <td><?php echo $row["totalorder"]; ?></td>
            <td><?php echo $row["totalviewp"]; ?></td>
        </tr>
<?php 
} 
?>
</table></div>
<?php
mysqli_close($link);
?>