<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '' && $_SESSION["admin"] =="admin")){
                header ("Location:homepage.html");
            }

?>
<html>
<head>
                  <title>Bikes Gadget</title>
                   <meta charset="utf-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                   <link rel="stylesheet" href="page.css">  
                   <script src="page1.js"></script>
                   <script src="jquery.js"></script>
                      <script>
                      function buyProduct(){
                            $(".col-right").load('buyproduct.php');
                        }
                        function loadProfile(){
                            $(".col-right").load('customerprofle.php');
                        }
                        function changepass(){
                             $(".col-right").load('demo.html');
                        }
                        // function movetext(){
                        // var x=document.getElemntById()
                        // }

                        
                     // window.onbeforeunload = function() { return "You work will be lost."; };
                      </script>
                   <style>
                            .col-left{
                                    position: relative;
                                    top: 12;
                                    width: 25%;
                                    height: 100%;
                                    overflow: hidden;
                                    background-color: lightgray;
                                    border-radius:4px;
                            }
                            .col-right{
                                      position: absolute;
                                      top: 150;
                                      left: 350;
                                      width: 74%;
                                      height: 97%;
                                      overflow: scroll;
                                    background-color: lightgray;
                                    border-radius:4px;
                            }
                            input[type=button],#logout,input[type=submit]{
                                position: relative;
                                width: 90%;
                                left: 15;
                                color: white;
                                background-color: #4CAF50;
                                font-family: Georgia, 'Times New Roman', Times, serif;
                                font-size: 20;
                                border-radius: 4px;

                            }
                            a{
                                 position: relative;
                                width: 90%;
                                left: 15;
                                text-decoration: none;
                                color: white;
                                border:3px solid #4CAF50;
                                background-color:#4CAF50;
                                border-radius: 4px;
                                left: 130;
                                font-size: 20;
                                
                            }
                            #Sname{
                                left: 0;
                                color: green;
                                font-family: Algerian;
                                font-size: 30px;
                                  text-align: center;
                                background-color: aliceblue;
                                                            }

                   </style>
         </head>
         <body style="background:whitesmoke" >
                  <div id="firstIcon">
                           <h1><b>Welcome to <spin style="color:red" >Bikers Gadget</spin></b></h1>
                           <img src="image/logo3.png" height="78px" width="160px" alt="Image not found">
                  </div>
                  
                  <div id="banner">
                                   <h3 id="txtbanner">you already just login,now you can view our product buy our product,and also order for special product<h3>
                                   <p></p>
                  </div>
                <div>
                        <div class="col-left">
                           <h3 id="Sname" >welcome Admin
                           <?php
                            echo  $_SESSION["view"];
                            ?>
                            </h3>
                            <hr/>
                            <input type="button" value="Admin Profile" onclick="loadProfile()" >
                            <hr/>
                            <input type="button" value="Change Password" onclick="changepass()" >
                             <hr/>
                            <input type="button" value="Add products"  onclick="$('.col-right').load('catagoryAndProduct.php')" >
                            <hr/>
                           <input type="button" value="ORDER product"  onclick="$('.col-right').load('buyproduct.php')" >
                            <hr/>
                            <input type="button" value="Confirm pending orders" onclick="$('.col-right').load('showallordersAdmin.php')" >
                            <hr/>
                            <input type="button" value="view Servey" onclick="$('.col-right').load('viewsurvey.php')" >
                            <hr/>
                            <a href="logoutpage.php">Logout</a>
                            <hr/>
                                     
			            </div>
                                      <div class="col-right" id="col-right" >
 Buying a bike today can be as easy as clicking a button on a website. Direct-to-consumer online bike sales have been around for a few years, but with the recent entries of Trek and Giant into the digital storefront space, the option gained a certain level of legitimacy: Two of the biggest bikemakers in the world no longer rely exclusively on dealer networks to sell to retail customers. As such, online sales are expected to expand to more manufacturers, and become available to more people.
                                      </div>
		</div>  
        </div>  
         </body>
<html>