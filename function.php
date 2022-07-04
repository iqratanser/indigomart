<?php
 $EmailCheck=false;  
if (session_id() =="") {
     session_start();
      if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
			  $_SESSION['subtotal'] =  0;

			  	if (isset($_COOKIE["cart"])) {
						unset($_SESSION['cart']);
			  		$cart = json_decode($_COOKIE["cart"],true);
			  		if ($cart != null) {
			  				foreach ($cart as $key => $value) {

			  				$_SESSION['cart'][$value['id']] = $value;
			  				}
			  		
			  		}
			  		
			  	}
  			
		    }
		

 }
	include_once("db.php");
getcarttotal();
function get_products($con,$type='')
{
	$sql="SELECT * FROM `products`";
	if ($type=='latest')
	 {
		$sql.="  where `product_Status`='1' order by product_id desc LIMIT 8";
	}

	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;
	}
	return $data;
}
function get_products_cat($con,$cat_id='')
{
	$sql="SELECT * FROM `products`";
	if($cat_id!='')
	{
		$sql.=" inner join category on  products.C_ID = category.Category_ID where `Category_ID` ='$cat_id'";
	}

		$sql.=" order by product_id desc  LIMIT 7";
	// print_r($sql);exit();
	$res= mysqli_query($con,$sql);

	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

	}
	
	return $data;
}
function get_cats_name($con,$catid='')
{
	$sql="SELECT category.Category_Name FROM category WHERE category.Category_ID = (SELECT products.C_ID FROM products WHERE products.product_id = '$catid')";

	$res= mysqli_query($con,$sql);

	$data="";
	while($row=mysqli_fetch_assoc($res))
	{
		$data=$row['Category_Name'];

	}
	
	return $data;
}
function getcustname($con,$cusname='')
{
	$sql="SELECT customer.First_Name FROM customer WHERE customer.id = (SELECT orders.Customer_id FROM orders WHERE orders.order_id ='$cusname')";
	$res= mysqli_query($con,$sql);

	$data="";
	while($row=mysqli_fetch_assoc($res))
	{
		$data=$row['First_Name'];
		print_r($data);

	}
}

function get_products_detail($con,$product_id)
{
$sql="SELECT * FROM `products` WHERE product_id=$product_id";
$sql.=" order by product_id desc  LIMIT 7";
	$res= mysqli_query($con,$sql);
$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

	}
	
	return $data;
}

function get_searched_product($con,$srch)
{
  $sql = " SELECT products.* from products WHERE product_Name LIKE '%$srch%' OR product_Description LIKE '%$srch%' OR product_Color LIKE '%$srch%' or product_sprice LIKE '%$srch%'  LIMIT 8";
  $res= mysqli_query($con,$sql);

	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$data[]=$row;

	}
	
	return $data;


}
 function addtocart($con,$id)
{


	$output = "";
  $get_product=get_products_detail($con,$id);
  
    
   if (isset($_SESSION['cart'][$id])) {
     if ( $get_product["0"]["product_instock"] > $_SESSION['cart'][$id]["quantity"])
      {
      	 $_SESSION['cart'][$id]["quantity"]  =  $_SESSION['cart'][$id]["quantity"] +1;
      	 $output  = " Product  Quantity increased ";
      }else
      {
      	$output = "Stock is already in your Cart";

      }           
        }else
        {
        		if ($get_product["0"]["product_instock"] >0) {
        			
        	
            $_SESSION['cart'][$id]=[
                 
                    "id" =>$get_product["0"]["product_id"] ,
                     "image" =>  $get_product["0"]["product_Image"],
                     "name"=>$get_product["0"]["product_Name"],
                    "quantity"=>1,
                    "price"=>$get_product["0"]["product_sprice"],
                    "bprice"=>$get_product["0"]["product_bprice"],

              
          ];
          $output = " Product  Added in Cart ";
        }else
        {
        $output = "Sorry , This Product is currently not avaiable";	
        }

      }
       

getcarttotal();
        return $output;
}
function delfromcart($id)
{
	if (isset($_SESSION["cart"][$id])) {

		$_SESSION["cart"][$id][] = null; 
		unset($_SESSION["cart"][$id]);
	}
	getcarttotal();
	return " Product Removed ";
}

