<?php 
require "../db.php";

if($_SERVER['REQUEST_METHOD']=="POST")
{
	if($_POST['opp']=="add")
	{
			$catname =  mysqli_real_escape_string($con,$_POST['cat-name']);
			$register = "INSERT INTO `Category`( `Category_Name`) VALUES ('$catname')";
			
			 $result = $con->query($register);
			
			 if(!$result)
			 {

			 	Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Data is not Inserted !  Please Try Again</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
			 }else
			 {

 	

			 	Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Data Insertetd</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
			 }
}elseif($_POST['opp']=="edit")
{
	
	$catname = $_POST["cat-name"];
	$id= $_POST["catid"];
	$status=  $_POST["status"];
$catname = $_POST['cat-name'];
			$register = "UPDATE `Category` SET `Category_Name`='$catname',`Category_Status`='$status' WHERE `Category_ID` = '$id'";
			 $result = $con->query($register);
			 if(!$result)
			 {

			 	Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Record Not Updated!  Please Try Again</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
			 }else
			 {

 	

			 	Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Record Updated</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
			 }

}
if ($_POST['opp'] =="gettable") {
	
	$query = "SELECT * FROM `Category`";
	$result = $con->query($query);
	if(!$result)
	{	Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Data is not Inserted !  Please Try Again</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
	}else
	{
			$output="";
		while($row = mysqli_fetch_assoc($result))
		{
			if($row['Category_Status'] =="1")
			{
			$output .= " <tr>  <td> ". $row['Category_Name'] ." </td> <td><input type='checkbox' value='yes' checked='checked'><span> Active </span></td> <td ><div class='row'> <form class='editform col-3'> <input type='hidden' id='cat-id' value='".$row["Category_ID"]."' name='cat_id'> <button class='btn btn-warning editbtn' >Edit</button></form> <a class='btn btn-danger delbtn col-3' href='".$row["Category_ID"]."' >Delete</a>  </td>  </tr> ";
			}elseif ($row['Category_Status'] =="0") {
				$output .= " <tr>  <td> ". $row['Category_Name'] ." </td> <td><input type='checkbox' value='yes' ><span> Not Active  </span> </td> <td><div class='row'> <form class='editform col-3'> <input type='hidden' id='cat-id' value='".$row["Category_ID"]."' name='cat_id'> <button class='btn btn-warning editbtn' >Edit</button></form> <a class='btn btn-danger delbtn col-3' href='".$row["Category_ID"]."' >Delete</a>  </td>  </tr> ";

			}
					
		}

		Echo  $output;

	}
}

if($_POST['opp']=="delcategory")
{
		
	if($_POST['id'] != null)
	{
    $id = $_POST['id'];
     $query = "DELETE FROM `products` WHERE `product_id`= '$id'";
    $response = $con->query($query);
 
     $query = "DELETE FROM `Category` WHERE `Category_ID` = '$id'";
    $response = $con->query($query);
 
    if(!$response)
    {
    		Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Data is not Deleted !  Please Try Again</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

    }else
    {
    	Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 			<strong class='info-return'>Data is  Deleted ! </strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }

	}



}


if($_POST['opp']=="geteditdata")
{
		
	if($_POST['dataform'][0]["value"] != null)
	{			
			 $id = $_POST['dataform'][0]["value"];
			$query  = "SELECT * FROM `Category` WHERE `Category_ID` = '$id'";
			$result =  $con->query($query);
			if($result)
			{
				$row =mysqli_fetch_assoc($result);
				echo json_encode($row);

			}


	}}


}



?>