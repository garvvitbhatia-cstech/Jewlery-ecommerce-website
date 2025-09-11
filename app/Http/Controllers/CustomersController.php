<?php
namespace App\Http\Controllers;
use App\Models;
use Hash;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; 
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\InnerPages;
use App\Models\User;
use App\Models\Settings;
use App\Models\Products;
use App\Models\TempCart;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Country;
use App\Models\UserBiddings;
use App\Models\Brands;
use App\Models\Categories;

use Eventviva\ImageResize;
use Eventviva\ImageResizeException; 
use App\Mail\WelcomeMail;
use App\Mail\VerificationMail;
use App\Mail\SocialRegisterMail;
use App\Mail\CustomerWelcomeMail;
use Illuminate\Support\Facades\Mail;


class CustomersController extends Controller{
	
	private static $Orders;
	private static $Country;
	private static $Users;
	private static $InnerPages;
	private static $TempCart;
	private static $Settings;
	private static $Products;
	private static $UserBiddings;
	private static $Brands;
	private static $Categories;
	
	public function __construct(){
        self::$Users = new User();
		self::$Country = new Country();
		self::$Orders = new Orders();
		self::$InnerPages = new InnerPages();
		self::$Settings = new Settings();
		self::$Products = new Products();
		self::$TempCart = new TempCart();
		self::$UserBiddings = new UserBiddings();
		self::$Brands = new Brands();
		self::$Categories = new Categories();
    }
	
