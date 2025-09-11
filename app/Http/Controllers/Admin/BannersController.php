<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Banners;
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

class BannersController extends Controller
{
	private static $Banners;
    private static $TokenHelper;
	public function __construct(){
		self::$Banners = new Banners();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/banners/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Banners->where('status', '!=', 3);

		if($request->input('title')  && $request->input('title') != ""){
            $title = $request->input('title');
            $query->where('title', 'like', '%'.$title.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/banners/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
                'title' => 'required',
            ],[
                'title.required' => 'Please enter title.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:20480'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/admin/images/banners/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;						
					}
				}
				$is_show_btn1 = 2;
				if($request->input('is_show_btn1')){
					$is_show_btn1 = 1;
				}
				$is_show_btn2 = 2;
				if($request->input('is_show_btn2')){
					$is_show_btn2 = 1;
				}
				$setData['is_show_btn2'] = $is_show_btn2;
				$setData['is_show_btn1'] = $is_show_btn1;
				$setData['btn1_title'] = $request->input('btn1_title');
				$setData['btn2_title'] = $request->input('btn2_title');
				$setData['btn1_url'] = $request->input('btn1_url');
				$setData['btn2_url'] = $request->input('btn2_url');
				$setData['title'] = $request->input('title');
				$setData['content'] = $request->input('content');
				$record = self::$Banners->CreateRecord($setData);
                
                echo json_encode(array('heading'=>'Success','msg'=>'Banner added successfully'));die;
			}
		}
		return view('/admin/banners/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$rowData = self::$Banners->where(array('id' => $RowID))->first();
        if($request->input()){
			$validator = Validator::make($request->all(), [
                'title' => 'required',
            ],[
                'title.required' => 'Please enter title.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:20480'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('image')).$RowID.'.'.$request->image->extension());
						$destination = base_path().'/public/admin/images/banners/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;	
						if($rowData->image != ""){
							if(file_exists($destination.$rowData->image)){
								unlink($destination.$rowData->image);
							}
						}					
					}
				}
				$setData['id'] =  $RowID;
				$is_show_btn1 = 2;
				if($request->input('is_show_btn1')){
					$is_show_btn1 = 1;
				}
				$is_show_btn2 = 2;
				if($request->input('is_show_btn2')){
					$is_show_btn2 = 1;
				}
				$setData['is_show_btn2'] = $is_show_btn2;
				$setData['is_show_btn1'] = $is_show_btn1;
				$setData['btn1_title'] = $request->input('btn1_title');
				$setData['btn2_title'] = $request->input('btn2_title');
				$setData['btn1_url'] = $request->input('btn1_url');
				$setData['btn2_url'] = $request->input('btn2_url');
				$setData['title'] = $request->input('title');
				$setData['content'] = $request->input('content');
				self::$Banners->UpdateRecord($setData);
			}
            echo json_encode(array('heading'=>'Success','msg'=>'Banner updated successfully'));die;
		}
		
        if(isset($rowData->id)){     
            return view('/admin/banners/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/banners');
        }
    }

}