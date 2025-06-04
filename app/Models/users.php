<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
	protected $fillable = ["username", "display_name", "password", "email", "privilege"];
	public $timestamps = false;
}
