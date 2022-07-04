<?php
require 'auth_session.php';
require '../db.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Indigo Mart Team">
  <title>Indigo Mart | Manager </title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  
  <link rel="stylesheet" href="../assets/Bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- Argon CSS -->

  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <style type="text/css">
    
    .form-control{
     background-color: #d8e2f0;

    }
  </style>
</head>


<body style="width:98.9%;">

<?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel">
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>

 <div class="container row">
<div class="info-return  sticky-top" ></div>
<!-- Button trigger modal -->
<div class="col-4">
<button type="button" class="btn btn-warning mt-2 modalbtn " data-bs-toggle="modal" data-bs-target="#exampleModal">
 | ADD Product |  
</button></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Product </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
   <form class="row g-3 productform">
      <input type="hidden" name="opp" value="add" id="operatory">
      <input type="hidden" name="product_id" id="product_id">
      <input type="hidden" name="product_image" id="product_image">
  <div class="col-md-12">
    <label for="PName" class="form-label">Name</label>
    <input type="text" name="pName" class="form-control" id="pName" required>

  </div>
  <div class="col-md-12">
    <label for="pImage" class="form-label">Image</label>
    <input type="file" name="file" class="form-control" id="pImage" >
    <div  class="col-4" > <img src="" class="pimage img-thumbnail h3" ></div>
  </div>
  <div class="col-12">
   <div class="form-floating">
  <textarea class="form-control" name="pdes"  id="pdes" style="height: 100px" required></textarea>
  <label for="pdes">Description</label>
</div>
    </div>
  <div class="col-12">

    <label for="Category" class="form-label">Category</label>
    <select id="Category" name="Category" class="form-select apended" required="">
     
    </select>
  </div>

  <div class="col-md-12">
    <label for="pcolor" class="form-label">Color</label>
    <input type="text" class="form-control"  name="color" id="pcolor" required>
  </div>
  <div class="col-md-12">
    <label for="pinstock" class="form-label">In Stock Units</label>
    <input type="number" class="form-control"  name="pinstock" id="pinstock" required>

  </div>
  <div class="col-md-12">
    <label for="pbprice" class="form-label">Product bought Price per unit incl. taxes</label>
 <input type="number" class="form-control"  name="pbprice" id="pbprice" required>
  </div><div class="col-md-12">
    <label for="psprice" class="form-label">Product Selling Price per unit incl. taxes</label>
 <input type="number" class="form-control"  name="psprice" id="psprice" required>
  </div>
  <div class="appended col-md-6 col-lg-8 ml-auto mr-auto"></div>
  <div class="col-12">
    <button type="submit" class="btn btn-outline-primary">Save</button>
  </div>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-modal-close" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<div class="accordion accordion-flush col-lg-12 " id="accordionFlushExample">

 <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed  mt-2" type="button" id="gettabledata" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Show Products
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body col-lg-12 ">
         
			 	<table class="table table-striped table-responsive  table-dark table-hover tabl-data">
			 		
			 			
			 	
			 	</table>
    
			</div>
       </div>
  </div>
</div>

 </div>

 

  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="../assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>

<script type="text/javascript">
         $(document).ready(function() {

            
           $(window).on("beforeunload", function() { 
              $.ajax({
                      url:"function.php",
                      method:"post",
                      dataType:"json",
                      data:{opp:"logoutmanager",page:"Product Management"},
                      success:function(response){
                       

        }
     });
            });
        });
    </script>
<script type="text/javascript">

$(document).ready(function(){
 fetchcategory();
$('.productform').on('submit',function(event){
  event.preventDefault();
   var formData = new FormData(this);
    var catvalue = $('.apended').val();
      if (catvalue == '0') {

        alert("Select an category");
      }else{
 	 $.ajax({
 	 		url: "products-backend.php",
 	 		method: "post",
 	 		data:formData,
	 		cache:false,
	 		contentType: false,
	 		processData:false,
	 		success:function(response){
        fetchcategory();
		 			$('.btn-modal-close').click();
	 			$('.info-return').html(response);
	 			$('.productform').trigger("reset");
	 	 			fetchtable();
	 		}


 	 });
  }

 	 
});
$('#gettabledata').on("click",function(){
		
 	 	fetchtable();
 	 });
function fetchtable(){

	$.ajax({
 	 	url:"products-backend.php",
 	 	method:"post",
    dataType:"json",
 	 	data:{opp:"gettable"},
 	 	success:function(response){
 	 		$('.tabl-data').html(response);

 	 	}
 	 });

}
function fetchcategory(){

  $.ajax({
    url:"products-backend.php",
    method:"post",
    data:{opp:"getcategory"},
    success:function(response){
      $('.apended').html(response);

    }
   });

}

$("body").on("click",".delbtn",function(e){
  e.preventDefault();
   
    var cid = $(this).attr("href");
    
   $.ajax({

    url:"products-backend.php",
    method:"post",
    data: {opp:"delcategory",id:cid,},
    success:function(response){
      $('.info-return').html(response);
      fetchtable();
    }
   });
});
$("body").on("click",".editbtn",function(){
 
   
    var cid = $(this).attr("name");
    
   $.ajax({

    url:"products-backend.php",
    method:"post",
    dataType:"json",
    data: {opp:"fetcheditdata",id:cid,},
    success:function(response){
      $('#pName').val(response["product_Name"]);
      $('.pimage').attr("src",response["product_img_admin"]);
      $('#pdes').text(response["product_Description"]);
      $('#Category option[value='+response["C_ID"]+'] ').attr('selected', 'selected');
      $('#pcolor').val(response["product_Color"]);
      $('#pinstock').val(response["product_instock"]);
      $('#pbprice').val(response["product_bprice"]);
       $('#psprice').val(response["product_sprice"]);
       $('#product_id').val(response["product_id"]);
       $('#product_image').val(response["product_Image"]);
      var html11 = "<select class='dropdown form-control bg-secondary ' name='status' id='status_select'> <option value='1' class='dropdown-item'>Active</option>       <option value='0'  id='notactive'  class='dropdown-item' >Not Active</option> </select>";

      $('.appended').html(html11);
      if (response["product_Status"] == "1") {

           $('.appended option[value='+response["product_Status"]+'] ').attr('selected', 'selected');
      }else{
       $('.appended option[value='+response["product_Status"]+'] ').attr('selected', 'selected');
      }
        $('#operatory').val("edit");
        $('.modalbtn').click();
      
    }
   });
});

$('.btn-modal-close').on("click",function(){
  if( $('#operatory').val() =="edit")
  {
    $('.productform').trigger("reset");

  }
});


});

</script>
</body>
</html>

