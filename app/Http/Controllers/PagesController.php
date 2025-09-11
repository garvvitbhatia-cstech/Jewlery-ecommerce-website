<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Testimonials;
use App\Models\Categories;
use App\Models\Enquiries;
use App\Models\UserBiddings;
use App\Models\Banners;
use App\Models\Faqs;
use App\Models\TempCart;
use App\Models\BiddingProducts;
use App\Models\Products;
use App\Models\InnerPages;
use App\Models\Settings;
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

class PagesController extends Controller{
	private static $User;
	private static $Enquiries;
	private static $UserBiddings;
	private static $Products;
	private static $BiddingProducts;
	private static $TempCart;
	private static $Banners;
	private static $Testimonials;
	private static $Categories;
	private static $InnerPages;
	private static $Settings;
	private static $Faqs;
    private static $TokenHelper;

	public function __construct(){
		self::$User = new User();	
		self::$Enquiries = new Enquiries();	
		self::$UserBiddings = new UserBiddings();	
		self::$Products = new Products();	
		self::$BiddingProducts = new BiddingProducts();	
		self::$TempCart = new TempCart();
		self::$Faqs = new Faqs();
		self::$Banners = new Banners();
		self::$Testimonials = new Testimonials();	
		self::$Categories = new Categories();	
		self::$InnerPages = new InnerPages();	
		self::$Settings = new Settings();
        self::$TokenHelper = new TokenHelper();
	}

    # admin login page
    public function index(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 1)->first();
		$banners = self::$Banners->where('status',1)->latest()->get();		
		$section2 = self::$InnerPages->where('status',1)->where('id', 2)->first();		
		$section3 = self::$InnerPages->where('status',1)->where('id', 3)->first();		
		$section4 = self::$InnerPages->where('status',1)->where('id', 4)->first();		
		$section5 = self::$InnerPages->where('status',1)->where('id', 5)->first();		
		$section6 = self::$InnerPages->where('status',1)->where('id', 6)->first();		
		$section7 = self::$InnerPages->where('status',1)->where('id', 7)->first();		
		$section8 = self::$InnerPages->where('status',1)->where('id', 8)->first();		
		$section9 = self::$InnerPages->where('status',1)->where('id', 9)->first();
		$testimonials = self::$Testimonials->where('status',1)->latest()->get();
		$featured_categories = self::$Categories->where('status',1)->where('is_featured',1)->where('parent_id',0)->limit(3)->latest()->get();	
		$products = self::$Products->where('status',1)->latest()->limit(6)->get();
		$exclusive_products = self::$Products->where('status',1)->where('is_exclusive',1)->latest()->limit(6)->get();

		$current_date = date('Y-m-d h:is');
		$current_time = time();
		
		$live_products = self::$BiddingProducts->where('status',1)->where('start_date_str','<',$current_time)->where('end_date_str','>',$current_time)->latest()->limit(9)->get();

		$upcoming_products = self::$BiddingProducts->where('status',1)->where('start_date_str','>',$current_time)->latest()->limit(9)->get();

		$auction_results = self::$BiddingProducts->where('status',1)->where('end_date_str','<',$current_time)->latest()->limit(9)->get();

		$min = array();
		foreach($auction_results as $value){
			$user_bidding = self::$UserBiddings->where('status',1)->where('product_id',$value->id)->get();
			foreach($user_bidding as $bid_product){
				$min[] = $bid_product->bidding_price;
			}
			if(count($min)>0){
				$value->min = min($min);
				$value->max = max($min);
			}else{
				$value->min = 0;
				$value->max = 0;
			}
		}
		$is_bidder_show = 'No';
		if(Session::has('login_user_id')){
			$session_id = Session::get('login_user_id');
			$user_data = self::$User->select('id','is_bidder')->where('status',1)->where('id',$session_id)->first();
			if(isset($user_data->id)){
				$user_bid_status = $user_data->is_bidder;
				if($user_bid_status == 1){
					$is_bidder_show = 'Yes';
				}
			}			
		}		
        return view('pages.index',compact('inner_page','section2','section3','section4','section5','section6','section7','section8','section9','testimonials','featured_categories','products','live_products','upcoming_products','exclusive_products','banners','auction_results','is_bidder_show'));
    }	

	#faqs
    public function faqs(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('id',22)->where('status',1)->first();	
		$faqs = self::$Faqs->where('status',1)->orderBy('ordering','ASC')->get();		
        return view('/pages/faqs',compact('inner_page','faqs'));
    }

	# admin login page
    public function myCart(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 12)->first();
		$section7 = self::$InnerPages->where('status',1)->where('id', 7)->first();		
		$section8 = self::$InnerPages->where('status',1)->where('id', 8)->first();		
		$section9 = self::$InnerPages->where('status',1)->where('id', 9)->first();

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
		return view('pages.cart',compact('inner_page','section7','section8','section9','items','totalPrice'));
	}

	# admin login page
    public function contactUs(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 21)->first();
		return view('pages.contact_us',compact('inner_page'));
	}


	public function privacyPolicy(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 16)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

	public function shippingAndReturn(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 17)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

	public function termsAndConditions(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 18)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

	public function aboutUs(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 19)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

	public function metWholesale(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 26)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

	public function storeEvents(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 25)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

	public function licensees(Request $request){
		$this->generateTempSessionKey($request);
		$inner_page = self::$InnerPages->where('status',1)->where('id', 27)->first();
		return view('pages.inner_pages',compact('inner_page'));
	}

}