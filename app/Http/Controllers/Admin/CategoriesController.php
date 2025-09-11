<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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



class CategoriesController extends Controller{



    private static $TokenHelper;

	private static $Categories;

	public function __construct(){

		self::$Categories = new Categories();

        self::$TokenHelper = new TokenHelper();

	}



    #admin dashboard page

    public function getList(Request $request){

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        return view('/admin/categories/index');

    }

    public function listPaginate(Request $request){

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        $query = self::$Categories->where('status', '!=', 3)->where('parent_id',0);



		if($request->input('title')  && $request->input('title') != ""){

            $title = $request->input('title');

            $query->where('title', 'like', '%'.$title.'%');

		}

		$records =  $query->orderBy('id', 'DESC')->paginate(20);

        return view('/admin/categories/paginate',compact('records'));

    }



    #add new Service Type

    public function addPage(Request $request){

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		if($request->input()){

			$validator = Validator::make($request->all(), [

                'title' => 'required', 

            ],[

                'title.required' => 'Please enter name.',

            ]);

			if($validator->fails()){

				$errors = $validator->errors();

				if($errors->first('title')){

                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;

				}

			}else{

			if(!self::$Categories->ExistingRecord($request->input('title'))){

				$parentData = NULL;

				if($request->input('parent_id') > 0){

					$parentData = self::$Categories->where(array('id' => $request->input('parent_id')))->first();

				}

				if(isset($request->image) && $request->image->extension() != ""){

					$validator = Validator::make($request->all(), [

						'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240'

					]);

					if($validator->fails()){

						$errors = $validator->errors();

						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;

					}else{

						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('image')).'.'.$request->image->extension());

						$destination = base_path().'/public/admin/images/teams/';

						$request->image->move($destination, $actual_image_name);

						$setData['image'] = $actual_image_name;						

					}

				}

				if(isset($request->icon) && $request->icon->extension() != ""){

					$validator = Validator::make($request->all(), [

						'icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240'

					]);

					if($validator->fails()){

						$errors = $validator->errors();

						return json_encode(array('heading'=>'Error','msg'=>$errors->first('icon')));die;

					}else{

						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('icon')).'.'.$request->icon->extension());

						$destination = base_path().'/public/admin/images/teams/';

						$request->icon->move($destination, $actual_image_name);

						$setData['icon'] = $actual_image_name;						

					}

				}

				$setData['is_featured'] = 2;
				if($request->input('is_featured') && $request->input('is_featured') == 1){
					$setData['is_featured'] = 1;
				}

				$setData['parent_id'] = $request->input('parent_id');

				$setData['title'] = $request->input('title');

				$setData['slug'] = Str::slug($request->input('title'));

				if($parentData != ''){

					$parentDataRoot = NULL;

					if($parentData->parent_id > 0){

						$parentDataRoot = self::$Categories->where(array('id' => $parentData->parent_id))->first();

					}

					if($parentDataRoot != NULL){

						$setData['slug'] = Str::slug($request->input('title').' '.$parentData->title.' '.$parentDataRoot->title);

					}else{

						$setData['slug'] = Str::slug($request->input('title').' '.$parentData->title);

					}					

				}

				$setData['name'] = $request->input('name');

				$setData['contact'] = $request->input('contact');

				$setData['email'] = $request->input('email');				

				$setData['description'] = $request->input('description');

				$record = self::$Categories->CreateRecord($setData);				

				echo json_encode(array('heading'=>'Success','msg'=>'Category added successfully'));die;

			}else{
				echo json_encode(array('heading'=>'error','msg'=>'Category already exists'));die;
			}
		}

		}

		$categoryList = $this->getCategories();

		return view('/admin/categories/add-page',compact('categoryList'));

	}



    #edit Service Type

    public function editPage(Request $request, $row_id){

		$RowID =  base64_decode($row_id);

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		$rowData = self::$Categories->where(array('id' => $RowID))->first();

        if($request->input()){

			$validator = Validator::make($request->all(), [

				'title' => 'required',

            ],[

				'title.required' => 'Please enter title.',

				'title.unique' => 'title already exists.'

            ]);

			if($validator->fails()){

				$errors = $validator->errors();

				if($errors->first('title')){

                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;

				}

			}else{

			if(!self::$Categories->ExistingRecordUpdate($request->input('title'), $RowID)){

				$parentData = NULL;

				if($request->input('parent_id') > 0){

					$parentData = self::$Categories->where(array('id' => $request->input('parent_id')))->first();

				}

				if(isset($request->image) && $request->image->extension() != ""){

					$validator = Validator::make($request->all(), [

						'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240'

					]);

					if($validator->fails()){

						$errors = $validator->errors();

						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;

					}else{

						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('image')).'.'.$request->image->extension());

						$destination = base_path().'/public/admin/images/teams/';

						$request->image->move($destination, $actual_image_name);

						$setData['image'] = $actual_image_name;	

						if($rowData->image != ""){

							if(file_exists($destination.$rowData->image)){

								unlink($destination.$rowData->image);

							}

						}					

					}

				}

				if(isset($request->icon) && $request->icon->extension() != ""){

					$validator = Validator::make($request->all(), [

						'icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240'

					]);

					if($validator->fails()){

						$errors = $validator->errors();

						return json_encode(array('heading'=>'Error','msg'=>$errors->first('icon')));die;

					}else{

						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('icon')).'.'.$request->icon->extension());

						$destination = base_path().'/public/admin/images/teams/';

						$request->icon->move($destination, $actual_image_name);

						$setData['icon'] = $actual_image_name;	

						if($rowData->icon != ""){

							if(file_exists($destination.$rowData->icon)){

								unlink($destination.$rowData->icon);

							}

						}					

					}

				}

				$setData['id'] =  $RowID;

				$setData['is_featured'] = 2;
				if($request->input('is_featured') && $request->input('is_featured') == 1){
					$setData['is_featured'] = 1;
				}

				$setData['title'] = $request->input('title');

				$setData['parent_id'] = $request->input('parent_id');

				$setData['slug'] = Str::slug($request->input('title'));

				if($parentData != ''){

					$parentDataRoot = NULL;

					if($parentData->parent_id > 0){

						$parentDataRoot = self::$Categories->where(array('id' => $parentData->parent_id))->first();

					}

					if($parentDataRoot != NULL){

						$setData['slug'] = Str::slug($request->input('title').' '.$parentData->title.' '.$parentDataRoot->title);

					}else{

						$setData['slug'] = Str::slug($request->input('title').' '.$parentData->title);

					}					

				}

				$setData['name'] = $request->input('name');

				$setData['contact'] = $request->input('contact');

				$setData['email'] = $request->input('email');				

				$setData['description'] = $request->input('description');		

				self::$Categories->UpdateRecord($setData);

				echo json_encode(array('heading'=>'Success','msg'=>'Category updated successfully'));die;
			}else{
				echo json_encode(array('heading'=>'error','msg'=>'Category already exists'));die;
			}

			}

			

		}		

        if(isset($rowData->id)){

			$categoryList = $this->getCategories();

            return view('/admin/categories/edit-page',compact('rowData','row_id','categoryList'));

        }else{

            return redirect('/admin/categories');

        }

    }

	

	public function getCategories(){

		return self::$Categories->where(array('status' => 1, 'parent_id' => 0))->pluck('title','id');	

	}



}