<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
	protected $fillable = ["filename", "filetype", "file", "listings_id"];
	public $timestamps = false;
	public function listing(){
		return $this->belongsTo("App\Models\listings");
	}
}
