<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;


class Orders extends Authenticatable{

    use HasApiTokens, HasFactory, Notifiable;


    /**



     * The attributes that are mass assignable.



     *



     * @var array<int, string>



     */



    protected $fillable = [

        'product_id',		

		'invoice_id',	
        
        'user_id',	

        'transaction_id',

		'coupon_code',		

		'discount',		

		'product_name',

        'customer_name',

		'customer_email',

        'customer_mobile',

		'customer_address',

        'customer_city',

		'customer_state',

		'customer_country',

		'customer_zipcode',

        'tax',

        'shipping_company',

        'tracking_url',

        'tracking_code',

        'quantity',

		'order_date',

        'total',

        'shipping',

        'payment_type',

        'payment_status',

        'dispatch_through',        

        'order_status',

		'status',
		'signature',
		'bank_response'

    ];



    /**



     * The attributes that should be hidden for serialization.



     *



     * @var array<int, string>



     */

    protected $hidden = [

      

    ];



    /**



     * The attributes that should be cast.



     *



     * @var array<string, string>



     */


	public function GetRecordById($id){

		return $this::where('id', $id)->first();

	}


	public function UpdateRecord($Details){

		$Record = $this::where('id', $Details['id'])->update($Details);

		return true;

	}


	public function CreateRecord($Details){

		$Record = $this::create($Details);

		return $Record;

	}


    public function ExistingRecord($email){

		return $this::where('email',$email)->where('status','!=', 3)->exists();

	}	


	public function ExistingRecordUpdate($email, $id){

		return $this::where('email',$email)->where('id','!=', $id)->where('status','!=', 3)->exists();

	}


}