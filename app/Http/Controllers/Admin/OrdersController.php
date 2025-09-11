<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Orders;

use App\Models\OrderDetails;

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



class OrdersController extends Controller

{

	private static $Orders;

    private static $TokenHelper;

    private static $OrderDetails;

	public function __construct(){

        self::$TokenHelper = new TokenHelper();

        self::$OrderDetails = new OrderDetails();

		self::$Orders = new Orders();

	}



    #admin dashboard page

    public function getList(Request $request){

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        return view('/admin/orders/index');

    }

    public function listPaginate(Request $request){

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        $query = self::$Orders->where('status', '!=', 3);



		if($request->input('order_status')  && $request->input('order_status') != ""){

            $order_status = $request->input('order_status');

            $query->where('order_status', $order_status);

		}		

		if($request->input('customer_name')  && $request->input('customer_name') != ""){

            $customer_name = $request->input('customer_name');

            $query->where('customer_name', 'like', '%'.$customer_name.'%');

		}

        if($request->input('payment_status')  && $request->input('payment_status') != ""){

            $payment_status = $request->input('payment_status');

            $query->where('payment_status', $payment_status);

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

                $query->where('order_date', '>=', $fdate);

            }else if(empty($fdate) && !empty($tdate)){

                $query->where('order_date', '<=', $tdate);

            }else{

                $query->whereBetween(DB::raw('DATE(order_date)'), [$fdate, $tdate]);

            }

        }

		$records =  $query->orderBy('id', 'DESC')->paginate(20);

        return view('/admin/orders/paginate',compact('records'));

    }



    #edit Service Type

    public function viewPage(Request $request, $row_id){

		$RowID =  base64_decode($row_id);

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		$rowData = self::$Orders->where(array('id' => $RowID))->first();

        if(isset($rowData->id)){

            $order_details = self::$OrderDetails->where('order_id',$rowData->id)->latest()->get();

            return view('/admin/orders/view-page',compact('rowData','row_id','order_details'));

        }else{

            return redirect('/admin/orders');

        }

    }

    #edit Service Type

    public function updateOrderStatus(Request $request){

		$RowID =  $request->row;

        $order_status =  $request->value;

		if(!$request->session()->has('admin_email')){return redirect('/admin/');}



		$rowData = self::$Orders->where(array('id' => $RowID))->first();

        if(isset($rowData->id)){

            $setData['id'] = $rowData->id;

            $setData['order_status'] = $order_status;

            self::$Orders->UpdateRecord($setData); 

        }

        echo "Success";die;

    }

    public function setPaymentStatus(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->Ajax()){
			$postData = $request->all();
			if(isset($postData) && !empty($postData)){
				$rowID = $request->input('rowId');
				$payment_status = $request->input('paymentStatus');
				self::$Orders->where(array('id' => $rowID))->update(array('payment_status' => $payment_status));
				echo "Success";
			}else{
				echo "Error";
			}
			exit;
		}
	}

    public function updateTrakingNo(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->Ajax()){
			$postData = $request->all();
			if(isset($postData) && !empty($postData)){
				$rowID = $request->input('orderid');
				$shipping_company = $request->input('shipping_company');
                $traking_code = $request->input('traking_code');
                $traking_url = $request->input('traking_url');
				self::$Orders->where(array('id' => $rowID))->update(array('shipping_company' => $shipping_company, 'tracking_code' => $traking_code, 'tracking_url' => $traking_url));
				echo "Success";
			}else{
				echo "Error";
			}
			exit;
		}
	}


    

}

