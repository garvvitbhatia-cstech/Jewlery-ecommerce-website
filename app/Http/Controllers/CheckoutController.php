<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\Specialties;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

use App\Models\Brands;
use App\Models\InnerPages;
use App\Models\Categories;
use App\Models\Products;
use App\Models\TempCart;
use App\Models\State;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Settings;
use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller{

	private static $Brands;
	private static $Country;
	private static $User;
	private static $InnerPages;
	private static $Categories;
	private static $Products;
	private static $TempCart;
	private static $State;
	private static $OrderDetails;
	private static $Orders;
	private static $Settings;
	private static $CustomersController;

	public function __construct(){
		self::$Brands = new Brands();
		self::$Country = new Country();
		self::$User = new User();
		self::$InnerPages = new InnerPages();
		self::$Categories = new Categories();
		self::$Products = new Products();
		self::$TempCart = new TempCart();
		self::$State = new State();
		self::$Orders = new Orders();
		self::$OrderDetails = new OrderDetails();
		self::$Settings = new Settings();
		self::$CustomersController = new CustomersController();
	}

	#checkout
    public function checkout(Request $request){

		if(!$request->session()->has('login_user_email')){return redirect('/');}
		$this->generateTempSessionKey($request);
		$siteUrl = env('SITE_URL');
		$section7 = self::$InnerPages->where('status',1)->where('id', 7)->first();		
		$section8 = self::$InnerPages->where('status',1)->where('id', 8)->first();		
		$section9 = self::$InnerPages->where('status',1)->where('id', 9)->first();
		$inner_page = self::$InnerPages->where('id',20)->where('status',1)->first();
		$items = self::$TempCart->where('user_id',Session::get('login_user_id'))->get();	
		$totalPrice = 0;
		foreach($items as $key => $item){

			$productData = self::$Products->select('title','amount','gross_weight','rubellite_weight','tanzanite_weight','slug','category_id','image')->where('id',$item->product_id)->first();	

			$item->product_name = $productData->title;
			$item->image = $productData->image;
			$item->weight = $productData->gross_weight;
			$item->slug = $productData->slug;
			$totalPrice = $totalPrice+$item->totalamount;
			$categoryData = self::$Categories->where('id',$productData->category_id)->first();	
			$item->cat_slug = isset($categoryData->slug) ? $categoryData->slug : '';

		}
		$country_list = self::$Country->where('status',1)->orderBy('ordering')->get();
		$userData = self::$User->where('id',Session::get('login_user_id'))->first();
        return view('/checkout/checkout',compact('inner_page','items','totalPrice','section7','section8','section9','siteUrl','country_list','userData'));

    }
	#orderSuccess
    public function orderSuccess(Request $request){
		if(!$request->session()->has('success_order_id')){return redirect('/');}
		$order = self::$Orders->where('id', Session::get('success_order_id'))->first();
		return view('checkout.order_thanks',compact('order'));
	}
	#orderFailed
    public function orderFailed(Request $request){
		if(!$request->session()->has('success_order_id')){return redirect('/');}
		$order = self::$Orders->where('id', Session::get('success_order_id'))->first();

		return view('checkout.order_failed',compact('order'));
	}



	#createOrder
    public function createOrder(Request $request){		

		$validator = Validator::make($request->all(), [

			'o_first_name' => 'required',
			'o_last_name' => 'required',
			'o_address' => 'required',
			'o_city' => 'required',
			'o_state' => 'required',
			'o_country' => 'required',			
			'o_pincode' => 'required|numeric',
			'o_mobile' => 'required|min:10'

		],[

			'o_first_name.required' => 'Please Enter First Name',
			'o_last_name.required' => 'Please Enter Last Name',
			'o_mobile.required' => 'Please Enter Mobile',
			'o_mobile.min' => 'Please enter valid contact number.',
			'o_address.required' => 'Please Enter Address',
			'o_city.required' => 'Please Enter City',
			'o_state.required' => 'Please Enter State',
			'o_country.required' => 'Please Select country',
			'o_pincode.required' => 'Please Enter Zipcode',

		]);

		if($validator->fails()){

			$errors = $validator->errors();

			if($errors->first('o_first_name')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_first_name')]); die;

			}

			if($errors->first('o_last_name')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_last_name')]); die;

			}

			if($errors->first('o_address')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_address')]); die;

			}

			if($errors->first('o_city')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_city')]); die;

			}

			if($errors->first('o_state')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_state')]); die;

			}

			if($errors->first('o_country')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_country')]); die;

			}

			if($errors->first('o_pincode')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_pincode')]); die;

			}

			if($errors->first('o_mobile')){

				echo json_encode(['success'=>false, 'message' => $errors->first('o_mobile')]); die;

			}		

		}else{

			$UserDetails = self::$User->where('id',Session::get('login_user_id'))->first();			
			$setNewAddressData['user_id'] = Session::get('login_user_id');
			$setNewAddressData['first_name'] = trim(ucwords($request->o_first_name));
			$setNewAddressData['last_name'] = trim(ucwords($request->o_last_name));
			$setNewAddressData['email'] = strtolower($UserDetails->email);
			$setNewAddressData['mobile'] = $request->o_mobile;
			$setNewAddressData['address'] = $request->o_address;
			$setNewAddressData['city'] = trim(ucwords($request->o_city));
			$setNewAddressData['state'] = trim(ucwords($request->o_state));
			$setNewAddressData['country'] = trim(ucwords($request->o_country));
			$setNewAddressData['zip_code'] = $request->o_pincode;
			$setNewAddressData['mobile2'] = $request->o_mobile2;	
					
			$result = $this->saveOrder($request);

			if($result['status'] == 'Success'){
				
				$orderData = self::$Orders->where('id',$result['order_id'])->first();	
				
				$requestString = '{"order_id":"'.$orderData->id.'","amount": "'.$orderData->total.'","customer_id":"'.Session::get('login_user_id').'","customer_email": "'.$orderData->customer_email.'","customer_phone": "'.$orderData->customer_mobile.'","payment_page_client_id": "hdfcmaster","action": "paymentPage","currency": "INR","return_url": "https://sgjart.com/update-order-status","description": "Complete your payment","first_name": "'.ucwords($request->o_first_name).'","last_name": "'.ucwords($request->o_last_name).'"}';
				
				//Log:info('File Details: '.$requestString,['time'=>\date('Y-m-d H:i:s')]);
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://smartgateway.hdfcbank.com/session',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS =>'{"order_id":"'.$orderData->id.'","amount": "'.$orderData->total.'","customer_id":"'.Session::get('login_user_id').'","customer_email": "'.$orderData->customer_email.'","customer_phone": "'.$orderData->customer_mobile.'","payment_page_client_id": "hdfcmaster","action": "paymentPage","currency": "INR","return_url": "https://sgjart.com/update-order-status","description": "Complete your payment","first_name": "'.ucwords($request->o_first_name).'","last_name": "'.ucwords($request->o_last_name).'"}',
				  CURLOPT_HTTPHEADER => array(
					'x-merchantid: HIK679', //SG2954
					'x-customerid: '.Session::get('login_user_id'),
					'Authorization: Basic OEUzRjNGMjRFQ0E0NUZCQjZEOTU0MjE3NjY1OThG',
					'Content-Type: application/json'
				  ),
				));
				
				$response = curl_exec($curl);
				
				//Log:info('File Details: '.$requestString.'File Details: '.$response,['time'=>\date('Y-m-d H:i:s')]);
				curl_close($curl);
				$data = json_decode($response);
				$paymentUrl = '';
				if(isset($data->payment_links->web)){
					$paymentUrl = $data->payment_links->web;
				}
				echo json_encode(['success'=>true, 'message' => 'Order Created Successfully.', 'payment_url' => $paymentUrl]); die;
			}else{
				echo json_encode(['success'=>false, 'message' => 'Internal Error']); die;
			}
		}
	}
	#updateOrderStatus
    public function updateOrderStatus(){
		if($_POST['status'] == 'CHARGED'){
			
			$curl = curl_init();
			$url = 'https://smartgateway.hdfcbank.com/orders/'.$_POST['order_id'];
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_HTTPHEADER => array(
				'x-merchantid: HIK679', //SG2954
				'x-customerid: '.Session::get('login_user_id'),
				'Authorization: Basic OEUzRjNGMjRFQ0E0NUZCQjZEOTU0MjE3NjY1OThG'
			  ),
			));
			
			$response = curl_exec($curl);
			//Log:info('File Details: '.$url.$response,['time'=>\date('Y-m-d H:i:s')]);
			curl_close($curl);
			
			$statusResult = json_decode($response);
			
			if($statusResult->status == 'CHARGED'){
				TempCart::where('user_id',Session::get('login_user_id'))->delete();
				$orderData = self::$Orders->where('id',$_POST['order_id'])->first();	
				self::$CustomersController->setUserSession($orderData->user_id);
				self::$Orders->where('id',$_POST['order_id'])->update(['transaction_id' => $_POST['signature_algorithm'],'signature' => $_POST['signature'],'payment_status' => 1,'bank_response' => $response]);
				
				Session::put('success_order_id', $_POST['order_id']);								
				Session::save();
					
				return redirect('/order-success');
			}else{
				return redirect('/order-failed');
			}
		}else{

			return redirect('/order-failed');
		}
	}
	#saveOrder
    public function saveOrder($request){

		$txnid = 'SGJ-'.mt_rand(0000,9999).time();
		$paymentType = $request->payment_method;
		$UserDetails = self::$User->where('id',Session::get('login_user_id'))->first();

		$TempcartDtls = self::$TempCart->where('user_id',Session::get('login_user_id'))->get();
		if($TempcartDtls->count() > 0){

			$lastOrder = self::$Orders->orderBy('id','DESC')->first();
			if(!isset($lastOrder->id)){
				$orderID = date('y').'000000';
			}else{
				$newOrdId = (date('y').'000000');
				$orderID = $newOrdId+$lastOrder->id;
			}

			$TotalQty = 0;
			$OrdTotal = 0;
			$OrdSubTotal = 0;
			$Shipping = 0;
			$totalTax = 0;
			$totalWeight = 0;
			$totalWetArr= 0;
			$totalWet = 0;
			$checkExpDelivary = 0;
			$totalShipping = $grandTotal = $totalQty = $subTotal = 0;

			foreach($TempcartDtls as $TempcartDtl){

				$productData = self::$Products->where('id',$TempcartDtl->product_id)->first();
				$quantity = $TempcartDtl->quantity;
				$rowAmt = $productData->amount;
				$OrdTotal = $OrdTotal + $rowAmt;
				$MRP = $rowAmt;	
				if($TempcartDtl->quantity <= 0){
					$TempcartDtl->quantity = 1;
				}
				$totalAmt = $MRP * $TempcartDtl->quantity;
				$firstPrice = $totalAmt;
				$grandTotal = $grandTotal + $firstPrice;
				if($TempcartDtl->shipping != "" && $TempcartDtl->shipping > 0){
					$shippingAmit = $TempcartDtl->shipping * $TempcartDtl->quantity;
				}else{
					$shippingAmit = 0;	
				}
				$firstShipping = $shippingAmit;
				$totalShipping = $totalShipping + $firstShipping;
				$firstQty = $TempcartDtl->quantity;
				$totalQty = $totalQty + $firstQty;
				$firstSubTotal = $MRP;
				$subTotal = $subTotal + $firstSubTotal;					
				$shipping = 0.00;
			}
			#set shipping
			$shippingCost = 0;
			$shipping = $shippingCost;		
			$DelivaryChareges  = 0;
			if(empty($txnid)){
				$txnid = '';
			}
			$totalShipping = $shipping;
			$couponTotal = 0;
			$setData['discount'] = 0;
			if(Session::has('couponcode.discount')){
				$setData['discount'] = Session::get('couponcode.discount');
				$couponTotal = $setData['discount']; 
			}
			if(Session::has('couponcode.coupontitle')){
				$setData['coupon_code'] = Session::get('couponcode.coupontitle');
			}
			
			$countryId = 0;
			$countryData = self::$Country->where('country_name',$request->o_country)->first();
			if(isset($countryData->id)){
				$countryId = $countryData->id;
			}
			
			self::$User->where('id',Session::get('login_user_id'))->update(['address' => $request->o_address,'city' => $request->o_city,'state' => $request->o_state,'country' => $countryId,'zipcode' => $request->o_pincode]);
			
			$grantTot = $grandTotal+$DelivaryChareges+$totalShipping;
			$grantTot = floatval($grantTot-$couponTotal);
			$setData['invoice_no'] = 'SGJ'.$UserDetails->id.'-'.mt_rand(1000,9999);
			$setData['order_id'] = $orderID;			
			$setData['transaction_id'] = $txnid;
			$setData['order_date'] = date('Y-m-d');
			$setData['order_year'] = date('Y');
			$setData['payment_type'] = $paymentType;
			$setData['payment_status'] = 2;
			$setData['user_id'] = $UserDetails->id;
			$setData['order_status'] = 'New Order';
			$setData['total'] = $grantTot;
			$setData['shipping'] = $totalShipping;
			$setData['tax'] = "";
			$setData['quantity'] = $totalQty;
			$setData['customer_name'] = $request->o_first_name.' '.$request->o_last_name;
			$setData['customer_address'] = $request->o_address;
			$setData['customer_city'] = $request->o_city;
			$setData['customer_state'] = $request->o_state;
			$setData['customer_country'] = $request->o_country;
			$setData['customer_zipcode'] = $request->o_pincode;
			$setData['customer_mobile'] = $request->o_mobile;
			$setData['customer_email'] = strtolower($UserDetails->email);
			$orderRecord = self::$Orders->CreateRecord($setData);	
			$setDataOrder['invoice_id'] = 'SGJ'.$UserDetails->id.'-'.mt_rand(111,999).$orderRecord->id;
			self::$Orders->where('id',$orderRecord->id)->update($setDataOrder);

			foreach($TempcartDtls as $TempcartDtl){

				$productData = self::$Products->where('id',$TempcartDtl->product_id)->first();	
				$brandData = self::$Brands->where('id',$productData->brand)->first();
				$categoryData = self::$Categories->where('id',$productData->category_id)->first();		

				$orderDtl['order_id'] = $orderRecord->id;
				$orderDtl['product_id'] = $TempcartDtl->product_id;
				$orderDtl['price'] = $productData->amount;
				//$orderDtl['discount'] = $setData['discount'];
				$orderDtl['shipping'] = 0;
				$orderDtl['ship_name'] = $request->o_first_name.' '.$request->o_last_name;
				$orderDtl['ship_email'] = strtolower($UserDetails->email);
				$orderDtl['ship_phone'] = $request->o_mobile;
				$orderDtl['ship_address'] = $request->o_address;					
				$orderDtl['totalamount'] = floatval($productData->amount*$TempcartDtl->quantity);
				$orderDtl['gross_weight'] = $productData->gross_weight;
				$orderDtl['rubelite_weight'] = $productData->rubellite_weight;
				$orderDtl['tanzanite_weight'] = $productData->tanzanite_weight;
				if(isset($brandData->id)){
					$orderDtl['product_brand'] = $brandData->title;
				}
				if(isset($categoryData->id)){
					$orderDtl['product_category'] = $categoryData->title;
				}
				$orderDtl['product_name'] = $productData->title;
				$orderDtl['price_usd'] = $productData->usd_price;
				$orderDtl['quantity'] = $productData->quantity;
				self::$OrderDetails->CreateRecord($orderDtl);				
			}

			if(Session::has('couponcode.price')){
				if(Session::has('couponcode.price')){
					Session::forget('couponcode.price');
				}
				if(Session::has('couponcode.coupontitle')){
					Session::forget('couponcode.coupontitle');
				}		
				if(Session::has('couponcode.discount')){
					Session::forget('couponcode.discount');	
				}
				Session::save();
			}
			return ['status' => 'Success','order_id' => $orderRecord->id];
		}else{
			return ['status' => 'CartEmpty','order_id' => 0];
		}
		return ['status' => 'Error','order_id' => 0];
	}
	#getShippingCost
    public function getShippingCost($zipcode){
		$shippingCount = self::$ShippingZipcodes->where('zip_code',$zipcode)->where('status',1)->first();
		if(isset($shippingCount->id)){
			$shipCost = $shippingCount->vrl_cost;
		}else{
			$shipCost = 0;
		}
		$cartItems = self::$TempCart->where('user_id',Session::get('login_user_id'))->get();
		$totalQty = 0;
		foreach($cartItems as $key => $cartItem):
			$rowQty = $cartItem->quantity;
			$totalQty = $totalQty + $rowQty;
		endforeach;
		$totalShipAmt = $shipCost * $totalQty;
		return $totalShipAmt;		
	}
	#getAllAddress
    public function getAllAddress(Request $request){
		$addresses = self::$Address->where('user_id',Session::get('login_user_id'))->orderBy('id','ASC')->get();	
        return view('/checkout/address',compact('addresses'));
    }
	#saveAddressInfo
    public function saveAddressInfo(Request $request){

		$validator = Validator::make($request->all(), [

			'first_name' => 'required',

			'last_name' => 'required',

			'email' => 'required|email',

			'mobile' => 'required|numeric',

			'address' => 'required',

			'city' => 'required',

			'state' => 'required',

			'zip_code' => 'required|numeric',

		],[

			'first_name.required' => 'Please enter firstname',

			'last_name.required' => 'Please enter last',

			'email.required' => 'Please enter email',

			'mobile.required' => 'Please enter mobile',

			'address.required' => 'Please enter address',

			'city.required' => 'Please enter city',

			'state.required' => 'Please enter state',

			'zip_code.required' => 'Please enter zip_code',

		]);

		if($validator->fails()){

			$errors = $validator->errors();

			if($errors->first('first_name')){

				echo json_encode(['success'=>false, 'message' => $errors->first('first_name')]); die;

			}

			if($errors->first('last_name')){

				echo json_encode(['success'=>false, 'message' => $errors->first('last_name')]); die;

			}

			if($errors->first('email')){

				echo json_encode(['success'=>false, 'message' => $errors->first('email')]); die;

			}

			if($errors->first('mobile')){

				echo json_encode(['success'=>false, 'message' => $errors->first('mobile')]); die;

			}

			if($errors->first('address')){

				echo json_encode(['success'=>false, 'message' => $errors->first('address')]); die;

			}

			if($errors->first('city')){

				echo json_encode(['success'=>false, 'message' => $errors->first('city')]); die;

			}

			if($errors->first('state')){

				echo json_encode(['success'=>false, 'message' => $errors->first('state')]); die;

			}

			if($errors->first('zip_code')){

				echo json_encode(['success'=>false, 'message' => $errors->first('zip_code')]); die;

			}

		}else{

			

			$zipcodeData = self::$ShippingZipcodes->where('zip_code',$request->zip_code)->where('status',1)->first();

			if(isset($zipcodeData->state_id) && isset($zipcodeData->zip_code)){

				$stateCount = self::$State->where('id',$zipcodeData->state_id)->where('status',1)->count();

				if($stateCount == 0){

					echo json_encode(['success'=>false, 'message' => 'Delivery services to this PIN is not available']); die;

				}

			}else{

				echo json_encode(['success'=>false, 'message' => 'Delivery services to this PIN is not available']); die;

			}

			

			$setData['user_id'] = Session::get('login_user_id');

			$setData['first_name'] = trim(ucwords($request->first_name));

			$setData['last_name'] = trim(ucwords($request->last_name));

			$setData['email'] = strtolower($request->email);

			$setData['mobile'] = $request->mobile;

			$setData['address'] = $request->address;

			$setData['city'] = trim(ucwords($request->city));

			$setData['state'] = trim(ucwords($request->state));

			$setData['zip_code'] = $request->zip_code;

			$setData['mobile2'] = $request->mobile2;

			

			if($request->address_id > 0){

				self::$Address->where('id',$request->address_id)->update($setData);

			}else{

				self::$Address->CreateRecord($setData);

			}

			

			echo json_encode(['success'=>true, 'message' => 'Shipping address updated successfully.']); die;

		}

	}

	#removeAddress

    public function removeAddress(Request $request){

		$validator = Validator::make($request->all(), [

			'aid' => 'required|numeric',

		],[

			'aid.required' => 'Please enter aid',

		]);

		if($validator->fails()){

			$errors = $validator->errors();

			if($errors->first('aid')){

				echo json_encode(['success'=>false, 'message' => $errors->first('aid')]); die;

			}

		}else{

			self::$Address->where('id',$request->aid)->delete();

			echo json_encode(['success'=>true, 'message' => 'Shipping address deleted successfully']); die;

		}

	}

	#getAddressInfo

    public function getAddressInfo(Request $request){

		$validator = Validator::make($request->all(), [

			'aid' => 'required|numeric',

		],[

			'aid.required' => 'Please enter aid',

		]);

		if($validator->fails()){

			$errors = $validator->errors();

			if($errors->first('aid')){

				echo json_encode(['success'=>false, 'message' => $errors->first('aid')]); die;

			}

		}else{

			$addresses = self::$Address->where('id',$request->aid)->first();

			echo json_encode(['success'=>true, 'address' => $addresses]); die;

		}

	}

}

