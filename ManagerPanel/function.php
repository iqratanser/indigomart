<?php 
require_once "auth_session.php";

 require_once "../db.php";
  $datelogin = date("YmdHi");
 $managerid= "";
  if(isset($_SESSION['Manager'])!="")
 {
   $managerid = $_SESSION['Manager']["id"] ;
}
 
if (isset($_POST['opp'])) {
	

if ($_POST['opp']=="logoutmanager") {

$activity= $_POST["page"];
$sql =  "INSERT INTO `manageractivity`( `manager_id`, `logouttime`, `activity`, `curenttime`) VALUES ('$managerid','$datelogin','$activity','$datelogin')";
$result=mysqli_query($con,$sql);


}

}
$activetime = 0;
$logouttime = "";
$logintime = "";
$sql = "SELECT `id_Ma`, `logintime`, `logouttime` FROM `manageractivity` WHERE `manager_id` = '$managerid' ORDER BY  `id_Ma` DESC LIMIT 2";
$result=mysqli_query($con,$sql);
if($result){
  while($row = mysqli_fetch_assoc($result))
  {


  	if ($logintime == "" && $row["logintime"] !="" ) {
  		$logintime = $row["logintime"];
  	}
  	if ($logouttime == "" && $row["logouttime"] != "") {
  		$logouttime = $row["logouttime"];
  	}



  }
  }

 if ($logintime != "" && $logouttime != "") {
      $activetime =  $activetime + ($logouttime - $logintime);
          $logouttime = ""; 
          $logouttime = "";
    }



$sql =  "SELECT `ID`, `active_time`, `manager_id` FROM `m_active_time` WHERE `manager_id` = '$managerid'";
  $result=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
if ($row != null) {
if ($row["active_time"] != "" ) {
	$activetime = $activetime + $row["active_time"];
$sql = "UPDATE `m_active_time` SET `active_time`='$activetime' WHERE  `manager_id` = '$managerid'";
$result= mysqli_query($con,$sql);	
}
}else
{

  $sql ="INSERT INTO `m_active_time`( `active_time`, `manager_id`) VALUES ('$activetime','$managerid')";
  $result=mysqli_query($con,$sql);

}

?>