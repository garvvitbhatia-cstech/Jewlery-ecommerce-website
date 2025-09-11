<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderDetails extends Authenticatable{
	
  use HasApiTokens, HasFactory, Notifiable;
	
	protected $table = 'order_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      "order_id",
      "product_id",
      "price",
      "tax",
      "discount",
      "shipping",
      "totalamount",
      "quantity",
      "ship_name",
      "ship_email",
      "ship_phone",
      "ship_address",
      "price_usd",
      "product_category",
      "product_name",
      "gross_weight",
      "rubelite_weight",
      "tanzanite_weight",
      "product_brand"
    ];

    protected $UpdatableFields = [
      "order_id",
      "product_id",
      "price",
      "tax",
      "discount",
      "shipping",
      "totalamount",
      "quantity",
      "ship_name",
      "ship_email",
      "ship_phone",
      "ship_address",
      "price_usd",
      "product_category",
      "product_name",
      "gross_weight",
      "rubelite_weight",
      "tanzanite_weight",
      "product_brand"
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

    public function ExistingRecord($title){
		return $this::where('title',$title)->where('status','!=', 3)->exists();
	}
	public function ExistingRecordUpdate($title, $id){
		return $this::where('title',$title)->where('id','!=', $id)->where('status','!=', 3)->exists();
	}

}