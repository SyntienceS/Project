<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class session_tokens extends Model
{
    protected $fillable = ["token", "user_id"];
	public $timestamps = false;
	public function user(){
		return $this->belongsTo("App\Models\users");
	}
	public function category(){
		return $this->belongsTo("App\Model\categories");
	} 
}
