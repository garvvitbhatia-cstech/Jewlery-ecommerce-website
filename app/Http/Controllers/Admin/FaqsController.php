<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faqs;
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

class FaqsController extends Controller{
	
	private static $Faqs;
    private static $TokenHelper;	
	public function __construct(){
		self::$Faqs = new Faqs();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/faqs/index');
    }

    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Faqs->where('status', '!=', 3);
		if($request->input('question')  && $request->input('question') != ""){
            $SearchKeyword = $request->input('question');
            $query->where('question', 'like', '%'.$SearchKeyword.'%');
		}
		if($request->input('answer')  && $request->input('answer') != ""){
            $SearchKeyword = $request->input('answer');
            $query->where('answer', 'like', '%'.$SearchKeyword.'%');
		}
		if($request->input('status')  && $request->input('status') != ""){
            $SearchKeyword = $request->input('status');
            $query->where('status', $SearchKeyword);
		}
		$records =  $query->orderBy('ordering', 'ASC')->paginate(20);
        return view('/admin/faqs/paginate',compact('records'));
    }

    #add new Brand
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
                'question' => 'required',
				'answer' => 'required',
            ],[
                'question.required' => 'Please enter question.',
				'answer.required' => 'Please enter answer.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('question')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('question')));die;
				}
				if($errors->first('answer')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('answer')));die;
				}
			}else{
                if(!self::$Faqs->ExistingRecord($request->input('question'))){
					$ordering = 1;
					$last_record =  self::$Faqs->orderBy('ordering', 'DESC')->first();
					if(isset($last_record->id) && $last_record->ordering != ''){
						$ordering = $last_record->ordering+1;	
					}
					$setData['ordering'] = $ordering;					
                    $setData['question'] = $request->input('question');
					$setData['answer'] = $request->input('answer');
					if($request->input('status') && $request->input('status') == 1){
						$setData['status'] = 1;
					}else{
						$setData['status'] = 2;
					}
                    $record = self::$Faqs->CreateRecord($setData);
					echo json_encode(array('heading'=>'Success','msg'=>'FAQ added successfully'));die;
                }else{
					echo json_encode(array('heading'=>'Error','msg'=>'FAQ already exists.'));die;				
				}
			}
		}		
		return view('/admin/faqs/add-page');
    }

    #edit Brand
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
                'question' => 'required',
				'answer' => 'required',
            ],[
                'question.required' => 'Please enter question.',
				'answer.required' => 'Please enter answer.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('question')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('question')));die;
				}
				if($errors->first('answer')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('answer')));die;
				}
			}else{
                //profile image
                if(self::$Faqs->ExistingRecordUpdate($request->input('question'), $RowID)){
                    echo json_encode(array('heading'=>'Error','msg'=>'FAQ already exists.'));die;
                }else{					
                    $setData['id'] =  $RowID;
                    $setData['question'] = $request->input('question');
					$setData['answer'] = $request->input('answer');
					if($request->input('status') && $request->input('status') == 1){
						$setData['status'] = 1;
					}else{
						$setData['status'] = 2;
					}
                    self::$Faqs->UpdateRecord($setData);
                }
                echo json_encode(array('heading'=>'Success','msg'=>'FAQ information updated successfully'));die;
			}
		}
		$rowData = self::$Faqs->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){			
            return view('/admin/faqs/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/faqs');
        }
    }

}