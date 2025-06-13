<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\categories;

class stdClass{}

class categoryController extends Controller
{
    public function read(Request $request){
		$query = DB::table('categories')->get();
		$query2 = [];
		for($i = 1; $i < 6; $i++){
			$query2[] = DB::table("listings")->selectRaw("COUNT(*) as count")->whereRaw("category_id = " . $i)->first();
		}
		echo json_encode( [$query, $query2] );
		return;
	}
	public function readspecial(Request $request){
		$query1 = DB::table("offers")->selectRaw(" amount, listing_id, user_id")->orderByRaw("amount desc")->first();
		$query15 = DB::table("listings")->selectRaw("title")->whereRaw("id = " . $query1->listing_id)->first();

		$query = new stdClass();
		$query->listing_id = $query1->listing_id;
		$query->title = $query15->title;
		$query->user_id = $query1->user_id;
		$query->amount = $query1->amount;

		$query2 = DB::table("offers")->selectRaw("COUNT(*) as count, listing_id")->groupByRaw("listing_id")->orderByRaw("count desc")->first();
		$query233 =  DB::table("listings")->selectRaw("title, user_id")->whereRaw("id = " . $query2->listing_id)->first();

		$query266 = new stdClass();
		$query266->listing_id = $query2->listing_id;
		$query266->title = $query233->title;
		$query266->user_id = $query233->user_id;
		$query266->total_bids = $query2->count;

		$query3 = DB::table("listings")->selectRaw("title, id, user_id, valid_until")->whereRaw("NOW() < valid_until")->orderByRaw("valid_until asc")->first();
		$query4 = DB::table("listings")->selectRaw("title, id, user_id, valid_until")->orderByRaw("created_time desc")->first();

		echo json_encode([$query, $query266, $query3, $query4]);
		return;
	}
}
