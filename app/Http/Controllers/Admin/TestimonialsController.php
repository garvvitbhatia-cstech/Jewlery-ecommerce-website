<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

class TestimonialsController extends Controller{

    private static $TokenHelper;
	private static $Testimonials;

	public function __construct(){
		self::$Testimonials = new Testimonials();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/testimonials/index');
    }

    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Testimonials->where('status', '!=', 3);

		if($request->input('title')  && $request->input('title') != ""){
            $title = $request->input('title');
            $query->where('title', 'like', '%'.$title.'%');
		}
		if($request->input('rating')  && $request->input('rating') != ""){
            $rating = $request->input('rating');
            $query->where('rating', 'like', '%'.$rating.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->paginate(20);
        return view('/admin/testimonials/paginate',compact('records'));
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
				if(isset($request->profile) && $request->profile->extension() != ""){
					$validator = Validator::make($request->all(), [
						'profile' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:10240'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('profile')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('profile')).'.'.$request->profile->extension());
						$destination = base_path().'/public/admin/images/testimonials/';
						$request->profile->move($destination, $actual_image_name);
						$setData['profile'] = $actual_image_name;
					}
				}
				$setData['title'] = $request->input('title');				
				$setData['user_name'] = $request->input('user_name');
				$setData['rating'] = $request->input('rating');
				$setData['testimonial'] = $request->input('testimonial');
				$record = self::$Testimonials->CreateRecord($setData);
				echo json_encode(array('heading'=>'Success','msg'=>'Testimonial added successfully'));die;
			}

		}
		return view('/admin/testimonials/add-page');
	}

    #edit Service Type

    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$rowData = self::$Testimonials->where(array('id' => $RowID))->first();
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
				if(isset($request->profile) && $request->profile->extension() != ""){
					$validator = Validator::make($request->all(), [
						'profile' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:10240'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('profile')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('profile')).'.'.$request->profile->extension());
						$destination = base_path().'/public/admin/images/testimonials/';
						$request->profile->move($destination, $actual_image_name);
						$setData['profile'] = $actual_image_name;	
						if($rowData->profile != ""){
							if(file_exists($destination.$rowData->profile)){
								unlink($destination.$rowData->profile);
							}
						}
					}
				}
				$setData['id'] =  $RowID;
				$setData['title'] = $request->input('title');				
				$setData['user_name'] = $request->input('user_name');
				$setData['rating'] = $request->input('rating');
				$setData['testimonial'] = $request->input('testimonial');
				self::$Testimonials->UpdateRecord($setData);
			}
			echo json_encode(array('heading'=>'Success','msg'=>'Testimonial updated successfully'));die;
		}		

        if(isset($rowData->id)){
            return view('/admin/testimonials/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/testimonials');
        }
    }	

}