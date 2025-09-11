<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBiddings;
use App\Models\BiddingProducts;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Languages;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

class UserBiddingsController extends Controller{

	private static $UserBiddings;
    private static $BiddingProducts;
    private static $TokenHelper;
	public function __construct(){
        self::$TokenHelper = new TokenHelper();
		self::$UserBiddings = new UserBiddings();
        self::$BiddingProducts = new BiddingProducts();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/user_biddings/index');
    }

    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$UserBiddings->where('status', '!=', 3);	
        if($request->input('read_status')  && $request->input('read_status') != ""){
            $read_status = $request->input('read_status');
            $query->where('read_status', $read_status);
		}
		if($request->input('product')  && $request->input('product') != ""){
            $product = $request->input('product');            
            $products = self::$BiddingProducts->where('status', '!=', 3)->where('title', 'like', '%'.$product.'%')->get();
            $pid = array();
            foreach($products as $key => $product){
                $pid[] = $product->id;
            }
            $imppid = implode(',',$pid);
            $query->whereRaw('FIND_IN_SET(product_id,"'.$imppid.'")');
		}
        if(!empty($request->input('from_date')) || !empty($request->input('to_date'))){
            $fdate = $tdate = '';
            if(!empty($request->input('from_date'))){
                $fdate = date('Y-m-d', strtotime($request->input('from_date')));
            }
            if(!empty($request->input('to_date'))){
                $tdate = date('Y-m-d', strtotime($request->input('to_date')));
            }

            if(!empty($fdate) && empty($tdate)){
                $query->where('bidding_date', '>=', $fdate);
            }else if(empty($fdate) && !empty($tdate)){
                $query->where('bidding_date', '<=', $tdate);
            }else{
                $query->whereBetween(DB::raw('DATE(bidding_date)'), [$fdate, $tdate]);
            }
        }
		$records =  $query->orderBy('id', 'DESC')->paginate(20);
        return view('/admin/user_biddings/paginate',compact('records'));
    }

    #edit Service Type
    public function viewPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		$rowData = self::$UserBiddings->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){			
            return view('/admin/user_biddings/view-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/user-biddings');
        }
    }

}