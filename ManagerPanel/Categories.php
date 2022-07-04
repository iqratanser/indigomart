<?php
require 'auth_session.php';
require_once "loader.php";
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
<div class="info-return"></div>
<!-- Button trigger modal -->
<div class="col-4">
<button type="button" class="btn btn-warning mt-2 modalbtn " data-bs-toggle="modal" data-bs-target="#exampleModal">
 | ADD Category |  
</button></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Category </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
   <form class="row g-3 catform">
  <div class="col-md-6 col-lg-8 ml-auto mr-auto">
    <label for="Category" class="form-label">Category</label>
         <input type="hidden" class="form-control" name="catid" value="" id="catid">
    <input type="text" class="form-control" name="cat-name" id="Category">
     <input type="hidden" class="form-control" name="opp" value="add" id="operatory">
     
  </div>
  <div class="apended col-md-6 col-lg-8 ml-auto mr-auto"></div>
  <div class="col-12">
    <button type="submit" class="btn btn-info" name="btn-submit" >Save</button>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-modal-close" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<div class="accordion accordion-flush " id="accordionFlushExample">

 <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed  mt-2" type="button" id="gettabledata" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Show Category
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
			 	<table class="table table-dark ">
			 		<thead>
			 			<tr>
			 			<td>Name</td>	
			 			
			 			<td>Status</td>
			 			<td>Action</td>	
			 			</tr>
			 		</thead>
			 		<tbody class="tabl-data">
			 			
			 		</tbody>
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
                      data:{opp:"logoutmanager",page:"Category Management"},
                      success:function(response){
                       

        }
     });
            });
        });
    </script>
<script type="text/javascript">

$(document).ready(function(){

$('.catform').on('submit',function(event){
  event.preventDefault();
   var formData = new FormData(this);

 	 $.ajax({
 	 		url: "catgory-backend.php",
 	 		method: "post",
 	 		data:formData,
	 		cache:false,
	 		contentType: false,
	 		processData:false,
	 		success:function(response){
		 			$('.btn-modal-close').click();
	 			$('.info-return').html(response);
	 			$('.catform').trigger("reset");
	 			$('.apended').html("");
	 			fetchtable();
	 		}


 	 });

 	 
});
$('#gettabledata').on("click",function(){
		
 	 	fetchtable();
 	 });
function fetchtable(){

	$.ajax({
 	 	url:"catgory-backend.php",
 	 	method:"post",
 	 	data:{opp:"gettable"},
 	 	success:function(response){
 	 		$('.tabl-data').html(response);
 	 	}
 	 });

}

$("body").on("click",".delbtn",function(e){
	e.preventDefault();

	 	var cid = $(this).attr("href");
	 	
	 $.ajax({

		url:"catgory-backend.php",
 	 	method:"post",
 	 	data: {opp:"delcategory",id:cid,},
 	 	success:function(response){
 	 		$('.info-return').html(response);
 	 		fetchtable();
 	 	}
	 });
});
$("body").on("submit",".editform",function(e){
	e.preventDefault();
	 console.log("chalpara");

	var dataform  = $(this).serializeArray();
	 
	 $.ajax({

		url:"catgory-backend.php",
 	 	method:"post",
 	 	data: {opp:"geteditdata",dataform,},
 	 	success:function(response){
 	 		
 	 		var data = jQuery.parseJSON(response);
 	 		$('#Category').val(data['Category_Name']);
 	 		$('#catid').val(data['Category_ID']);
 	 		var html11 = "<select class='dropdown form-control bg-secondary ' name='status' id='status_select'> <option value='1' class='dropdown-item'>Active</option> 	 		<option value='0'  id='notactive'  class='dropdown-item' >Not Active</option> </select>";

 	 		$('.apended').html(html11);
 	 		if (data["Category_Status"] == "1") {

 	 				$('body .active').attr("selected",true);
 	 		}else{

 	 				
 	 			$('body apended select option ').val("0").change();;
 	 		}
 	 			$('.modalbtn').click();
 	 			$('#operatory').val("edit");
 	  	 	}
	 });
});
});

</script>
</body>
</html>

