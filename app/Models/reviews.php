<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
	protected $fillable = ["score", "review_text", "anonymous", "user_id"];
	public $timestamps = false;
	public function user(){
		return $this->belongsTo("App\Models\users");
	}
}
