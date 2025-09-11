<?php
namespace App\Helpers;
use DB;
use Session;


class Helper{

	public static function settings($id = NULL) {

    	return DB::table('settings')->where(array('id' => 1))->first();

    }

	public static function getService($id){

		$records = DB::table('services')->where(array('id' => $id))->first();

        return $records;

	}

	public static function getLicenseType($id){

		$records = DB::table('license_types')->where(array('id' => $id))->first();

        return $records;

	}

	public static function getLicense($id){

		$records = DB::table('licenses')->where(array('id' => $id))->first();

        return $records;

	}

	public static function getCartCount($user_id){

		$records = DB::table('tempcarts')->where(array('user_id' => $user_id))->count();

        return $records;

	}

	public static function getTotalProduct($id,$type){

		$query = DB::table('products');

		$query->where('status',1);

		if($type == 'Vendor'){

			$query->where('vendor_id',$id);

		}

		$records = $query->count();

        return $records;

	}

	public static function getTotalProductOut($id,$type){

		$query = DB::table('products');

		$query->where('status',1);

		$query->where('stock','YES');

		if($type == 'Vendor'){

			$query->where('vendor_id',$id);

		}

		$records = $query->count();

        return $records;

	}

	public static function getTotalCustomer($id,$type){

		$query = DB::table('users');

		$query->where('status',1);

		$records = $query->count();

        return $records;

	}

	public static function getTotalOrder($id,$type){

		$query = DB::table('orders');

		$query->where('payment_status','SUCCESS');

		if($type == 'Vendor'){

			//$query->where('vendor_id',$id);

		}

		$records = $query->count();

        return $records;

	}

	public static function getProductOrder($pid = NULL){
		$count = 0;
		if($pid != ''){
			$query = DB::table('order_details');
			$count = $query->where('product_id',$pid)->count();
		}
		return $count;
	}

	public static function getTotalOrderAmount($id,$type){

		$query = DB::table('orders');

		$query->where('payment_status','SUCCESS');

		if($type == 'Vendor'){

			//$query->where('vendor_id',$id);

		}

		$records = $query->get();

		$totalAmount = 0;

		foreach($records as $key => $record){

			$totalAmount = $totalAmount+$record->grand_total;

		}

        return number_format($totalAmount,2);

	}

	public static function getNoOfProducts($ids){

		$explode = explode(',',$ids);

		$totalCount = 0;

		foreach($explode as $key => $singleID){

			$records = DB::table('products')->whereRaw('FIND_IN_SET('.$singleID.', ailment_id)')->count();

			$totalCount = $totalCount+$records;

		}

		

        return $totalCount;

	}

	public static function getAilments($ids){

		$explode = explode(',',$ids);

		$ailmentName = [];

		foreach($explode as $key => $singleID){

			$row = DB::table('ailments')->where(array('id' => $singleID))->first();

			$ailmentName[] = $row->title;

		}

		return implode(', ',$ailmentName);

	}

	public static function getSpecialities($ids){

		$explode = explode(',',$ids);

		$ailmentName = [];

		foreach($explode as $key => $singleID){

			$row = DB::table('specialties')->where(array('id' => $singleID))->first();

			$ailmentName[] = $row->title;

		}

		return implode(', ',$ailmentName);

	}

	public static function getSpeciality($id){

		$records = DB::table('specialties')->where(array('id' => $id))->first();

        return $records;

	}

	public static function getProductInfo($id){

		$records = DB::table('products')->where(array('id' => $id))->first();

        return $records;

	}

	public static function getShipmentInfo($id){

		$records = DB::table('order_shipping_histories')->where(array('order_id' => $id))->orderBy('id','DESC')->get();

        return $records;

	}

	public static function getUserInfo($id, $field = NULL){

		if($id > 0){

			if($field == NULL){
				$data = DB::table('users')->where(array('id' => $id))->first();
			}else{
				$record = DB::table('users')->where(array('id' => $id))->first();
				if(isset($record->id)){
					$data = $record->$field;
				}else{
					$data = '';
				}
			}
        	return $data;

		}else{

			return 'Admin';

		}

	}

	public static function getUserName($id){

		if($id > 0){

			$records = DB::table('users')->where(array('id' => $id))->first();

        	return $records->name;

		}else{

			return 'Aayush Bharat';

		}

	}

	public static function getSubscriptionInfo($id){

		$records = DB::table('subscriptions')->where(array('id' => $id))->first();

        return $records;

	}

	public static function getOrderItems($id){

		$records = DB::table('order_items')->where(array('order_id' => $id))->get();

        return $records;

	}

	public static function getProductImages($id){		

		$productImages = DB::table('product_images')->where(array('product_id' => $id))->orderBy('img_ordering', 'ASC')->get();

		$count = 0;

		foreach($productImages as $key => $val){

			if(!empty($val->image)){

				$data = $val->image;

				$count = 1;

				break;	

			}

		}

		$response = '';

		if($count == 1){

			$response = $data;

		}		

        return $response;

	}

	

