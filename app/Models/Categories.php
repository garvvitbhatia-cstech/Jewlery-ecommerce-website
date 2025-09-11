<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Categories extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
		"parent_id",
        "title",
		"image",
        "icon",
        "slug",
		"name",
		"contact",
        "email",
        "description",
		"type",
        "ordering",
        "status"
    ];

    protected $UpdatableFields = [
		"parent_id",
        "title",
		"image",
        "icon",
        "slug",
		"name",
		"contact",
        "email",
        "description",
		"type",
        "ordering",
        "status"
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