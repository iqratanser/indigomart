<?php
include_once("top.php");
include_once("function.php");
include_once("db.php");
$customerid="";
$customerdata = array();
if ( isset($_SESSION["Customer_id"])){
  $customerid = $_SESSION['Customer_id'];
  $sql = "Select * from customer where  id =  '$customerid'";
  $result = mysqli_query($con,$sql);
   if ($result) {
     while ($row = mysqli_fetch_assoc($result)) {
         $customerdata[] = $row;
     }
   }
}
 $srched = array();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST["srchbtn"]) )
    {
        $srch = $_POST['srch'];
     
      $srched=  get_searched_product($con , $srch);
    }
     if(isset($_POST['delbtn']))
    {
       $id = $_POST['idel'];
     $response = delfromcart($id);
     if ($response != null) {
        echo '<script type="text/javascript">
    swal("Indigo Mart!", "'.$response.'");
</script>';
     }
    }
    
}
if ($_SESSION['cart'] == null) {
  echo '<script type="text/javascript">
    swal("Indigo Mart!", "Please Add products to your cart");
    setTimeout(function(){
                                window.location = "index.php";
                            },10);
</script>';
}
?>

 <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                          <div class="search__inner">
                                <form action="" method="post">
                                    <input placeholder="Looking for ....  " name="srch" type="text" required="">
                                    <button type="submit" name="srchbtn"></button>
                                </form>

                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
          <?php include("Cart.php"); ?>
        </div>
        <!-- End Offset Wrapper -->
                   <?php 

                    if ($srched != null) {
                            include("srchedproducts.php");
                    }
                   ?>
     <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" >
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
         <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                    <div class="accordion__title" >
                                     <a  href="#"id="formaddress"> Address Information</a>   
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            
                                            <form action="#" id="addressFormData">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="First name" name="fname" id="fname" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["First_Name"];
                                            } ?>">
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Last name" name="Lname" id="lname" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["Last_Name"];
                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Street Address" name="street" id="street" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["Street"];
                                            } ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Apartment/Block/House" id="house" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["House"];
                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="City/State" name="city"  id='city' required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["City"];
                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="number" placeholder="Post code/ zip" name="zip" id="zip" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["Zipcode"];
                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="email" placeholder="Email address" name="email" id="email" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["Email"];
                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="number" placeholder="Phone number" name="phone" id="phone" required="" value="<?php  if ($customerdata != null ) {
                                                    echo $customerdata[0]["Phone"];
                                            } ?>">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6 " style="margin-top:1rem;">
                                                     	
                                                           <div class="form-check">
  															<input class="form-check-input" type="checkbox" id="gridCheck" id="chk1" checked="true" readonly="">
													      <label class="form-check-label" for="gridCheck">
													        Save for Next time & create my account
														      </label>
														    </div>
                                                  
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="address_verification" class="accordion__title">
                                       <span >payment information</span> 
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                            	<button class="btn btn-light" id="CODBTN">
                                            		<a href="#"  ><i class="zmdi zmdi-long-arrow-right"></i>Cash On Delivery</a>
                                            	</button>
                                                
                                            </div>
                                            <div class="single-method " style="margin-top:2rem">
                                               
                                                <button type="button" class="btn btn-light " data-toggle="modal" data-target="#exampleModal">
 												<a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Online Transaction</a>
												</button>





												<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Indigo Mart</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        


      		<!-- Payments method front-end starts -->
 		<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h3 class="accordion-header" id="flush-headingOne">
      <a><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #ffffff; border: none;">
        Credit card | Visa Card |Debit Card  
      </button></a>
    </h3>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      

       	<!-- Form of Stripe -->
       	<form action="checkout.php" class="row g-3 " style="margin-top:2rem"  method="post" id="paymentFrm" >
  <div class="col-md-6">
    <label for="name_s" class="form-label">Name</label>
    <input type="text" name="card-name"  class="form-control" id="name_S" required="">
  </div>
  <div class="col-md-6">
    <label for="num_s" class="form-label">Card Number</label>
    <input type="text" name="card-number"  class="form-control card-number" id="num_S" required="">
  </div>
  <div class="col-md-12">
    <label for="cvc_s" class="form-label">CVC</label>
    <input type="text" name="card-cvc"  class="form-control card-cvc" id="cvc_S" required="">
  </div>
  
  <div class="col-md-6">
    <label for="exp_month_s" class="form-label">Expiration Month (MM)</label>
    <input  type="text" name="card-expiry-month"  class="form-control card-expiry-month" id="exp_month_s" required="">
  </div>
    <div class="col-md-6">
    <label for="exp_year_s" class="form-label">Expiration year (MM)</label>
    <input  type="text" name="card-expiry-year"  class="form-control card-expiry-year"  id="exp_year_s" required="">
  </div>
  <div class="col-12 text-center" >
    <button type="submit" class="btn btn-success" name="paybtn" id="payBtn" style="margin-top:2rem;width:30%;" >Pay</button>
  </div>
