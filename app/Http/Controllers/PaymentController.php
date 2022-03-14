<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
// use Session;
use League\Flysystem\Config;
use Illuminate\Support\Facades\Auth;
// use Cart;
// use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;



class PaymentController extends Controller
{
    //
    public function PaymentProcess(Request $request ){
        $data= array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['payment']=$request->payment;
        if ($request->payment == 'jazzcash') {
            return \view('pages.payment.jazzcash', compact('data'));
        }
        elseif($request->payment == 'stripe'){
            return \view('pages.payment.stripe', compact('data'));

        }
        elseif($request->payment == 'visa') {

        }
        else{
            echo "Cash On delivery";
        }
   

    }
    public function stripePyament(Request $req)
    {

        // Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey('sk_test_51KL8CMESGmCMbdvwmTQyWid4zjHxfehFJpfqB4MtjAi5fcDwL5yqqTz76eOL19P4lFXLHK0Ao1kwKftasXfHPjJj00uprsmSH6');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token ='tok_mastercard';
// $token = $_POST['stripeToken'];
$total= $req->total;
$charge = \Stripe\Charge::create([
  'amount' => $total*100,
  'currency' => 'usd',
  'description' => 'Example charge',
  'source' => $token ,
  'metadata' => ['order_id' => uniqid()],
    ]);
    // orders 
    $data = array ();
    $data['user_id']=Auth::id();
    $data['payment_type']= $req->payment;
    $data['payment_id']= $charge->payment_method;
    $data['payment_amount']= $charge->amount;
    $data['blnc_transection']= $charge->balance_transaction ;
    $data['stripe_order_id']= $charge->metadata->order_id  ;
   if(Session::has('coupons')){
    $data['subtotal']=Session::get('coupon')['balance'];
   }
   else{
    $data['subtotal']= $req->subtotal;
   }
    $data['shipping']= $req->shipping ;
    $data['vat']= $req->vat;
    $data['total']= $req->total;
    $data['status']=0;
    $data['month']= date('F');
    $data['date']= date('d-m-y') ;
    $data['year']= date('Y') ;
    $data['status_code']= mt_rand(100000,999999) ;
    $order_id= DB::table('orders')->insertGetId($data);
   
    // shipping details 
    $shipping = array();
    $shipping['order_id']= $order_id;
    $shipping['ship_name']= $req->name ;
    $shipping['ship_phone']= $req->phone ;
    $shipping['ship_email']= $req->email ;
    $shipping['ship_address']= $req->address ;
    $shipping['ship_city']= $req->city;
    DB::table('shipping')->insert($shipping);

    // orders details 
    $content = Cart::content();
    $details= array();
    foreach($content as $row){
        $details['order_id']= $order_id ;
        $details['product_id']= $row->id;
        $details['product_name']= $row->name ;
        $details['color']= $row->options->color;
        $details['size']= $row->options->size ;
        $details['quantity']= $row->qty ;
        $details['singleprice']= $row->price;
        $details['totalprice']= $row->qty*$row->price ;
        DB::table('orders_details')->insert($details);
    }
    Cart::destroy();
    if(Session::has('coupons')){
        Session::forget();
    }
    $notification=array(
        'messege'=>'Order placed Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->to('/')->with($notification);

    }



  
}




// jazz
// // jazzcash payment process


// 	//1.
// 		//get formatted price. remove period(.) from the price
// 		// $temp_amount 	= $product[0]->price*100;
// 		// $amount_array 	= explode('.', $temp_amount);
// 		$pp_Amount 		= 30*100;
// 		// $pp_Amount 		= $amount_array[0];
// 		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
		
// 		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 		//2.
// 		//get the current date and time
// 		//be careful set TimeZone in config/app.php
// 		$DateTime 		= new \DateTime();
// 		$pp_TxnDateTime = $DateTime->format('YmdHis');
// 		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
		
// 		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 		//3.
// 		//to make expiry date and time add one hour to current date and time
// 		$ExpiryDateTime = $DateTime;
// 		$ExpiryDateTime->modify('+' . 1 . ' hours');
// 		$pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');
// 		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 		//4.
// 		//make unique transaction id using current date
// 		$pp_TxnRefNo = 'T'.$pp_TxnDateTime;
// 		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

//         //$post_data

// 		$post_data =  array(
// 			"pp_Version" 			=> Config::get('constants.jazzcash.VERSION'),
// 			"pp_TxnType" 			=> "MWALLET",
// 			"pp_Language" 			=> Config::get('constants.jazzcash.LANGUAGE'),
// 			"pp_MerchantID" 		=> Config::get('constants.jazzcash.MERCHANT_ID'),
// 			"pp_SubMerchantID" 		=> "",
// 			"pp_Password" 			=> Config::get('constants.jazzcash.PASSWORD'),
// 			"pp_BankID" 			=> "TBANK",
// 			"pp_ProductID" 			=> "RETL",
// 			"pp_TxnRefNo" 			=> $pp_TxnRefNo,
// 			"pp_Amount" 			=> $pp_Amount,
// 			"pp_TxnCurrency" 		=> Config::get('constants.jazzcash.CURRENCY_CODE'),
// 			"pp_TxnDateTime" 		=> $pp_TxnDateTime,
// 			"pp_BillReference" 		=> "billRef",
// 			"pp_Description" 		=> "Description of transaction",
// 			"pp_TxnExpiryDateTime" 	=> $pp_TxnExpiryDateTime,
// 			"pp_ReturnURL" 			=> Config::get('constants.jazzcash.RETURN_URL'),
// 			"pp_SecureHash" 		=> "",
// 			"ppmpf_1" 				=> "1",
// 			"ppmpf_2" 				=> "2",
// 			"ppmpf_3" 				=> "3",
// 			"ppmpf_4" 				=> "4",
// 			"ppmpf_5" 				=> "5",
// 		);
		
// 		$pp_SecureHash = $this->get_SecureHash($post_data);
		
// 		$post_data['pp_SecureHash'] = $pp_SecureHash;
		
// 		$values = array(
// 			'TxnRefNo'    => $post_data['pp_TxnRefNo'],
// 			'amount' 	  => $product[0]->price,
// 			'description' => $post_data['pp_Description'],
// 			'status' 	  => 'pending'
// 		);