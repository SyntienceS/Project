<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class listings extends Model
{
    protected $fillable = ["title", "description", "created_time", "valid_until", "starting_price", "user_id"];
	public $timestamps = false;
	public function user(){
		return $this->belongsTo("App\Models\users");
	}
	public function category(){
        return $this->belongsTo("App\Models\categories");
    } 

}