</form>
      <!-- End Form  -->
       	
  </div>
    </div>
  </div>
  <div class="accordion-item" style="margin-top: 2rem;">
    <h3 class="accordion-header" id="flush-headingTwo">
      <a href="#"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="background-color: #ffffff; border:none; ">
       Paypal 
      </button><a>
    </h3>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      	<div id="paypal-button-container"></div>


      </div>
    </div>
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
     
      </div>
    </div>
  </div>
</div>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                            	<?php 
                    if (isset($_SESSION['cart'])) {
                    
                    
                    foreach ($_SESSION['cart'] as $key => $value) {
                              
                              if ($value != null) {                          
                    ?> 
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo $value["image"] ?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="ProductDetail.php?id=<?php echo $value['id'] ?>"><?php  echo $value['name']; ?></a>
                                        <span class="quantity">QTY:<?php  echo $value['quantity']; ?></span>
                                <span class="price">$ <?php  echo ($value['price'] * $value['quantity'] ); ?> </span>
                                       
                                    </div>
                                    <div class="single-item__remove">
                                       <form action="" method="post"> 
                                             <input type="hidden" name="idel" value="<?php echo $value['id'] ?>">
                                              <a href="#"> <button type="submit" name="delbtn" ><i class="zmdi zmdi-delete"></i></button></a> </form>
                                    </div>
                                </div>
                            <?php }}}?>
                               
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$ <?php  if (isset($_SESSION['subtotal'])) {
                            echo $_SESSION['subtotal'];
                        }  ?></span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$0.00</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$ <?php  if (isset($_SESSION['subtotal'])) {
                            echo $_SESSION['subtotal'];
                        }  ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cart-main-area end -->
         <script src="assets/ShopPage/js/bootstrap.bundle.min.js"></script>

                <?php 
                    include_once("prod_suggestion.php");
                ?>


<!-- performing checkouts -->

 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
       <script src="assets/Jquery/jquery-3_6.js"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_51JOGznLJmPxt11F1RwQ1Nletc5hY6uuED40cfdyuqXkBfHaETq3zYFlol8IiDJZgVMF1pHnLNvNwYESfquK2pC3M00N34KZZbC');


  function sendform()
  {
   var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();
           var  stripeToken = $("#stripeToken").val();

             $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkout",firstname:fname,lastname:lname,streetno:street,houseno:house,city:city,zip:zip,email:email,phone:phone,stripeToken:stripeToken},
              
              success:function(response){
                if(response == 'index.php'){
                            swal("Indigo Mart", " Shopping Cart is empty , Add Products");
                            setTimeout(function(){
                                window.location = response;
                            },5);
                        }else
                        {
                             window.location = response;
                        }

              }
            });



  }