	public function login(Request $request,$type = NULL){		
		if($request->Ajax() || $request->Post()){
			if($request->ajax()){
				$validator = Validator::make($request->all(),[
					'email_login' => 'required',		
					'password_login' => 'required',
				],[
					'email_login.required' => 'Please enter email.',
					'password_login.required' => 'Please enter password.',
				]);
				
				if($validator->fails()){
					$errors = $validator->errors();
					return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>$validator->errors()->getMessages()]);
				}else{
					$User = self::$Users->where(array('email' => $request->email_login))->where('status','!=',3)->first();

					if(!$User){

						$User = self::$Users->where(array('mobile' => $request->email_login))->where('status','!=',3)->first();

						if(!$User){

							return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('email_login' => 'Username or password incorrect')]);

						}else{

							$PasswordMatch = password_verify($request->password_login, $User->password);
							if(!$PasswordMatch){
								return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('email_login' => 'Username or password incorrect')]);
							}else{
								if($User->status == 1){
									$this->setUserSession($User->id);								
									echo json_encode(array('heading'=>'Success','msg'=>''));
								}else{
									return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('email_login' => 'Your account is inactive, Please contact to admin.')]);
								}						
							}
							
						}
					}else{
						$PasswordMatch = password_verify($request->password_login, $User->password);
						if(!$PasswordMatch){
							return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('email_login' => 'Username or password incorrect')]);
						}else{
							if($User->status == 1){
								$this->setUserSession($User->id);								
								echo json_encode(array('heading'=>'Success','msg'=>''));
							}else{
								return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('email_login' => 'Your account is inactive, Please contact to admin.')]);
							}						
						}
					}
				}
			}
			exit;
		}
	}

	public function customerSignup(Request $request){							
		if($request->ajax()){
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'mobile' => 'required|digits:10', 
				'email' => 'required|email',				
				'password' => 'required|min:4|confirmed',
				'password_confirmation' => 'required|min:4'
            ],[
				'name.required' => 'Please enter name	.',
				'mobile.digits' => 'Please enter valid contact.',
				'mobile.required' => 'Please enter contact.',
				'email.required' => 'Please enter email.',
				'email.email' => 'Please enter valid email.',
				'password.required' => 'Please enter password.',
				'password.min' => 'Minimum 4 character password required.',
				'password_confirmation.required' => 'Please enter password.',
				'password_confirmation.min' => 'Minimum 4 character password required.',
				'password.confirmed' => 'Password and confirmed password must be same.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>$validator->errors()->getMessages()]);
			}else{
				$count = self::$Users->where('status','!=',3)->where('email',$request->input('email'))->count();
				if($count > 0){
					return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('email' => 'Email already exists.')]);
				}else{
					$countmobile = self::$Users->where('status','!=',3)->where('mobile',$request->input('mobile'))->count();
					if($countmobile > 0){
						return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('mobile' => 'Mobile number already exists.')]);
					}else{
						$setData['name'] = $request->input('name');
						$setData['mobile'] = $request->input('mobile');
						$setData['email'] = strtolower($request->input('email'));
						$password = password_hash($request->input('password'),PASSWORD_BCRYPT);
						$setData['password'] = $password;
						$setData['original_password'] = $request->input('password');					
						$record = self::$Users->CreateRecord($setData);
						# Set unique ID...
						$uniqueID = 'SGJ-'.rand(000,999).$record->id;
						self::$Users->where('id',$record->id)->update(['unique_id' => $uniqueID]);
						$user_details = self::$Users->where('id',$record->id)->first();	
						$this->setUserSession($user_details->id);				
						return response()->json(['status'=>'success', 'msg' => 'User register successfully']);
					}					
				}
			}
		}
		exit;			
	}

	#changePassword
    public function changePassword(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		$this->generateTempSessionKey($request);
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'current_password' => 'required',
				'new_password' => 'required',
				'confirm_password' => 'required'
			],[
				'current_password.required' => 'Please enter current password',
				'new_password.required' => 'Please enter new password',
				'confirm_password.required' => 'Please enter confirm password'
			]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('current_password')){
					echo json_encode(['success'=>false, 'message' => $errors->first('current_password')]); die;
				}
				if($errors->first('new_password')){
					echo json_encode(['success'=>false, 'message' => $errors->first('new_password')]); die;
				}
				if($errors->first('confirm_password')){
					echo json_encode(['success'=>false, 'message' => $errors->first('confirm_password')]); die;
				}
			}else{
				$userData = self::$Users->where('id',Session::get('login_user_id'))->first();
				if($userData->original_password != $request->current_password){
					echo json_encode(['success'=>false, 'message' => 'Invalid current password']); die;
				}
				if($request->new_password != $request->confirm_password){
					echo json_encode(['success'=>false, 'message' => 'Password do not match']); die;
				}
				$password = password_hash($request->input('password'),PASSWORD_BCRYPT);
				$setNewAddressData['password'] = $password;		
				$setNewAddressData['original_password'] = $request->new_password;
				self::$Users->where('id',Session::get('login_user_id'))->update($setNewAddressData);
				echo json_encode(['success'=>true, 'message' => 'Password updated successfully']); die;
			}
		}
		$inner_page = self::$InnerPages->where('id',14)->where('status',1)->first();
        return view('customers.change_password',compact('inner_page'));
    }

	# admin login page
    public function myOrders(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 15)->first();
		$section7 = self::$InnerPages->where('status',1)->where('id', 7)->first();		
		$section8 = self::$InnerPages->where('status',1)->where('id', 8)->first();		
		$section9 = self::$InnerPages->where('status',1)->where('id', 9)->first();
		$year = date('Y');
		$orders = self::$Orders->where('status',1)->where('user_id', Session::get('login_user_id'))->latest()->get();

		return view('pages.my_orders',compact('inner_page','year','orders','section7','section8','section9'));
	}

	# admin login page
    public function myBiddings(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 24)->first();
		$year = date('Y');
		$biddings = self::$UserBiddings->where('status',1)->where('user_id', Session::get('login_user_id'))->latest()->get();

		return view('pages.my_biddings',compact('inner_page','year','biddings'));
	}

	public function searchOrder(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		if($request->ajax()){
			$invoice_id = $request->oid;
			$orders = self::$Orders->where('status',1)->where('invoice_id','like','%'.$invoice_id.'%')->where('user_id', Session::get('login_user_id'))->latest()->get();
			return view('pages.my_orders_paginate',compact('orders'));
		}
		exit;
	}

	#myAccount
    public function myAccount(Request $request){
		if(!$request->session()->has('login_user_email')){return redirect('/');}
		$this->generateTempSessionKey($request);
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'o_name' => 'required',
				'o_address' => 'required',
				'o_city' => 'required',
				'o_state' => 'required',
				'o_mobile' => 'required',
				'o_country' => 'required',
				'o_pincode' => 'required|numeric',
			],[
				'o_name.required' => 'Please enter name',
				'o_address.required' => 'Please enter address',
				'o_city.required' => 'Please enter city',
				'o_mobile.required' => 'Please enter mobile',
				'o_state.required' => 'Please enter state',
				'o_country.required' => 'Please select country',
				'o_pincode.required' => 'Please enter zip_code',
			]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('o_name')){
					echo json_encode(['success'=>false, 'message' => $errors->first('o_name')]); die;
				}
				if($errors->first('o_mobile')){
					echo json_encode(['success'=>false, 'message' => $errors->first('o_mobile')]); die;
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
			}else{
				$setNewAddressData['name'] = trim(ucwords($request->o_name));
				$setNewAddressData['mobile'] = trim($request->o_mobile);
				$setNewAddressData['address'] = $request->o_address;
				$setNewAddressData['city'] = trim(ucwords($request->o_city));
				$setNewAddressData['state'] = trim(ucwords($request->o_state));
				$setNewAddressData['zipcode'] = $request->o_pincode;
				$setNewAddressData['country'] = $request->o_country;
				self::$Users->where('id',Session::get('login_user_id'))->update($setNewAddressData);
				echo json_encode(['success'=>true, 'message' => 'Profile updated successfully']); die;
			}
		}
		$country_list = self::$Country->where('status',1)->orderBy('ordering')->get();
		$inner_page = self::$InnerPages->where('id',13)->where('status',1)->first();
		$userData = self::$Users->where('id',Session::get('login_user_id'))->first();
        return view('customers.my_account',compact('inner_page','userData','country_list'));
    }
	
	public function forgotPassword(Request $request){
		if($request->Ajax()){
			$postData = $request->all();
			$msg = '';
			if(isset($postData) && !empty($postData)){
				$email = trim($postData['forgot_email']);
				if(filter_var(strtolower(trim($email)),FILTER_VALIDATE_EMAIL)){						
					$customerEmail = self::$Users->where('email',$email)->where('type','User')->first();			
					if(isset($customerEmail) && !empty($customerEmail->email)){
						if($customerEmail->status == 2){	
							return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('forgot_email' => 'Your account has been deactivated. Please contact to system administrator.')]);
						}else{
							try {
								$security_key = base64_encode(base64_encode($email));
								$setData['id'] = $customerEmail->id;
								$setData['security_key'] = $security_key;
								if(self::$Users->UpdateRecord($setData)){
									$siteUrl = trim(env('SITE_URL'));
									$customerEmail['link'] = $siteUrl.'reset-password/'.$email.'/'.$security_key;
								}
								return response()->json(['status' => 'success', 'msg' => 'Please Check Your Email To Reset Password.']);
							}
							catch(\Exception $e){
								//print_r($e->getMessage());
								return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('forgot_email' => 'Something went wrong.')]);
							}						
						}
					}else{
						return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('forgot_email' => 'No user is registered with this email address.')]);
					}
				}else{
					return response()->json(['status' => 'error', 'msg' => 'error',  'errors'=>array('forgot_email' => 'Please enter valid email address.')]);
				}
								
			}				
		}
		exit;
	}
		
	public function resetPassword(Request $request, $email=NULL,$securityKey=NULL){
		if(!empty($email) && !empty($securityKey)){
			$userDetail = self::$Users->where('email',$email)->where('security_key',$securityKey)->first();
			if($userDetail){	
				return view('customers.reset_password',compact('email','securityKey'));
			}else{
				return redirect('/')->with('error','The password reset link has expired, Please forgot password again.');
			}
		}else{
			return redirect('/login')->with('error','Something went wrong.');	
		}			
	}
	
	public function resetPasswordChange(Request $request){
		if($request->Ajax()){
			$postData = $request->all();
			if(!empty($postData)){
				$email = strtolower(trim($postData['email']));
				$security_key = $postData['security_key'];
				$userDetail = self::$Users->where('email',$email)->where('security_key',$security_key)->first();
				$setData['id'] = $userDetail->id;
				$setData['password'] = Hash::make($postData['new_password']);
				$setData['security_key'] = NULL;
				if(self::$Users->UpdateRecord($setData)){
					return response()->json(['status' => 'success']);
				}
			}
		}
		exit;
	}
	
	public function change_user_profile(Request $request){
		if($request->ajax()){
			$setData = array();
			$msg = [];
			$postData = $request->all();
			if(isset($postData) && !empty($postData)){
				$actual_image_name = time().rand().'.'.$request->profile_picture->extension();  
				$destination = base_path().'/public/assets/images/admin/';
				if($request->profile_picture->move($destination, $actual_image_name)){
					if($request->input('old_banner') != ""){
						if(file_exists($destination.$request->input('old_banner'))){
							unlink($destination.$request->input('old_banner'));
						}
					}
					return response()->json(['status' => 'success','img_name' => $actual_image_name, 'img_url' => asset('public/assets/images/admin/'.$actual_image_name)]);
				}else{
					return response()->json(['status' => 'error', 'msg' => 'Something went wrong']);
				}			
			}		
		}
		exit;
	}
	
	public function dashboard(Request $request){
		if(!$request->session()->has('auth.id') || $request->session()->get('auth.user_type') != 'User'){return redirect('/login');}
		$authId = $request->session()->get('auth.id');
		$authUserType = $request->session()->get('auth.user_type');
		$user = self::$Users->where('id',$authId)->first();
		
		return view('customers.dashboard',compact('user'));
	}


	#addToCart
    public function addToCart(Request $request){
		$validator = Validator::make($request->all(), [
			'pID' => 'required|numeric',
		],[
			'pID.required' => 'Please enter pID',
		]);
		if($validator->fails()){
			$errors = $validator->errors();
			if($errors->first('pID')){
				echo json_encode(['success'=>false, 'message' => $errors->first('pID')]); die;
			}
		}else{
			
			$productData = self::$Products->where('id',$request->post('pID'))->first();
			$brandData = self::$Brands->where('id',$productData->brand)->first();
			$categoryData = self::$Categories->where('id',$productData->category_id)->first();			
			if(isset($productData->id)){
				$FinalPrice = $productData->amount;
				$MRP = number_format($FinalPrice,2);			
				$totalMRP = $MRP;			
				$price = $productData->amount;			
				$qty = 1;
				if(isset($request->qty) && $request->qty > 0){
					$qty = $request->qty;
				}				
				$totalAmt = $price*$qty;				
				$setData['user_id'] = Session::get('login_user_id');
				$setData['product_id'] = $request->pID;
				$setData['price'] = $price;
				$setData['weight'] = $productData->gross_weight;
				$setData['totalamount'] = floatval($totalAmt);
				$setData['quantity'] = $qty;
				$setData['price_usd'] = $productData->usd_price;
				$setData['product_name'] = $productData->title;
				$setData['gross_weight'] = $productData->gross_weight;
				$setData['rubelite_weight'] = $productData->rubellite_weight;
				$setData['tanzanite_weight'] = $productData->tanzanite_weight;
				if(isset($brandData->id)){
					$setData['product_brand'] = $brandData->title;
				}
				if(isset($categoryData->id)){
					$setData['product_category'] = $categoryData->title;
				}
				$cartDetail = self::$TempCart->where('user_id',Session::get('login_user_id'))->where('product_id',$request->pID)->first();
				if(!isset($cartDetail->id)){
					$record = self::$TempCart->CreateRecord($setData);
				}				
				$cartCount = self::$TempCart->where('user_id',Session::get('login_user_id'))->count();
				return response()->json(['success'=>true, 'message' => 'Product added into cart successfully','cart_count' => $cartCount]);			
			}else{				
				$cartCount = self::$TempCart->where('user_id',Session::get('login_user_id'))->count();
				return response()->json(['success'=>false, 'message' => 'Invalid product','cart_count' => $cartCount]);
			}
		}
	}
	
	#removecart
    public function removeCart(Request $request){
		if($request->ajax()){
			$validator = Validator::make($request->all(), [
				'rowID' => 'required|numeric',
			],[
				'rowID.required' => 'Please enter rowID',
			]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('rowID')){
					echo json_encode(['success'=>false, 'message' => $errors->first('rowID')]); die;
				}
			}else{
				self::$TempCart->where('id',$request->rowID)->delete();
				return response()->json(['success'=>true, 'message' => 'Item removed successfully']);die;
			}
		}
		exit;
	}

	public function setUserSession($userID){		
		$items = self::$TempCart->where('user_id',Session::get('login_user_id'))->get();
		foreach($items as $key => $item){
			self::$TempCart->where('id',$item->id)->update(['user_id' => $userID]);
		}	
		$userData = self::$Users->where('id',$userID)->first();
		#set Session
		Session::put('login_unique_id', $userData->unique_id);
		Session::put('login_user_email', $userData->email);
		Session::put('login_user_name', $userData->name);
		Session::put('login_user_id', $userData->id);								
		Session::save();
		return true;
	}

	public function logout(Request $request){
		Session::flush();
		return redirect('/');
	}

}