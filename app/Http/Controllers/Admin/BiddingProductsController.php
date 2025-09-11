<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\BiddingProducts;

use App\Models\Categories;

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



class BiddingProductsController extends Controller{

    private static $BiddingProducts;

	private static $Categories;

    private static $TokenHelper;

    public function __construct(){

        self::$BiddingProducts = new BiddingProducts();

		self::$Categories = new Categories();

        self::$TokenHelper = new TokenHelper();

    }



    #admin dashboard page

    public function getList(Request $request){

        if (!$request->session()->has('admin_email')){

            return redirect('/admin/');

        }
        $category_list = $this->getCategory();
        return view('/admin/bidding_products/index',compact('category_list'));

    }



    public function listPaginate(Request $request){

        if (!$request->session()->has('admin_email')){

            return redirect('/admin/');

        }

        $query = self::$BiddingProducts->where('status', '!=', 3);

        if ($request->input('category_id') && $request->input('category_id') != ""){

            $category_id = $request->input('category_id');

            $query->where('category_id', $category_id);

        }

        if ($request->input('title') && $request->input('title') != ""){

            $title = $request->input('title');

            $query->where('title', 'like', '%'.$title.'%');

        }

        $records = $query->orderBy('id', 'DESC')->paginate(20);

        return view('/admin/bidding_products/paginate', compact('records'));

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

				'start_price' => 'required', 

                'start_date' => 'required', 

                'end_date' => 'required', 

			], [

				'title.required' => 'Please enter title.',

				'amount.required' => 'Please enter amount.',

				'start_price.required' => 'Please enter start price.',

                'start_date.required' => 'Please enter start date.',

                'end_date.required' => 'Please enter end date.'

			]);

            if ($validator->fails()){

                $errors = $validator->errors();

                if ($errors->first('start_date')){

                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('start_date')));

                    die;

                }

                if ($errors->first('end_date')){

                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('end_date')));

                    die;

                }

                if ($errors->first('start_price')){

                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('start_price')));

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

				if (!self::$BiddingProducts->ExistingRecord($request->input('title'))) {

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

					$setData['title'] = $request->input('title');	

					$setData['slug'] = Str::slug($request->input('title'));

					$setData['amount'] = $request->input('amount');

					$setData['start_price'] = $request->input('start_price');

					$setData['category_id'] = $request->input('category_id');

					$setData['content'] = $request->input('content');

					$setData['heading'] = $request->input('heading');

					$setData['description'] = $request->input('description');

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

					$setData['seo_title'] = $request->input('seo_title');

					$setData['seo_description'] = $request->input('seo_description');

					$setData['seo_keyword'] = $request->input('seo_keyword');

					$setData['robot_tags'] = $request->input('robot_tags');

                    $setData['start_date'] = $request->input('start_date');

                    $setData['end_date'] = $request->input('end_date');

                    $setData['quantity'] = $request->input('quantity');

                    $setData['start_date_str'] = strtotime($request->input('start_date'));

                    $setData['end_date_str'] = strtotime($request->input('end_date'));

					$record = self::$BiddingProducts->CreateRecord($setData);

					echo json_encode(array('heading' => 'Success', 'msg' => 'Product added successfully'));

					die;

				}else{

					return json_encode(array('heading' => 'Error', 'msg' => 'Product already exists.'));

                    die;

				}

            }

        }

		$category_list = $this->getCategory();

        return view('/admin/bidding_products/add-page',compact('category_list'));

    }

    

    #edit Service Type

    public function editPage(Request $request, $row_id){

        $RowID = base64_decode($row_id);

        if (!$request->session()->has('admin_email')){

            return redirect('/admin/');

        }

        $rowData = self::$BiddingProducts->where(array('id' => $RowID))->first();

        if ($request->input()){

            $validator = Validator::make($request->all(), [

				'title' => 'required', 

				'amount' => 'required', 

				'start_price' => 'required', 

                'start_date' => 'required', 

                'end_date' => 'required', 

			], [

				'title.required' => 'Please enter title.',

				'amount.required' => 'Please enter amount.',

				'start_price.required' => 'Please enter start price.',

                'start_date.required' => 'Please enter start date.',

                'end_date.required' => 'Please enter end date.'

			]);

            if ($validator->fails()){

                $errors = $validator->errors();

                if ($errors->first('start_date')){

                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('start_date')));

                    die;

                }

                if ($errors->first('end_date')){

                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('end_date')));

                    die;

                }

                if ($errors->first('start_price')){

                    return json_encode(array('heading' => 'Error', 'msg' => $errors->first('start_price')));

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

				$setData['slug'] = Str::slug($request->input('title'));

				$setData['amount'] = $request->input('amount');

				$setData['start_price'] = $request->input('start_price');

				$setData['category_id'] = $request->input('category_id');

				$setData['content'] = $request->input('content');

				$setData['heading'] = $request->input('heading');

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

				$setData['description'] = $request->input('description');

				$setData['seo_title'] = $request->input('seo_title');

				$setData['seo_description'] = $request->input('seo_description');

				$setData['seo_keyword'] = $request->input('seo_keyword');

				$setData['robot_tags'] = $request->input('robot_tags');

                $setData['start_date'] = $request->input('start_date');

                $setData['end_date'] = $request->input('end_date');

                $setData['quantity'] = $request->input('quantity');

                $setData['start_date_str'] = strtotime($request->input('start_date'));

                $setData['end_date_str'] = strtotime($request->input('end_date'));



                self::$BiddingProducts->UpdateRecord($setData);

            }

            echo json_encode(array('heading' => 'Success', 'msg' => 'Product updated successfully'));

            die;

        }

        if (isset($rowData->id)){

			$category_list = $this->getCategory();

            return view('/admin/bidding_products/edit-page', compact('rowData', 'row_id','category_list'));

        } else {

            return redirect('/admin/bidding-products');

        }

    }

	

	public function getCategory(){

		return self::$Categories->where(array('status' => 1, 'parent_id' => 0))->pluck('title','id');

	}

}