	public static function getSellProductStatus($pid,$vendor_id){

		$record = DB::table('products')->where(array('vendor_pid' => $pid,'vendor_id' => $vendor_id))->first();

		$status = NULL;

		if(isset($record->id)){

			$status = $record->vendor_sale_status;

		}

		return $status;

	}

	

	public static function getOrderStatus($ordId = NULL,$field = NULL){

		if($ordId != ''){

			$query = DB::table('orders')->select($field)->where('id',$ordId)->first();			

			if(isset($query->id)){
				return $query->$field;
			}else{
				return NULL;
			}

		}else{

			return NULL;

		}		

	}

	

	public static function getShippingMethod($shipping_id = NULL,$field = NULL){

		if($shipping_id != ''){

			$query = DB::table('shipping_methods')->select($field)->where('id',$shipping_id)->first();			

			if(isset($query->id)){
				return $query->$field;
			}else{
				return NULL;
			}

		}else{

			return NULL;

		}

	}

	

	public static function getPrescriptionOrder($order_id = NULL){

		$row_id = NULL;

		if($order_id != ''){

			$query = DB::table('orders')->select(['id'])->where('prescription_order_id',$order_id)->first();

			if(isset($query->id)){

				$row_id = $query->id;

			}

		}

		return $row_id;

	}

	

	public static function getOrder($ordId = NULL){

		if($ordId != ''){

			return DB::table('orders')->where('id',$ordId)->first();

		}else{

			return NULL;

		}		

	}

	

	public static function getSubCategory($categoryList=NULL,$parentId=NULL,$editId=NULL){

		$list = '<option value="0">Root</option>';

		if(!empty($categoryList)){	

			foreach($categoryList as $keys => $title):

				$seleted = '';

				$disabled = $disabled2 = $disabled3 = '';

				$newList = DB::table('categories')->where(array('parent_id' => $keys, 'status' => 1))->orderBy('title','ASC')->get();

				if($parentId == $keys){$seleted = 'selected="selected"';}

				$list .= '<option '.$seleted.' value="'.$keys.'">'.ucwords($title).'</option>';

				foreach($newList as $nKey => $nVal):

					$seleted2 = '';

					if($parentId == $nVal->id){$seleted2 = 'selected="selected"';}

					$list .= '<option '.$seleted2.' value="'.$nVal->id.'"> → '.ucwords($nVal->title).'</option>';

					$newList2 = DB::table('categories')->where(array('parent_id' => $nVal->id, 'status' => 1))->orderBy('title','ASC')->get();					

					foreach($newList2 as $nKey2 => $nVal2):

						$seleted3 = '';

						if($parentId == $nVal2->id){$seleted3 = 'selected="selected"';}

						$list .= '<option '.$seleted3.' value="'.$nVal2->id.'"> → → '.ucwords($nVal2->title).'</option>';

						$newList3 = DB::table('categories')->where(array('parent_id' => $nVal2->id, 'status' => 1))->orderBy('title','ASC')->get();

						foreach($newList3 as $nKey3 => $nVal3):

							$seleted4 = '';

							if($parentId == $nVal3->id){$seleted4 = 'selected="selected"';}

							$list .= '<option '.$seleted4.' value="'.$nVal3->id.'"> → → → '.ucwords($nVal3->title).'</option>';

							$newList4 = DB::table('categories')->where(array('parent_id' => $nVal3->id, 'status' => 1))->orderBy('title','ASC')->get();

							foreach($newList4 as $nKey4 => $nVal4):

								$seleted5 = '';

								if($parentId == $nVal4->id){$seleted5 = 'selected="selected"';}

								$list .= '<option '.$seleted5.' value="'.$nVal3->id.'"> → → → → '.ucwords($nVal4->title).'</option>';

							endforeach;

						endforeach;

					endforeach;

				endforeach;

			endforeach;

			echo $list;

		}

	}

	

