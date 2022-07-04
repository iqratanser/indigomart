<?php
session_start();
session_destroy();
if (isset($_COOKIE["Customer_ID"])) {
  
      unset($_COOKIE['Customer_ID']); 
    setcookie('Customer_ID', null, -1, '/'); 
     unset($_COOKIE['Customer_FName']); 
    setcookie('Customer_FName', null, -1, '/'); 
   
}
header("Location:login.php");
exit();
?>