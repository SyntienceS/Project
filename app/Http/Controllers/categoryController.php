<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\categories;

class categoryController extends Controller
{
    public function read(Request $request){
		$query = DB::table('categories')->get();
		echo json_encode($query);
		return;
	}
}