	public static function getChildRow($parentID,$mark){	

		$categories = DB::table('categories')->where(array('parent_id' => $parentID))->where('status','!=',3)->orderBy('ordering')->orderBy('title')->get();

		$html = '';

		$SITEURL = env('APP_URL');

		foreach($categories as $keys => $category):

			$isExist = 0;

			echo $html = '<tr>';	

				echo $html = '<td>#</td>';			

				if($mark == '→'){

					echo $html = '<td><div class="fw-bold d-flex align-items-center">'.$mark.' '.$category->title.'</div></td>';

					echo $html = '<td><input type="number" maxlength="3" style="text-align:center;width: 100%;" class="form-control ordering" id="ordering"

					onchange="saveNewOrder(\''.$category->id.'\',\''.$category->ordering.'\',\'categories\',this.value);" value="'.$category->ordering.'"></td>';

				}else{

					echo $html = '<td><div class="d-flex align-items-center">'.$mark.' '.$category->title.'</div></td>';	

				}						

				if($category->status == 1){					

					echo $html = '<td><a href="javascript:void(0);" onclick="changeStatus(\'categories\',\''.$category->id.'\',\''.$category->status.'\');" class="badge bg-success">Active</a></td>';

				}else{

					echo $html = '<td><a href="javascript:void(0);" onclick="changeStatus(\'categories\',\''.$category->id.'\',\''.$category->status.'\');" class="badge bg-danger">In-Active</a></td>';

				}				

				echo $html = '<td><span class="text-muted fw-bold text-muted d-block fs-7">'.date('d M, Y h:i A',strtotime($category->created_at)).'</span></td>';

				echo $html = '<td>';

				echo $html = '<a href="'.$SITEURL.'admin/edit-category/'.base64_encode($category->id).'" class="btn btn-sm btn-primary" title="Edit">';

					echo $html = '<i class="bi bi-pencil"></i>';

				echo $html = '</a>';

				echo $html ='&nbsp;';

				echo $html = '<a href="javascript:void(0);" onclick="deleteData(\'categories\',\''.$category->id.'\');" class="btn btn-sm btn-danger" title="Delete">';

					echo $html = '<i class="bi bi-trash"></i>';

				echo $html = '</a>';

				echo $html = '</td>';

		echo $html = '</tr>';

		static::getChildRow($category->id,'→ →');

		endforeach;

	}

	

	#get sub category  data

    public static function getNavigationCategory($categoryList=NULL,$parentId=NULL,$editId=NULL){

		$list = '<option value="0">Root</option>';

		if(!empty($categoryList)){

			foreach($categoryList as $keys => $vals):

				$seleted = '';

				$disabled = '';

				$menuPageTitle = '';

				$newList = DB::table('header_navigations')->where('parent_id',$keys)->get();

				if($parentId == $keys){$seleted = 'selected="selected"';}

				if($editId == $keys){$disabled = 'disabled="disabled"';}

				$list .= '<option '.$seleted.' '.$disabled.' value="'.$keys.'">'.ucwords($vals).'</option>';				

				foreach($newList as $nKey => $nVal):

					if(isset($nVal->menu_page_id) && !empty($nVal->menu_page_id)){

						$menuPageTitle = $this->getCmsPagesTitle($nVal->menu_page_id);	

						$list .= '<option disabled="disabled" value=""> → '.$menuPageTitle.'</option>';

					}					

				endforeach;				

			endforeach;			

			return $list;

		}       

	}

	

	public static function getProduct($id = NULL, $field = NULL) {

        if ($field != '') {

            $records = DB::table('products')->where(array('id' => $id))->first();

            if(isset($records->id)){
				return $records->$field;
			}else{
				return NULL;
			}

        } else {

            return DB::table('products')->where(array('id' => $id))->first();

        }

    }

	public static function getBiddingProduct($id = NULL, $field = NULL) {

        if ($field != '') {

            $records = DB::table('bidding_products')->where(array('id' => $id))->first();

            if(isset($records->id)){
				return $records->$field;
			}else{
				return NULL;
			}

        } else {

            $records = DB::table('bidding_products')->where(array('id' => $id))->first();
			return $records;

        }

    }

	public static function getMinMaxProduct($id = NULL){
		if($id != ''){
			$min = DB::table('user_biddings')->where('status',1)->where('product_id',$id)->min('bidding_price');
			$max = DB::table('user_biddings')->where('status',1)->where('product_id',$id)->max('bidding_price');

			$data['min'] = $min;
			$data['max'] = $max;
			return $data;
		}
	}

	

	public static function getCategory($id = NULL, $field = NULL){

        if ($field != '') {

            $records = DB::table('categories')->where(array('id' => $id))->first();

            if(isset($records->id)){
				return $records->$field;
			}else{
				return NULL;
			}

        } else {

            return DB::table('categories')->where(array('id' => $id))->first();

        }

    }

	public static function getAllCategory() {

        return DB::table('categories')->where(array('status' => 1,'parent_id' => 0))->get();

    }

	public static function getOrderProducts($oid = NULL) {

		return DB::table('order_details')->where(array('order_id' => $oid))->get();

	}

	public static function getProductByCategory($id = NULL) {

    	return DB::table('products')->where(array('category_id' => $id,'status' => 1))->latest()->get();

    }


	public static function getAuctionResult($pid = NULL){
		$result = 'No';
		if($pid != ''){
			$product = DB::table('bidding_products')->where(array('id' => $pid))->first();
			if(isset($product->id)){
				$current_date = date('Y-m-d h:is');
				$current_time = time();
				
				$start_date = $product->start_date;
				$end_date = $product->end_date;

				if($product->end_date_str > $current_time){
					$result = 'Yes';
				}
			}
		}
		return $result;

	}

}

?>