<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use App\Models\Categories;
use App\Models\Brands;
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

class ProductsController extends Controller{
	private static $Products;
	private static $ProductImages;
	private static $BiddingProducts;
	private static $Brands;
	private static $Testimonials;
	private static $Categories;
	private static $InnerPages;
	private static $Settings;
    private static $TokenHelper;

	public function __construct(){
		self::$Products = new Products();	
		self::$ProductImages = new ProductImages();	
		self::$BiddingProducts = new BiddingProducts();	
		self::$Brands = new Brands();	
		self::$Testimonials = new Testimonials();	
		self::$Categories = new Categories();	
		self::$InnerPages = new InnerPages();	
		self::$Settings = new Settings();
        self::$TokenHelper = new TokenHelper();
	}
	#getProductImage
    public function getProductImage(Request $request){
		$img_url = $request->img_path;
		return view('products.get_image',compact('img_url'));
	}
	# products
    public function products(Request $request,$slug = NULL){
		$inner_page = self::$InnerPages->where('status',1)->where('id', 11)->first();
		$categories = 	self::$Categories->where('status',1)->where('parent_id',0)->orderBy('title')->get();
		$brands = 	self::$Brands->where('status',1)->orderBy('title')->get();
		$in_stock_count = 	self::$Products->where('status',1)->where('in_stock',1)->count();
		$out_stock_count = 	self::$Products->where('status',1)->where('in_stock',2)->count();
		$cat_slug = 0;
		if($slug != ''){
			$category_slug = 	self::$Categories->where('status',1)->where('slug',$slug)->first();
			if(isset($category_slug->id)){
				$cat_slug = $category_slug->id;
			}else{
				return redirect('/products');
			}
		}		

		return view('products.products',compact('inner_page','categories','brands','in_stock_count','out_stock_count','slug','cat_slug'));
	}

	# admin login page
    public function productsFilter(Request $request){
		if($request->ajax()){
			$postData = $request->all();
			$productQuery =  self::$Products->where(array('status' => 1));
			$category_id = 0;
			if(isset($request->slug) && !empty($request->slug)){
				$category = 	self::$Categories->where('status',1)->where('slug',$request->slug)->first();
				$productQuery->whereRaw('FIND_IN_SET(category_id,\''. $category->id .'\')');
				$category_id = $category->id;
			}
			if(isset($request->category_id) && !empty($request->category_id)){
				$productQuery->whereRaw('FIND_IN_SET(category_id,\''. $request->category_id .'\')');
			}
			if(isset($request->brand_id) && !empty($request->brand_id)){
				$productQuery->whereRaw('FIND_IN_SET(brand,\''. $request->brand_id .'\')');
			}
			if(isset($request->brand_id) && !empty($request->brand_id)){
				$productQuery->whereRaw('FIND_IN_SET(brand,\''. $request->brand_id .'\')');
			}
			if(isset($request->stock_status) && !empty($request->stock_status)){
				$productQuery->whereRaw('FIND_IN_SET(in_stock,\''. $request->stock_status .'\')');
			}
			$products = $productQuery->latest()->paginate(20);
			return view('products.products_filter',compact('products','category_id'));
		}		
	}

	# admin login page
    public function productDetails(Request $request,$slug = NULL){
		if(!empty($slug)){
			$product = self::$Products->where('status',1)->where('slug',$slug)->first();
			if(isset($product->id)){
				$inner_page = self::$InnerPages->where('status',1)->where('id', 1)->first();
				$section7 = self::$InnerPages->where('status',1)->where('id', 7)->first();
				$section8 = self::$InnerPages->where('status',1)->where('id', 8)->first();
				$section9 = self::$InnerPages->where('status',1)->where('id', 9)->first();
				$product_images = self::$ProductImages->where('status',1)->where('product_id',$product->id)->get();
				$recommended_products = self::$Products->where('status',1)->where('id','!=',$product->id)->where('category_id',$product->category_id)->latest()->limit(5)->get();
				
				return view('products.product_details',compact('inner_page','section7','section8','section9','product','product_images','recommended_products'));
			}else{
				return redirect('/');
			}
		}else{
			return redirect('/');
		}

	}

	# admin login page
    public function searchProducts(Request $request,$str = NULL){
		$inner_page = self::$InnerPages->where('status',1)->where('id', 1)->first();	
		if(!empty($str)){
			$products = self::$Products->where('status',1)->where('title','like','%'.$str.'%')->get();		
		}
		return view('products.search_products',compact('inner_page','products'));
	}
	

}