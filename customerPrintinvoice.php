<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }

$link = mysqli_connect('localhost', 'root', '',"bikersgadget") or die('Connection error');
$id=$_SESSION["id"];$usid="";
$jointhree="select * from userorder
                           INNER JOIN productinformation
                           ON userorder.productId=productinformation.productId
                           INNER JOIN userinformation
                           ON userorder.userId=userinformation.userId
                           WHERE userinformation.userId='".$id."'and userorder.customerinvoice='0' and userorder.deliveredornot='1'
                           ORDER BY userorder.orderDate;";   
$res=mysqli_query($link,$jointhree)or die(mysqli_error_list($link));
require("fpdf181/fpdf.php");
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 15);
$pdf->Image('image/logo3.png' , 8 ,8, 40, 40,'PNG');
$pdf->Cell(150, 10, '', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 10, 'date: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(70, 8, "BIKER'S GADGET", 0,0,'C');
$pdf->Ln(7);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(70, 8, 'Varify Copy',0,0,'C');
$pdf->Ln(23);
$userinfo="select * from userinformation where userId='".$id."'";
$res11=mysqli_query($link,$userinfo)or die(mysqli_error_list($link));
while($row=mysqli_fetch_array($res11)){
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 8, 'User name : '.$row["userName"], 0);
$pdf->Ln(7);
$pdf->Cell(30, 8, 'User address : '.$row["userAddress"], 0);
$pdf->Ln(7);
$pdf->Cell(30, 8, 'User phone no : '.$row["userPhnNo"], 0);
$pdf->Ln(7);
$pdf->Cell(30, 8, 'User Email : '.$row["userEmail"], 0);
$pdf->Ln(7);
$pdf->Cell(30, 8, 'User Bike: '.$row["userBike"], 0);
}
$pdf->Ln(30);
$pdf->Cell(15, 8, 'No', 0);
$pdf->Cell(60, 8, 'Product Name', 0);
$pdf->Cell(25, 8, 'quantity', 0);
$pdf->Cell(25, 8, 'price/item', 0);
$pdf->Cell(30, 8, 'Total Price', 0);
$pdf->Cell(45, 8, 'Order date', 0);
$pdf->Ln(8);
$item=0;
while($row=mysqli_fetch_array($res)){
    $item = $item+1;
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(60, 8,$row["name"], 0);
	$pdf->Cell(25, 8, $row["totalitemno"], 0);
    $pdf->Cell(25, 8, $row["productPrice"].'$', 0);
	$pdf->Cell(30, 8, $row["totalprice"].'$', 0);
	$pdf->Cell(45, 8, $row["orderDate"], 0);
	$pdf->Ln(8);
    $usid=$row["userId"];
$totalproduct="select SUM(totalitemno) as totalitem from userorder where userId='".$usid."' and customerinvoice='0' and deliveredornot='1'";
$totalprice="select SUM(totalprice) as totalpri from userorder where userId='".$usid."'and customerinvoice='0' and deliveredornot='1'";
$p1=mysqli_query($link,$totalproduct)or die(mysqli_error_list($link));
$pri=mysqli_query($link,$totalprice)or die(mysqli_error_list($link));
$newsql="update userorder set customerinvoice='1' where orderid='".$row["orderid"]."'";
if(mysqli_query($link,$newsql)){

}else {
         echo "Error";
}
}
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20,8,'',0);
$pdf->Cell(20,8,'',0);
$pdf->Cell(20,8,'',0);
$pdf->Ln(8);
while ($row1 = mysqli_fetch_array($p1)){ 
$pdf->Cell(15, 8,'Total Item: '.$row1["totalitem"],0);
}
$pdf->Ln(8);
while ($row1 = mysqli_fetch_array($pri)){
$pdf->Cell(15, 8,'Total Price: '.$row1["totalpri"].'$',0);
}
$pdf->Ln(20);
$pdf->Cell(150, 8,'Customer signature',0);
$pdf->Cell(100, 8,'Receiver Signature',0);
$pdf->Ln(10);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(70, 8, 'please give this copy back When Received your product',0,0,'C');
$pdf->Output();
$upinfo="update userinformation set getinvoice='0' where userId='".$id."'";
if(mysqli_query($link,$upinfo)){

}else {
         echo "Error";
}
?>