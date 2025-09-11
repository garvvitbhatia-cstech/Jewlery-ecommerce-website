<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Enquiries;
use App\Models\Orders;
use App\Models\Products;
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
use App\Http\Controllers\Admin\GeneralController;

class ExportController extends Controller{

	private static $Enquiries;
	private static $Orders;	
	private static $Products;	

	public function __construct(){
		self::$Enquiries = new Enquiries();
		self::$Orders = new Orders();
		self::$Products = new Products();
	}
	
	#exportProduct
    public function exportEnquiries(Request $request){
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
        $query = self::$Enquiries->where('status', '!=', 3);
		if($request->input('name')  && $request->input('name') != ""){
            $SearchKeyword = $request->input('name');
            $query->where('name', 'like', '%'.$SearchKeyword.'%');
		}
		if($request->input('read_status')  && $request->input('read_status') != ""){
            $SearchKeyword = $request->input('read_status');
            $query->where('read_status', 'like', '%'.$SearchKeyword.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->get();

		$delimiter = ",";
		$filename = "enquiries_" . date('d_F_Y') . ".csv";
		
		$destination = "storage/csv/".$filename;
		//create a file pointer
		$f = fopen($destination,"w");
		
		//set column headers
		$fields = array(
					'S.No',
					'Name',
					'email',
					'Phone',
					'Subject',						
					'Message',
					'Status',
					'Created'
				);
		 
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			$status = '';
			if($record->read_status == 1){
				$status = 'Read';
			}
			if($record->read_status == 2){
				$status = 'Unread';
			}
			$lineData = array(
							$key+1,
							$record->name,
							$record->email,							
							$record->contact,
							$record->subject,
							$record->message,
							$status,
							$record->created_at,                           
						);
			fputcsv($f, $lineData, $delimiter);
		endforeach;
		$lineData2 = array('','');						
		fputcsv($f, $lineData2, $delimiter);                     
		fclose ($f);
		echo env('APP_URL').$destination;		
		exit;
    }
	
	#exportProduct
    public function exportOrders(Request $request){
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
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
		$records =  $query->orderBy('id', 'DESC')->get();
		$delimiter = ",";
		$filename = "orders_" . date('d_F_Y') . ".csv";
		$destination = "storage/csv/".$filename;
		//create a file pointer

		$f = fopen($destination,"w");
		//set column headers
		$fields = array(
						'S.No', 
						'Invoice',						
						'Name',
						'Email',
						'Phone',
						'Address',
						'Country',
						'City',						
						'State',
						'Zipcode',
						'Product',
						'Order Date',
						'Coupon Code',						
						'Sub Total',						
						'Discount',						
						'Total',
						'Order Status',					
						'Created'
					);
					
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			$created_at = date('d-m-Y h:ia',strtotime($record->created_at));
			$productDetails = $this->getProduct($record->product_id);
			$product_name = '';
			if(isset($productDetails->id)){
				$product_name = $productDetails->title;
			}
			$lineData = array(
						$key+1,
						$record->invoice_id,
						$record->customer_name,
						$record->customer_email,
						$record->customer_mobile,
						$record->customer_address,
						$record->customer_city,
						$record->customer_state,
						$record->customer_country,
						$record->customer_zipcode,
						$product_name,
						$record->order_date,
						$record->coupon_code,						
						$record->total + $record->discount,						
						$record->discount,						
						$record->total,
						$record->order_status,
						$created_at,
					);
			fputcsv($f, $lineData, $delimiter);
		endforeach;

		$lineData2 = array('','');
		fputcsv($f, $lineData2, $delimiter);
		fclose ($f);
		echo env('APP_URL').$destination;
		exit;
    }
	
	public function getProduct($id){
		return self::$Products->where('id',$id)->first();
	}

}