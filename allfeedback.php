<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }
$link=mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');         
$sqlo1="select * from feedback ORDER BY date ";
$res=mysqli_query($link,$sqlo1)or die(mysqli_error_list($link));
?>
<table>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Feedback</th>
        </tr>
        <?php
while($ro1= mysqli_fetch_array($res))
                           {
?>
        <tr>
        <td><?php echo $ro1["fname"];?></td>
        <td><?php echo $ro1["femail"];?></td>
        <td><?php echo $ro1["date"];?></td>
        <td><?php echo $ro1["ffeddback"];?></td>
        </tr>
<?php } ?>
        </table>
        <?php
         mysqli_close($link);
        ?>