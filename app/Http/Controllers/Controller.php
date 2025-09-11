<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Session;

use App\Models\Newsletter;

use Illuminate\Routing\Controller as BaseController;



class Controller extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	public function newsletter($email = NULL){
		if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email = strtolower(trim($email));
			$emailExist = Newsletter::where('email',$email)->count();
            if($emailExist == 0){
				$newsletter = new Newsletter();
                $newsletter->email = $email;
				$newsletter->save();
            }			
		}
		return "success";	
	}


	public function builtSlug($input_lines){

        preg_match_all("/[0-9A-Za-z\s]/", trim($input_lines), $output_array);

        $slug = strtolower(preg_replace("/[\s]/", "-", join($output_array[0])));

        return preg_replace("/-{2,}/", "-", $slug);

    }

    public function generateTempSessionKey($request){
		if(!$request->session()->has('login_user_id')){
			$randonKey = $this->generateUniqueId();
			Session::put('login_user_id', $randonKey);
			Session::save();
		}
		return true;
	}
	
	function generateUniqueId(){
		$random = mt_rand(111,999).mt_rand(11,99).mt_rand(111,999);
		return str_shuffle($random);
	}
	
	function productCode($productName,$productID=NULL){
		$productCode = '';
		preg_match_all("/[0-9A-Za-z\s]/", trim($productName), $output_array);
        $slug = strtolower(preg_replace("/[\s]/", " ", join($output_array[0])));
        $productName = preg_replace("/-{2,}/", " ", $slug);		
		$exp = explode(' ',$productName);		
		foreach($exp AS $val){
			$productCode .= strtoupper(substr($val,0,1));
		}		
		return $productCode.$productID;
	}

	#encryptData
	public function encryptData($value = NULL){
		$value = trim($value);
		$value = trim(preg_replace('/\s+/', ' ', $value));
		date_default_timezone_set('UTC');
		$encryptionMethod = "AES-256-CBC";
		$secret = "RiDer2021PKSEncryption19RiDer202";  //must be 32 char length
		$iv = substr($secret, 0, 16);
	 	$encryptedText = openssl_encrypt($value, $encryptionMethod, $secret,0,$iv);
		return trim($encryptedText);

	}

	#decryptData
	public function decryptData($value = NULL){
		$value = trim($value);
		date_default_timezone_set('UTC');
		$encryptionMethod = "AES-256-CBC";
		$secret = "RiDer2021PKSEncryption19RiDer202";  //must be 32 char length
		$iv = substr($secret, 0, 16);
		$decryptedText = openssl_decrypt($value, $encryptionMethod, $secret,0,$iv);
		return trim($decryptedText);

	}
	

}