<div style="margin-left: 5%; margin-right: 5%;padding-right: 5%;padding-left: 5%; margin-bottom: 2rem;" class="text-center " >
  <h5 style=" border-bottom: 0.5px solid grey;">See other products as well</h5>

 <div class="row">
   
  <?php
require_once "db.php";
$sql ="SELECT * FROM products ORDER BY RAND() LIMIT 3";
$result = mysqli_query($con,$sql);
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
 
?>

  <div  class="col-12 col-md-4 m-2" style="margin-bottom:2rem;margin-top:2rem;" >
 <a  href="ProductDetail.php?id=<?php echo $row['product_id'] ?>" >
  <div >
  <img src="<?php echo $row['product_Image']; ?>" class="img-thumbnail" alt="..." style="max-height:5rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['product_Name']; ?></h5>

  </div>
</div> </a></div>


<?php }} ?></div></div>
  