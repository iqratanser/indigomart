<?php 
require_once "../db.php";
require_once "auth_session.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Indigo Mart Team">
  <title>Indigo Mart</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">


</head>
<body style="width:98.9%;">
  <!-- Sidenav -->
 <?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel">
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>
<div class="container">
<div class="d-flex justify-content-end">
 <!--    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#myModal">Add Manager</button> -->

<button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#myModal">
  Add Manager
</button>
</div>

<p>
  <button class="btn btn-success" id="mybutton" data-bs-toggle="collapse" data-bs-target="#records_contant" aria-expanded="false" aria-controls="collapseWidthExample" onclick="change()">
    Show Manager
  </button>
</p>

    <div id="records_contant" class="text-dark collapse"></div>

<!-- The Modal For Update Manager -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEditLabel">Update Manager</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="" id="Update_managername" placeholder="Enter Name" class="form-control">
        </div>
     <div class="form-group">
            <label>Email</label>
            <input type="email" name="" id="Update_manageremail" placeholder="Enter Email" class="form-control">
        </div>
     <div class="form-group">
            <label>Password</label>
            <input type="password" name="" id="Update_managerpass" placeholder="Enter Password" class="form-control">
        </div>
 <div class="form-group">
            <label>Mobile No</label>
            <input type="text" name="" id="Update_managermobile" placeholder="Enter Mobile No" class="form-control">
        </div>
      </div>
 <div class="modal-footer">
        <button type="submit" name="Submit" value="Submit" class="btn btn-success" data-dismiss="modal" onclick="UpdateManagerdetail()">Update Manager</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        <input type="hidden" name="" id="hidden_manager_id">
      </div>

</div>
</div>
</div>


<!-- 
End Of Modal -->


<!-- Add Manager Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Manager</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <!-- Modal body -->
      <div class="modal-body">
        <form id="addform">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="" id="managername" placeholder="Enter Name" class="form-control">
        </div>
     <div class="form-group">
            <label>Email</label>
            <input type="email" name="" id="manageremail" placeholder="Enter Email" class="form-control">
        </div>
     <div class="form-group">
            <label>Password</label>
            <input type="password" name="" id="managerpass" placeholder="Enter Password" class="form-control">
        </div>
 <div class="form-group">
            <label>Mobile No</label>
            <input type="text" name="" id="managermobile" placeholder="Enter Mobile No" class="form-control">
        </div>
        <div class="row">
          <div class="col-4"> <hr> </div>
          <h4 class="col-4 mt-4"> UTC Time Zone</h4>
          <div class="col-4"> <hr> </div>
        </div>
          
<div class="form-group">
            <label>Start Job day </label>
            <input type="datetime-local" name="" id="managerdates"  value="<?php echo  date("Y-m-d")."T".date("h:i"); ?>" class="form-control" readonly="">
        </div><div class="form-group">
            <label>End  Job Day </label>
            <input type="datetime-local" name="" id="managerdatee"  class="form-control">
        </div>

      </div>
      

  <div class="modal-footer">
        <button type="submit" id="addmanager" name="Submit" style="cursor: pointer;" value="Submit" class="btn btn-success" data-dismiss="modal">Add Manager</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>


<?php
    include "footer.php";

    ?>
    </div>
  </div>
   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
  <!-- Optional JS -->
  
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>


 <script type="text/javascript">
    $(document).ready(function(){
ReadRecord();
    $("#addform").on("submit",function(e){
        e.preventDefault();
        
      AddManager();
    });

    });


  function ReadRecord()
  {
    var readadminrecord="readadminrecord";
    $.ajax({
     url:"Managerdb.php",
     type:'post',
     data:{readadminrecord:readadminrecord},
     success:function(data,status){
      $('#records_contant').html(data);
     }
    });
  }
  // Add Manager Function

    function AddManager()
     {

      var managername=$('#managername').val();
       var manageremail=$('#manageremail').val();
       var managerpass=$('#managerpass').val();
       var managermobile=$('#managermobile').val();
        var managerdates=$('#managerdates').val();
        var managerdatee=$('#managerdatee').val();
          

       $.ajax({
         url:"Managerdb.php",
         type:'post',
         data:{managername: managername,
            manageremail: manageremail,
            managerpass: managerpass,
            managermobile : managermobile,
            managerdates : managerdates,
            managerdatee :managerdatee
         }, 
         success:function(data,status){
            
            if(data != null)
            {
                alert(data);
            }else{$('#addform').trigger("reset");}
            ReadRecord();
         },
       });

    }
    // Delete Manager Function



    function DeleteManager(deleteid){
        var conf=confirm("Are You Sure");
        if(conf==true)
        {
        $.ajax({
           url:"Managerdb.php",
           type:'post',
           data:{deleteid:deleteid},
           success:function(data,status) {
            ReadRecord();
           }
            });
        }
    }
    // Update Manager Function

    function GetManagerDetails(editid)
    {
      $('#hidden_manager_id').val(editid);
      $.post("Managerdb.php",{
             editid:editid
      },function(data,status){
        var manager= JSON.parse(data);
        $('#Update_managername').val(manager.Name);
        $('#Update_manageremail').val(manager.Email);
        $('#Update_managerpass').val(manager.Password);
        $('#Update_managermobile').val(manager.MobileNo);
      }
      );

      $('#EditModal').modal("show");
    }

    function UpdateManagerdetail()
    {
       var managernameupd=$('#Update_managername').val();
       var manageremailupd=$('#Update_manageremail').val();
       var managerpassupd=$('#Update_managerpass').val();
       var managermobileupd=$('#Update_managermobile').val();

       var hidden_manager_idupd=$('#hidden_manager_id').val();
       $.post("Managerdb.php",{
        hidden_manager_idupd:hidden_manager_idupd,
        managernameupd: managernameupd,
            manageremailupd: manageremailupd,
            managerpassupd: managerpassupd,
            managermobileupd : managermobileupd

       },
       function(data,status){
        $('#EditModal').modal("hide");
        ReadRecord();
       }
       );

    }
  </script>
  <!-- Change Button Text Function -->
      <script type="text/javascript">
       
            function change()
            {
                var elem = document.getElementById("mybutton");
                if (elem.innerText == "Show Manager")

                {
                    elem.innerText = "Close Manager";
                }
                else if (elem.innerText == "Close Manager") {
                    elem.innerText = "Show Manager";
                }
                else {
                    elem.innerText = "Show Manager";
                }

            }
       
      
</script>
</body>
</html>