<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
	protected $fillable = ["report_text", "report_time"];
	public $timestamps = false;
}
