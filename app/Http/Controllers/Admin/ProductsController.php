<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Categories;
use App\Models\Brands;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Languages;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

class ProductsController extends Controller{
    private static $Products;
    private static $ProductImages;
	private static $Categories;
    private static $Brands;
    private static $TokenHelper;
    public function __construct(){
        self::$Products = new Products();
        self::$ProductImages = new ProductImages();
		self::$Brands = new Brands();
        self::$Categories = new Categories();
        self::$TokenHelper = new TokenHelper();
    }
    #admin dashboard page
    public function getList(Request $request){
        if (!$request->session()->has('admin_email')){
            return redirect('/admin/');
        }
       $category_list = $this->getCategory();
       return view('/admin/products/index',compact('category_list'));
    }
    public function listPaginate(Request $request){
        if (!$request->session()->has('admin_email')){
            return redirect('/admin/');
        }
        $query = self::$Products->where('status', '!=', 3);
        if ($request->input('category_id') && $request->input('category_id') != ""){
            $category_id = $request->input('category_id');
            $query->where('category_id', $category_id);
        }
        if ($request->input('title') && $request->input('title') != ""){
            $title = $request->input('title');
            $query->where('title', 'like', '%'.$title.'%');
        }
        $records = $query->orderBy('id', 'DESC')->paginate(20);
        return view('/admin/products/paginate', compact('records'));
    }    
    #add new Service Type
    public function addPage(Request $request){
        if (!$request->session()->has('admin_email')){
            return redirect('/admin/');
        }
        if ($request->input()){
            $validator = Validator::make($request->all(), [
				'title' => 'required', 
				'amount' => 'required', 
                'brand' => 'required', 
               
		], [
				'title.required' => 'Please enter title.',
				'amount.required' => 'Please enter amount.',
                'brand.required' => 'Please enter brand.',
			]);
            if ($validator->fails()){
                $errors = $validator->errors();
                if ($errors->first('brand')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('brand')));
                    die;
                }
                if ($errors->first('title')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('title')));
                    die;
                }
				if ($errors->first('amount')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('amount')));
                    die;
                }
                if ($errors->first('description')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('description')));
                    die;
                }
            } else {
				if (!self::$Products->ExistingRecord($request->input('title'))) {
					if (isset($request->image) && $request->image->extension() != ""){
						$validator = Validator::make($request->all(), [
							'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:10240'
						]);
						if ($validator->fails()){
							$errors = $validator->errors();
							return json_encode(array('heading' => 'Error', 'msg' => $errors->first('image')));
							die;
						} else {
							$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001, 999999)).uniqid(mt_rand().true).$request->file('image')).'.'.$request->image->extension());
							$destination = base_path().'/public/admin/images/teams/';
							$request->image->move($destination, $actual_image_name);
							$setData['image'] = $actual_image_name;
						}
					}
                    
					$setData['brand'] = $request->input('brand');	
                    $setData['title'] = $request->input('title');	
					$setData['slug'] = Str::slug($request->input('title'));
					$setData['amount'] = $request->input('amount');
                    $setData['usd_price'] = $request->input('usd_price');
					$setData['category_id'] = $request->input('category_id');
					$setData['content'] = $request->input('content');
					$setData['heading'] = $request->input('heading');
                    $setData['rating'] = $request->input('rating');
                    $setData['gross_weight'] = $request->input('gross_weight');
                    $setData['rubellite_weight'] = $request->input('rubellite_weight');
                    $setData['tanzanite_weight'] = $request->input('tanzanite_weight');
                    $setData['spinal_weight'] = $request->input('spinal_weight');
					$setData['emerald_weight'] = $request->input('emerald_weight');
                    $setData['blue_sapphire_weight'] = $request->input('blue_sapphire_weight');
                    $setData['multi_supphire_weight'] = $request->input('multi_supphire_weight');
                    $setData['rosecut_weight'] = $request->input('rosecut_weight');
                    $setData['diamond_polkies_weight'] = $request->input('diamond_polkies_weight');
                    $setData['basra_pearls_weight'] = $request->input('basra_pearls_weight');             
                    $setData['quantity'] = $request->input('quantity');
					$setData['description'] = $request->input('description');
					$setData['seo_title'] = $request->input('seo_title');
					$setData['seo_description'] = $request->input('seo_description');
					$setData['seo_keyword'] = $request->input('seo_keyword');
					$setData['robot_tags'] = $request->input('robot_tags');
                    $setData['in_stock'] = 2;
                   if($request->input('in_stock') && $request->input('in_stock') == 1){
                       $setData['in_stock'] = 1;
                   }
                    $setData['is_exclusive'] = 2;
                   if($request->input('is_exclusive') && $request->input('is_exclusive') == 1){
                       $setData['is_exclusive'] = 1;
                   }
					$record = self::$Products->CreateRecord($setData);
					echo json_encode(array('heading' => 'Success', 'msg' => 'Product added successfully'));
					die;
				}else{
					return json_encode(array('heading' => 'Error', 'msg' => 'Product already exists.'));
                    die;
				}
            }
        }
		$category_list = $this->getCategory();
        $brand_list = $this->getBrand();
        return view('/admin/products/add-page',compact('category_list','brand_list'));
    }    
    #edit Service Type
    public function editPage(Request $request, $row_id){
        $RowID = base64_decode($row_id);
        if (!$request->session()->has('admin_email')){
            return redirect('/admin/');
        }
        $rowData = self::$Products->where(array('id' => $RowID))->first();
        if ($request->input()){
            $validator = Validator::make($request->all(), [
				'title' => 'required', 
				'amount' => 'required', 
                'brand' => 'required', 
               
		], [
				'title.required' => 'Please enter title.',
				'amount.required' => 'Please enter amount.',
                'brand.required' => 'Please enter brand.',
			]);
            if ($validator->fails()){
                $errors = $validator->errors();
                if ($errors->first('brand')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('brand')));
                    die;
                }
                if ($errors->first('title')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('title')));
                    die;
                }
				if ($errors->first('amount')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('amount')));
                    die;
                }
                if ($errors->first('description')){
                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('description')));
                    die;
                }
            } else {
                if(self::$Products->ExistingRecordUpdate($request->input('title'), $RowID)){
                    echo json_encode(array('heading'=>'Error','msg'=>'Title already exists.'));die;
                }else{
                    if (isset($request->image) && $request->image->extension() != ""){
                        $validator = Validator::make($request->all(), ['image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:10240']);
                        if ($validator->fails()){
                            $errors = $validator->errors();
                            return json_encode(array('heading' => 'Error', 'msg' => $errors->first('image')));
                            die;
                        } else {
                            $actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001, 999999)).uniqid(mt_rand().true).$request->file('image')).'.'.$request->image->extension());
                            $destination = base_path().'/public/admin/images/teams/';
                            $request->image->move($destination, $actual_image_name);
                            $setData['image'] = $actual_image_name;
                            if ($rowData->image != ""){
                                if (file_exists($destination.$rowData->image)){
                                    unlink($destination.$rowData->image);
                                }
                            }
                        }
                    }
                    $setData['id'] = $RowID;
                    $setData['title'] = $request->input('title');	
                    $setData['brand'] = $request->input('brand');
                    $setData['slug'] = Str::slug($request->input('title'));
                    $setData['amount'] = $request->input('amount');
                    $setData['usd_price'] = $request->input('usd_price');
                    $setData['category_id'] = $request->input('category_id');
                    $setData['content'] = $request->input('content');
                    $setData['heading'] = $request->input('heading');
                    $setData['rating'] = $request->input('rating');
                    $setData['gross_weight'] = $request->input('gross_weight');
                    $setData['rubellite_weight'] = $request->input('rubellite_weight');
                    $setData['tanzanite_weight'] = $request->input('tanzanite_weight');
                    $setData['spinal_weight'] = $request->input('spinal_weight');
     				$setData['emerald_weight'] = $request->input('emerald_weight');
                    $setData['blue_sapphire_weight'] = $request->input('blue_sapphire_weight');
                    $setData['multi_supphire_weight'] = $request->input('multi_supphire_weight');
                    $setData['rosecut_weight'] = $request->input('rosecut_weight');
                    $setData['diamond_polkies_weight'] = $request->input('diamond_polkies_weight');
                    $setData['basra_pearls_weight'] = $request->input('basra_pearls_weight'); 
                    $setData['quantity'] = $request->input('quantity');
                    $setData['description'] = $request->input('description');
                    $setData['seo_title'] = $request->input('seo_title');
                    $setData['seo_description'] = $request->input('seo_description');
                    $setData['seo_keyword'] = $request->input('seo_keyword');
                    $setData['robot_tags'] = $request->input('robot_tags');
                    $setData['in_stock'] = 2;
                   	if($request->input('in_stock') && $request->input('in_stock') == 1){
                       $setData['in_stock'] = 1;
                   	}
                    $setData['is_sold'] = 2;
                   	if($request->input('is_sold') && $request->input('is_sold') == 1){
                       $setData['is_sold'] = 1;
                   	}
					$setData['is_exclusive'] = 2;
                   	if($request->input('is_exclusive') && $request->input('is_exclusive') == 1){
                       $setData['is_exclusive'] = 1;
                   	}
                    self::$Products->UpdateRecord($setData);
                    echo json_encode(array('heading' => 'Success', 'msg' => 'Product updated successfully'));
                    die;
               }
           }
            
        }
        if (isset($rowData->id)){
			$category_list = $this->getCategory();
            $brand_list = $this->getBrand();
            $product_images = self::$ProductImages->where(array('product_id' => $rowData->id))->where('status','!=',3)->latest()->get();
            return view('/admin/products/edit-page', compact('rowData', 'row_id','category_list','brand_list','product_images'));
        } else {
            return redirect('/admin/products');
        }
    }	

    public function uploadProductImages(Request $request){
        if($request->ajax()){
            if(!empty($_FILES)){
				$postData = $request->all();
                $msg = "Error";
                $fileName = $_FILES['file']['name']; //Get the image
                $file_temp_name = $_FILES['file']['tmp_name'];
                $pathInfo = pathinfo(basename($fileName));
                $ext = $request->file->extension();
                $checkImage = getimagesize($file_temp_name);
				$actual_image_name = sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('file')).$postData['id'].'.'.$request->file->extension();
				$destination2 = base_path().'/public/admin/images/products/';
                if($checkImage !== false){
					if($request->file->move($destination2, $actual_image_name)){						
						$setData['product_id'] = $request->input('id');
						$setData['image'] = $actual_image_name;
						$record = self::$ProductImages->CreateRecord($setData);
						
						$msg = "Success";
					}
                }
            }
            echo json_encode(array('msg' => $msg));
        }
        exit;
    }

    public function getBrand(){
		return self::$Brands->where(array('status' => 1))->pluck('title','id');
	}

	public function getCategory(){
		return self::$Categories->where(array('status' => 1, 'parent_id' => 0))->pluck('title','id');
	}

}
