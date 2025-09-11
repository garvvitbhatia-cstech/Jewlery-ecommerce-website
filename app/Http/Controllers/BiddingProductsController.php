<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use App\Models\Categories;
use App\Models\User;
use App\Models\UserBiddings;
use App\Models\BiddingProducts;
use App\Models\Products;
use App\Models\ProductImages;
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

class BiddingProductsController extends Controller{
	private static $Products;
	private static $User;
	private static $ProductImages;
	private static $BiddingProducts;
	private static $UserBiddings;
	private static $Testimonials;
	private static $Categories;
	private static $InnerPages;
	private static $Settings;
    private static $TokenHelper;

	public function __construct(){
		self::$Products = new Products();	
		self::$User = new User();	
		self::$ProductImages = new ProductImages();	
		self::$BiddingProducts = new BiddingProducts();	
		self::$UserBiddings = new UserBiddings();	
		self::$Testimonials = new Testimonials();	
		self::$Categories = new Categories();	
		self::$InnerPages = new InnerPages();	
		self::$Settings = new Settings();
        self::$TokenHelper = new TokenHelper();
	}

	# admin login page
    public function products(Request $request,$slug = NULL){
		$inner_page = self::$InnerPages->where('status',1)->where('id', 23)->first();
		$categories = 	self::$Categories->where('status',1)->where('parent_id',0)->orderBy('title')->get();
		$cat_slug = 0;
		if($slug != ''){
			$title = NULL;
			if(!in_array($slug, ['Live','Upcoming','Auction Results'])){
				return redirect('/');
			}
			if($slug == 'Live'){
				$title = 'Live Products';
			}elseif($slug == 'Upcoming'){
				$title = 'Upcoming Products';
			}else{
				$title = 'Auction Results';
			}			
		}else{
			//return redirect('/');
		}	

		return view('bidding_products.products',compact('inner_page','categories','slug','cat_slug','title'));
	}

	# admin login page
    public function productsFilter(Request $request){
		if($request->ajax()){
			$postData = $request->all();
			$productQuery =  self::$BiddingProducts->where(array('status' => 1));
			$category_id = 0;
			$current_date = date('Y-m-d h:is');
			$current_time = time();
			$slug = $request->slug;
			if(isset($request->slug) && !empty($request->slug)){
				if($request->slug == 'Live'){
					$productQuery->where('start_date_str','<',$current_time)->where('end_date_str','>',$current_time);
				}
				if($request->slug == 'Upcoming'){
					$productQuery->where('start_date_str','>',$current_time);
				}
				if($request->slug == 'Auction Results'){
					$productQuery->where('end_date_str','<',$current_time);					
				}
			}
			if(isset($request->category_id) && !empty($request->category_id)){
				$productQuery->whereRaw('FIND_IN_SET(category_id,\''. $request->category_id .'\')');
			}
			$products = $productQuery->latest()->paginate(20);
			if($request->slug == 'Auction Results'){
				$min = array();
				foreach($products as $value){
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
			return view('bidding_products.products_filter',compact('products','category_id','slug','is_bidder_show'));
		}		
	}
	

}