//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        swal("Indigo Mart!", response.error.message);
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' id='stripeToken' value='" 
+ token + "' />");
        //submit form to the server
         // form$.get(0).submit();
            sendform();





    }
}
$(document).ready(function() {
   
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });


     function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
        function verfication()
        {

          var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();

          if (fname == "" ||   $.isNumeric(fname)  ) {
            
            swal("Indigo Mart!", "First name Canot have Number in it ");
            return false;
          }
           else if (lname == "" ||   $.isNumeric(lname)  ) {
            
            swal("Indigo Mart!", "Last name Canot have Number in it ");
             return false;
          }
        if (street == "") {
            
            swal("Indigo Mart!", " Please Provide Street No ");
             return false;
          }  
          if (house == "") {
            
            swal("Indigo Mart!", "Please Provide House No");
             return false;
          }
           
            if (city == "") {
            
            swal("Indigo Mart!", "Please Provide City");
             return false;
          }
       
        if (zip == "") {
            
            swal("Indigo Mart!", "Please Provide Zip Code");
             return false;
          }
            if (phone == "" ) {
             swal("Indigo Mart!", "Please Provide Phone");
              return false;
          }
            if (email == ""  ) {
             swal("Indigo Mart!", "Please Provide Email");
              return false;
          }else if(!validateEmail(email)){
             swal("Indigo Mart!", "Please Provide Correct Email");
              return false;
          }
          var customerid ="<?php echo $customerid; ?>";
          if (email != "" &&  customerid =="" ) {

             $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkmail",email:email},
              
              success:function(response){
                        if(response == '402'){
                            swal("Indigo Mart", " Your email already registered you can login Or we'll update your infor with current info except your password");
                            
                        }
                                           

                 
              }
            });
          }
                   
           return true; 
          
        }
    $('#address_verification').on('click',function(){
           if (!(verfication())){
           setTimeout(function(){
            $('#formaddress').trigger("click")

    },1);
           }

    });
    $('#CODBTN').on('click',function(){
            var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();
   

        $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkout",firstname:fname,lastname:lname,streetno:street,houseno:house,city:city,zip:zip,email:email,phone:phone},
              
              success:function(response){
                        if(response == 'index.php'){
                            swal("Indigo Mart", " Shopping Cart is empty , Add Products");
                            setTimeout(function(){
                                window.location = response;
                            },5);
                        }
                       else
                        {
                              window.location = response;
                        }
                        

                 
              }
            });

    });
});
</script>
<script
    src="https://www.paypal.com/sdk/js?client-id=AShs2zj0_fLDPuXVhHWXdvG2glfP3-MhnbxYbVxCO5a8PHmrria1kAgWlkfPhRHQ-N6wUByZBwSUUTwq&disable-funding=credit,card,paylater&commit=true"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
            function sendpaypalform(){
                var fname= $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var house = $('#house').val();
          var city = $('#city').val();
          var  zip = $('#zip').val();
          var email = $('#email').val();
          var phone = $('#phone').val();
          

             $.ajax({
              url: "function.php",
              type: "POST",
              dataType: "json",
              data: {opp : "checkout",firstname:fname,lastname:lname,streetno:street,houseno:house,city:city,zip:zip,email:email,phone:phone,paypal:"yes"},
              
              success:function(response){
                if(response == 'index.php'){
                            swal("Indigo Mart", " Shopping Cart is empty , Add Products");
                            setTimeout(function(){
                                window.location = response;
                            },5);
                        }else
                        {
                             window.location = response;
                        }

              }
            });
            }
           paypal.Buttons({
    createOrder: function(data, actions) {

      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?php  if (isset($_SESSION['subtotal'])) {echo $_SESSION['subtotal'];}else{echo"0.00";} ?>
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
                   
                  if(details["status"] == "COMPLETED"){
                        sendpaypalform();
                  }

      });
    },onCancel: function (data) {
    // Show a cancel page, or return to cart
    swal("Indigo Mart","You Emited the transaction");
  }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
       
    

      });
  </script>
<script type="text/javascript">
           setTimeout(function(){
 
          console.clear();
      
   },15000);
  
</script>





<?php
include_once("footer.php");
	?>