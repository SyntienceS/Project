<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offers extends Model
{
	protected $fillable = ["amount", "offer_time", "final", "successful", "user_id", "listing_id"];
	public $timestamps = false;
	public function listing(){
		return $this->belongsTo("App\Models\listings");
	}
	public function user(){
		return $this->belongsTo("App\Models\users");
	}
}
