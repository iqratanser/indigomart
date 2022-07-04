<?php 
require_once "../db.php";
require_once "auth_session.php";
extract($_POST);

 if(isset($_POST['readadminrecord'])) {
	$data='<table class="table table-bordered table-striped">
	<thead>
   <tr>
      <th>Sr.No</th>
       <th>Name</th>
       <th>Email</th>
       <th>Password</th>
       <th>Mobile No</th>
       <th>Active Minutes on Site</th>
       <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>';
    $displaymanager="SELECT * FROM `manager`";
    $result=mysqli_query($con,$displaymanager);
    if(mysqli_num_rows($result)>0){
    	$number=1;
    while ($row=mysqli_fetch_array($result)) {
    	$data.='<tr>
     	<td>'.$number.'</td>
     	<td>'.$row['Name'].'</td>
     	<td>'.$row['Email'].'</td>
     	<td>'.$row['Password'].'</td>
     	<td>'.$row['MobileNo'].'</td>
        <td>
        <a href="manageractive.php?id='.$row['mid'].'" class="btn btn-info" >check</a>
      </td>
     	<td>
     	<button onclick="GetManagerDetails('.$row['mid'].')" class="btn btn-warning">Edit</button>
     	</td>
     	<td>
     	<button onclick="DeleteManager('.$row['mid'].')" class="btn btn-danger">Delete</button>
     	</td>
     	</tr>';
     	$number++;
     }
     }
     $data.='</table>';
     echo $data; 
 }

if(isset($_POST['managername']) && isset($_POST['manageremail']) && isset($_POST['managerpass']) && isset($_POST['managermobile']) && isset($_POST['managerdates']) && isset($_POST['managerdatee'] ) ) 
{
	$query="INSERT INTO `manager`( `Name`, `Email`, `Password`, `MobileNo`,`StartingTime`,`EndingTime`) VALUES ('$managername', '$manageremail','$managerpass','$managermobile','$managerdates','$managerdatee')";
    $result= mysqli_query($con,$query);  
    if(!$result)
    {
      echo  json_encode("Could not add manager  ".mysqli_error($con));
    }

}

///Delete Manager Code
if(isset($_POST['deleteid']))
{
   $managerid=$_POST['deleteid'];
   $delmanager="DELETE FROM `manager` WHERE  mid='$managerid'";
    mysqli_query($con,$delmanager);  
}
// Update Manager 


if(isset($_POST['editid'])&& isset($_POST['editid'])!="")
{
   $managid=$_POST['editid'];
   $upatemanager="SELECT * FROM  `manager`  WHERE mid='$managid'";
   if(!$result=mysqli_query($con,$upatemanager))
   {
      exit(mysqli_query());
   }
   $response=array();
   if(mysqli_num_rows($result)>0)
   {
      while ($row=mysqli_fetch_assoc($result)) {
         $response=$row;
      }
   }
   else
   {
      $response['status']=200;
      $response['message']="Data Not Found";

   }

   echo json_encode($response);
}
else
{
   $response['status']=200;
      $response['message']="Invalid Request"; 
}

// Update data in Table

if(isset($_POST['hidden_manager_idupd']))
{
   $hidden_manager_idupd=$_POST['hidden_manager_idupd'];
   $managernameupd=$_POST['managernameupd'];
   $manageremailupd=$_POST['manageremailupd'];
   $managerpass=$_POST['managerpass'];
   $managermobileupd=$_POST['managermobileupd'];
   $query2="UPDATE `manager` SET `Name`='$managernameupd',`Email`='$manageremailupd',`Password`='$managerpassupd',`MobileNo`='$managermobileupd' WHERE mid='$hidden_manager_idupd'";
   mysqli_query($con,$query2);
}

?>