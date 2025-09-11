<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\User;
use App\Models\Categories;
use App\Models\Enquiries;
use App\Models\BiddingProducts;
use App\Models\Products;
use App\Models\UserBiddings;
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

use App\Mail\NewsletterMail;
use App\Mail\ContactMail;

use App\Models\TempCart;
use App\Models\State;
use App\Models\CouponCodes;

class AjaxController extends Controller{

    private static $TokenHelper;
	private static $UserBiddings;
	private static $Categories;
	private static $BiddingProducts;
	private static $Enquiries;
	private static $TempCart;
	private static $CouponCodes;
	private static $User;
	private static $Products;
	
	public function __construct(){
        self::$TokenHelper = new TokenHelper();
		self::$Products = new Products();
		self::$UserBiddings = new UserBiddings();
		self::$Categories = new Categories();
		self::$BiddingProducts = new BiddingProducts();
		self::$Enquiries = new Enquiries();
		self::$TempCart = new TempCart();
		self::$CouponCodes = new CouponCodes();
		self::$User = new User();
	}
	
	public function addNewsletter(Request $request){
		if(!empty($request->email) && filter_var($request->email, FILTER_VALIDATE_EMAIL)){						
			$this->newsletter($request->email);
		}
	}

	public function getBiddingProductDetails(Request $request){
		if($request->ajax()){
			$postData = $request->all();
			$pid = base64_decode($postData['pid']);
			$product = self::$BiddingProducts->where('id',$pid)->first();
			$category = self::$Categories->where('id',$product->category_id)->first();

			return view('ajax.bidding_details',compact('product','category'));
		}
	}

	public function addNewBid(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		if($request->ajax()){
			$postData = $request->all();
			$status = "Error";
			$pid = base64_decode($postData['pid']);
			$price = $postData['price'];
			$comment = $postData['comment'];
			if($pid != '' && $price != '' && is_numeric($price)){
				$product = self::$BiddingProducts->where('id',$pid)->first();
				if(isset($product->id)){
					$start_price = $product->start_price;
					if($price > $start_price){
						$status = "Success";
						$data['user_id'] = Session::get('login_user_id');
						$data['product_id'] = trim($pid);
						$data['bidding_price'] = trim($price);
						$data['comment'] = trim($comment);						
						$data['start_price'] = $start_price;
						$data['bidding_date'] = date('Y-m-d');
						$record = self::$UserBiddings->CreateRecord($data);
					}else{
						$status = "priceError";
					}
				}else{
					$status = "Error";
				}
			}else{
				$status = "Error";
			}
			echo $status;		
		}
		exit;
	}
	
	public function saveEnquiry(Request $request){
		if($request->ajax()){
			$postData = $request->all();
			$validator = Validator::make($request->all(), [
				'c_name' => 'required',
				'c_email' => 'required|email',
				'c_mobile' => 'required|digits:10',
				'c_message' => 'required',
			],[
				'c_name.required' => 'Please enter name',
				'c_email.required' => 'Please enter email',
				'c_email.email' => 'Please enter valid email',
				'c_mobile.required' => 'Please enter mobile',
				'c_mobile.digits' => 'Please enter valid mobile',
				'c_message.required' => 'Please enter message',
			]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('c_name')){
					echo json_encode(['success'=>false, 'message' => $errors->first('c_name')]); die;
				}
				if($errors->first('c_email')){
					echo json_encode(['success'=>false, 'message' => $errors->first('c_email')]); die;
				}
				if($errors->first('c_mobile')){
					echo json_encode(['success'=>false, 'message' => $errors->first('c_mobile')]); die;
				}
				if($errors->first('c_message')){
					echo json_encode(['success'=>false, 'message' => $errors->first('c_message')]); die;
				}
			}else{
				$data['name'] = trim(ucwords($request->c_name));
				$data['contact'] = trim($request->c_mobile);
				$data['email'] = trim($request->c_email);
				$data['message'] = $request->c_message;
				$record = self::$Enquiries->CreateRecord($data);
				echo json_encode(['success'=>true, 'message' => 'Enquiry send successfully']); die;
			}
		}
	}

	public function applyCouponCode(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		if($request->ajax()){			
			$postData = $request->all();
			$msg = 'Coupon code does not exists.';
			$status = 'Pending';
			$price = 0.00;
			$discount = 0.00;
			$seterror = array();
			$postData = $request->all();
			$cctitle = '';
			if(isset($postData['couponcode']) && !empty($postData['couponcode'])){
				if($request->session()->has('couponcode.price')){
					Session::forget('couponcode.price');
					Session::forget('couponcode.discount');
					Session::save();
				}				
			}
			$couponDataCount = self::$CouponCodes->where('title',$postData['couponcode'])->count();
			$TempcartDtls = self::$TempCart->where('user_id',Session::get('login_user_id'))->get();
			if($couponDataCount > 0 && $TempcartDtls->count()>0){
				$totalShipping = $grandTotal = $totalQty = $OrdTotal = $subTotal = $grandTotal = 0;				
				foreach($TempcartDtls as $TempcartDtl){
					$productData = self::$Products->where('id',$TempcartDtl->product_id)->first();
					$MRP = $productData->amount;
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
					$shipping = 0.00;						
				}
				$grantTot = $grandTotal+$totalShipping;
				$total_amount = $grantTot;
				
				$couponData = self::$CouponCodes->where(array('title' => $postData['couponcode']))->first();
				$cctitle = $couponData->title;
				if(time() >=  $couponData->start_date_str && time() <= $couponData->end_date_str && $couponData->status == 1){
					if($couponData->discount_type == 'Amount'){
						if($couponData->amount <= $total_amount){
							$price = $total_amount - $couponData->amount;
							$discount = $couponData->amount;
						}else{
							$price = 0.00;
							$discount = $total_amount;
						}
					}else{
						$discount = ($total_amount*$couponData->amount)/100;
						$price = $total_amount-$discount;
					}
					###########################################
					Session::put('couponcode.price',$price);
					Session::put('couponcode.coupontitle',$postData['couponcode']);
					Session::put('couponcode.discount',$discount);
					Session::save();	
					$msg = 'Coupon code applied successfully.';
					$status = 'Success';
				}else if(time() >=  $couponData->start_date_str && time() <= $couponData->end_date_str && $couponData->status == 2){
					$msg = 'Coupon code not active.';
				}else if(time() >= $couponData->end_date){
					$msg = 'Coupon code expired.';
				}else{
					$msg = 'Coupon code does not exists.';
				}
			}
			echo json_encode(array('msg' => $msg, 'status' => $status, 'price' => $price, 'discount' => $discount, 'couponcode_title' => $cctitle));
		}
		exit;
	}

	public function deleteSessionCoupon(){
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
		return redirect()->back();
	}

}