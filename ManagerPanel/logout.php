<?php
session_start();
session_destroy();
if (isset($_COOKIE["Manager"])) {
  
      unset($_COOKIE['Manager']['managerid']); 
    setcookie("['Manager']['managerid']", null, -1, '/'); 
     unset($_COOKIE['Manager']['managername']); 
    setcookie("['Manager']['managerid']", null, -1, '/'); 
     
}
 $datelogin = date("YmdHi");
 $managerid= "";
  if(isset($_SESSION['Manager'])!="")
 {
   $managerid = $_SESSION['Manager']["id"] ;
}
 
if (isset($_POST['opp'])) {
	

if ($_POST['opp']=="logoutmanager") {

$sql =  "INSERT INTO `manageractivity`( `manager_id`, `logouttime`, `activity`, `curenttime`) VALUES ('$managerid','$datelogin','logouttime','$datelogin')";
$result=mysqli_query($con,$sql);


}
}
header("Location:../login.php");
exit();
?>