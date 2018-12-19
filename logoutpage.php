<?php
@ob_start();
session_start();
if(!(isset($_SESSION['view']) && $_SESSION['view'] != '')){
                header ("Location:homepage.html");
            }
                  session_unset();
                  header('location:homepage.html');
                  session_destroy();
                  
 ?> 