function  getcarttotal()
{

	$_SESSION['subtotal'] = null;
	$_SESSION['buypricetotal'] = null;
	 if (isset($_SESSION['cart'])) {

     foreach ($_SESSION['cart'] as $key => $value) {

     			if($value != null )
     			{
     					$_SESSION['buypricetotal']  +=$value['bprice'] * $value['quantity'];
     				$_SESSION['subtotal']  +=$value['price'] * $value['quantity'];
     			}
     
 } }
}
function increaseitemquantity($con,$id)
{
	  $get_product=get_products_detail($con,$id);
$output ="";
   if (isset($_SESSION['cart'][$id])) {
     if ( $get_product["0"]["product_instock"] > $_SESSION['cart'][$id]["quantity"]) {
      	 $_SESSION['cart'][$id]["quantity"]  =  $_SESSION['cart'][$id]["quantity"] +1;
      	 $output  = " Product  Quantity increased ";
      }else
      {
      	$output = "Stock is already in your Cart";
      }
		getcarttotal();
		return $output;
}
}
function decreaseitemquantity($id)
{
	$output ="";
if (isset($_SESSION["cart"][$id])) {
	if($_SESSION["cart"][$id]["quantity"] > 0){
   $_SESSION["cart"][$id]["quantity"] -=1;
   $output = "Quantity decreased";
	}else
	{
		$output =  delfromcart($id);

	}
		
		}
		getcarttotal();
		
		return $output;
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if (isset($_POST['opp'])) {
	

if ($_POST['opp']=="cookie") {
   $cookie_array = array();
   		if (isset($_SESSION["cart"])) {
   					if($_SESSION["cart"] != null)
   					{
   						$cookie_array = $_SESSION['cart'];
   						if ($_COOKIE["cart"] != null) {

			  					setcookie("cart","",time() -36000, "/" );	
   						 
   					
   					}	
   			  setcookie("cart", json_encode($cookie_array), time() + (86400 * 30), "/");
   					}
   			
   		}


}
// to check email
  if ($_POST['opp']=="checkmail") {
  		$email=mysqli_real_escape_string($con,$_POST["email"]);
  	 $checkemail="SELECT * FROM `customer` WHERE Email='$email'";
                  $result1=mysqli_query($con,$checkemail);
                  $count=mysqli_num_rows($result1);
                  	$sql="";
                  if($count>0)
                  {
                  	echo json_encode("402");

                    }
  }
//If the checkout is been set
if ($_POST['opp']=="checkout") {
if ($_SESSION['cart'] == null) {
	//to check whether any how the cart is not empty
    echo json_encode('index.php');
}else{
 	$order_id=null;
 	$strie_id="0000";
 	$pay_method="COD";
 		$first_Name=mysqli_real_escape_string($con,$_POST["firstname"]);
 		$lastname=mysqli_real_escape_string($con,$_POST["lastname"]);
 		$streetno=mysqli_real_escape_string($con,$_POST["streetno"]);
 		$houseno=mysqli_real_escape_string($con,$_POST["houseno"]);
 		$city=mysqli_real_escape_string($con,$_POST["city"]);
 		$zip=mysqli_real_escape_string($con,$_POST["zip"]);
 		$email=mysqli_real_escape_string($con,$_POST["email"]);
 		$phone=mysqli_real_escape_string($con,$_POST["phone"]);
 			$amount = $_SESSION['subtotal'];
 			$bprice=  $_SESSION['buypricetotal'];
 			$profit =  $amount - $bprice;
 					//if the payment is Paypla
 				if (!empty($_POST["paypal"])) {
 					$pay_method = "Paypal";
 				}
 					// if the payment method is stripe then there must exist a stripe token in form
 			if(!empty($_POST['stripeToken'])){
 				$token  = $_POST['stripeToken'];

 		require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_51JOGznLJmPxt11F1KQ9Pd7FUJEh7jcP4xDDyc5cDT4R928gz1u3NTY4WMi2aNtQKZiL7e3VmjHT0oOm8VRtZie3b00TALrQ0AN",
      "publishable_key" => "pk_test_51JOGznLJmPxt11F1RwQ1Nletc5hY6uuED40cfdyuqXkBfHaETq3zYFlol8IiDJZgVMF1pHnLNvNwYESfquK2pC3M00N34KZZbC"
    );
\Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
   
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $amount*100,
        'currency' => "usd",
        'description' => 'Indigo Marthave deducted this amount from your bank',
        
    ));
 $chargeJson = $charge->jsonSerialize();
 if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
 	$strie_id=$customer->id;
 		$pay_method ="Stripe";
 }

 			} //ending the stripe
 			$customer_id=null;
 				// To inform user if the mail already exsist.
 			    $checkemail="SELECT * FROM `customer` WHERE Email='$email'";
                  $result1=mysqli_query($con,$checkemail);
                  $count=mysqli_num_rows($result1);
                  	$sql="";
                  if($count>0)
                  {
                   $row = mysqli_fetch_assoc($result1); 
                   	$customer_id = $row["id"];

                    $sql = "UPDATE `customer` SET `Stripe_id`='$strie_id',`First_Name`='$first_Name',`Last_Name`='$lastname',`Street`='$streetno',`House`='$houseno',`City`='$city',`Zipcode`='$zip',`Phone`='$phone' WHERE `Email` = '$email' ";

                  }else
                  {
                  	$sql = "INSERT INTO `customer`( `Email`,`Stripe_id`, `First_Name`, `Last_Name`, `Street`, `House`, `City`, `Zipcode`, `Phone`) VALUES ('$email','$strie_id','$first_Name','$lastname','$streetno','$houseno','$city','$zip','$phone')";
                  }
			$result = mysqli_query($con,$sql);	
                  
		
			if ($result) {

						if ($customer_id == null) {
							
							$customer_id =  mysqli_insert_id($con);
						}
					

					
					 $orderTime=date("l jS \of F Y h:i:s A");
						$sql = "INSERT INTO `orders`(`Customer_id`, `Amount`, `Payment_method`, `order_Status`,`orderTime`) VALUES ('$customer_id','$amount','$pay_method','Active','$orderTime')";
						$res = mysqli_query($con,$sql);
			if ($res) {
				$order_id =  mysqli_insert_id($con);
				$sql = "INSERT INTO `sales`( `order_id`, `Profit`, `sale_status`) VALUES ('$order_id','$profit','1')";
				$response = mysqli_query($con,$sql);
				if($response)
				{
					$sale_id =  mysqli_insert_id($con);
						foreach ($_SESSION['cart'] as $key => $value) {

     			if($value != null )
     			{

     					  $id = $value["id"];
     					  $image =$value["image"];
      					$name = $value["name"];
      					$quantity = $value["quantity"];
      					$price = $value["price"] * $value["quantity"];
      					$bprice = $value["bprice"] * $value["quantity"];
      					$p = $price - $bprice;
     				$sql = "INSERT INTO `soldProducts`(`product_id`, `p_name`, `P_image`, `sold_quantity`, `soldprice`, `buyprice`, `profit`, `Customer_id`, `order_id`, `sale_id`) VALUES ('$id','$name','$image','$quantity','$price','$bprice','$p','$customer_id','$order_id','$sale_id')";

     						mysqli_query($con,$sql);
     						$sql = "SELECT * FROM products WHERE product_id = '$id'";
									$resul = mysqli_query($con,$sql);
									if ($resul) {
										
										  $row = mysqli_fetch_assoc($resul);
										 
										   $qunatity = $row['product_instock'];
										   
										  $newquantity = $qunatity - $quantity;
										  
										    $sql = "UPDATE `products` SET `product_instock`='$newquantity' WHERE product_id ='$id'";
										    mysqli_query($con,$sql);
									     							
									     						
									     			}
     		}

				}

			}
			}
			unset($_SESSION['cart']);
			setcookie("cart","",time() -36000, "/" );	

			echo json_encode("Thankyou.php?id=".$order_id);

}
}
}
}



}
?>