<?php
session_start();
session_destroy();
if (isset($_COOKIE["Admin_ID"])) {
  
      unset($_COOKIE['Admin_ID']); 
    setcookie('Admin_ID', null, -1, '/'); 
     unset($_COOKIE['Admin_FName']); 
    setcookie('Admin_FName', null, -1, '/'); 
     unset($_COOKIE['Admin_Email']); 
    setcookie('Admin_Email', null, -1, '/'); 
     unset($_COOKIE['Admin_Image']); 
    setcookie('Admin_Image', null, -1, '/'); 
}
header("Location:login.php");
exit();
?>