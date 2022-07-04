<?php
require "../db.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_POST['opp']=="add")
  {
      $pname = $_POST['pName'];
      $pdes = $_POST['pdes'];
      $pcolor = $_POST['color'];
      $pinstock = $_POST['pinstock'];
      $pbprice = $_POST['pbprice'];
      $psprice = $_POST['psprice'];
      $pcategory = $_POST['Category'];
      
      if (0 < $_FILES['file']['error'])  {

         $sql = "INSERT INTO `products`(`product_Name`, `product_Description`, `product_Color`, `product_bprice`, `product_sprice`, `product_instock`, `C_ID`) VALUES ('$pname','$pdes','$pcolor','$pbprice','$psprice','$pinstock','$pcategory')";
          if($con->query($sql)==TRUE){
               
                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong class='info-return'>Data Insertetd</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }
          else{

                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong class='info-return'>Data is not Inserted !  Please Try Again</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
          }
        
        }else
        {
          $file = $_FILES['file'];
       
        $fname = $file['name'];
        $ftemp = $file['tmp_name'];
        
        $filext = explode('.', $fname);
        $filecheck = strtolower(end($filext));
        $fileextstored = array('png', 'jpg', 'jpeg','jfif');
        if(in_array($filecheck, $fileextstored))
        {
          $destfile = '../assets/ProductImages/'.$fname;
          move_uploaded_file($ftemp, $destfile);
          $destfile1 = '../assets/ProductImages/'.$fname;
           $destfile = 'assets/ProductImages/'.$fname;
          $sql = "INSERT INTO `products`(`product_Name`, `product_Description`, `product_Color`, `product_bprice`, `product_sprice`, `product_instock`, `product_Image`, `C_ID`,`product_img_admin`) VALUES ('$pname','$pdes','$pcolor','$pbprice','$psprice','$pinstock','$destfile','$pcategory','$destfile1')";
          if($con->query($sql)==TRUE){
               
                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong class='info-return'>Data Insertetd</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }
          else{

                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong class='info-return'>Data is not Inserted !  Please Try Again</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
          }



        }
        else
        {


          Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong class='info-return'>Please Select An Image !  Please Try Again</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
           
        }
      
}elseif($_POST['opp']=="edit")
{
   $pname = $_POST['pName'];
      $pdes = $_POST['pdes'];
      $pcolor = $_POST['color'];
      $pinstock = $_POST['pinstock'];
      $pbprice = $_POST['pbprice'];
      $psprice = $_POST['psprice'];
      $pcategory = $_POST['Category'];
        $status=  $_POST["status"];
      $id= $_POST["product_id"];
      if (0 < $_FILES['file']['error'])  {

         
$sql = "UPDATE `products` SET `product_Name`='$pname',`product_Description`='$pdes',`product_Color`='$pcolor',`product_bprice`='$pbprice',`product_sprice`='$psprice',`product_instock`='$pinstock',`C_ID`='$pcategory',`product_Status`='$status' WHERE `product_id`='$id'";



          if($con->query($sql)==TRUE){
               
                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong class='info-return'>Data Updated</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }
          else{

                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong class='info-return'>Data is not updated !  Please Try Again</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
          }
        
        }else
        {

          $path = $_POST['product_image'];
          @unlink($path);
          $file = $_FILES['file'];
       
        $fname = $file['name'];
        $ftemp = $file['tmp_name'];
        
        $filext = explode('.', $fname);
        $filecheck = strtolower(end($filext));
        $fileextstored = array('png', 'jpg', 'jpeg');
        if(in_array($filecheck, $fileextstored))
        {
          $destfile = '../assets/ProductImages/'.$fname;
          move_uploaded_file($ftemp, $destfile);
                    $destfile = 'assets/ProductImages/'.$fname;
                      $destfile1 = '../assets/ProductImages/'.$fname;
         $sql = "UPDATE `products` SET `product_Name`='$pname',`product_Description`='$pdes',`product_Color`='$pcolor',`product_bprice`='$pbprice',`product_sprice`='$psprice',`product_instock`='$pinstock',`product_Image`='$destfile',`C_ID`='$pcategory',`product_Status`='$status',`product_img_admin` ='$destfile1' WHERE `product_id`='$id'";

          if($con->query($sql)==TRUE){
               
                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong class='info-return'>Data updated</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }
          else{

                    Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong class='info-return'>Data is not updated !  Please Try Again</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
          }



        }
        else
        {


          Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong class='info-return'>Please Select An Image !  Please Try Again</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
           
        }

}



 if($_POST['opp']=="getcategory")
  {
    $query = "SELECT * FROM `Category`";
  $result = $con->query($query);
  if(!$result)
  { Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong class='info-return'>Data is not Inserted !  Please Try Again</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }else
  {
      $output="<option value='0' >----Select---</option>";
    while($row = mysqli_fetch_assoc($result))
    {
       $output .= "<option value=".$row["Category_ID"]." >".$row["Category_Name"]."</option>";
          
    }

    Echo  $output;

  }

  }

if ($_POST['opp'] =="gettable") {
  
  $query = "SELECT `product_id`, `product_Name`, `product_Description`, `product_Color`, `product_bprice`, `product_sprice`, `product_instock`, `product_Image`,`product_img_admin`, `C_ID`, `product_Status`,category.Category_Name FROM `products` INNER JOIN category ON products.C_ID = category.Category_ID ";
  $result = $con->query($query);
  if(!$result)
  { Echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong class='info-return'>Data Not Found!  Please Try Again</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }else
  {
      $output="<thead class='table-info'>
            <tr>
            <td>Image</td>  
            
            <td>Name</td>
          
            <td>Color</td>  
            <td>Units Remaining</td>
            <td>Bought Price</td> 
            <td>Selling Price</td>  
            <td>Category Name</td>  
            <td>Status</td>           
            <td>Action</td>
            </tr>
          </thead>
          <tbody >";
    while($row = mysqli_fetch_assoc($result))
    {
      if($row['product_Status'] =="1")
      {


      $output .= " <tr> <td> <img class='img-thumbnail ' src='".$row["product_img_admin"]."' > </td> <td class='col-2'>  ".$row["product_Name"]." </td> <td>".$row["product_Color"]."</td><td>".$row["product_instock"]."</td><td>".$row["product_bprice"]."</td><td>".$row["product_sprice"]."</td><td>".$row["Category_Name"]."</td>
           <td><input type='checkbox' value='yes' checked='checked'><span> Active </span></td> <td><button class='btn btn-warning editbtn  ' name='".$row["product_id"]."' >Edit</button><a class='btn btn-danger delbtn ' href='".$row["product_id"]."' >Delete</a>  </td>  </tr> ";




      }elseif ($row['product_Status'] =="0") {
        $output .= " <tr>  <td> <img class='img-thumbnail' src='".$row["product_img_admin"]."' > </td><td>".$row["product_Name"]."</td><td>".$row["product_Color"]."</td><td>".$row["product_instock"]."</td><td>".$row["product_bprice"]."</td><td>".$row["product_sprice"]."</td><td>".$row["Category_Name"]."</td>
           <td><input type='checkbox' value='yes' ><span> Not Active </span></td> <td ><button class='btn btn-warning editbtn' name='".$row["product_id"]."' >Edit</button><a class='btn btn-danger delbtn ' href='".$row["product_id"]."' >Delete</a> </td>  </tr> ";

      }
          
    }
    $output.=" </tbody>";

    Echo   json_encode($output);

  }
}


if($_POST['opp']=="delcategory")
{
    
  if($_POST['id'] != null)
  {
    $id = $_POST['id'];
     $query = "DELETE FROM `products` WHERE `product_id`= '$id'";
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


if($_POST['opp']=="fetcheditdata")
{
    
  if($_POST['id'] != null)
  {     
       $id = $_POST['id'];
      $query  = "SELECT * FROM `products` WHERE `product_id`= '$id'";
      $result =  $con->query($query);
      if($result)
      {
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);

      }


  }}

}




?>