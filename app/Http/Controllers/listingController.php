<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\listings;
use App\Models\users;
use App\Models\categories;

class stdClass{

}

class listingController extends Controller
{
	public function create(Request $request){
		$token = $request->cookie("session_token");

		$query = DB::table("session_tokens")->selectRaw("user_id")->whereRaw("token = '" . $token . "'")->get();
		
		$user = new users();
		
		foreach($query as $AAAA){
			$user->id = $AAAA->user_id;
		}

		$cat = new categories();
		$cat->id = $request->category;

		$listing = new listings();
		$listing->title = $request->title;
		$listing->description = $request->description;
		$listing->created_time = date("Y-m-d H:i:s", time());
		$listing->valid_until = $request->valid_until;
		$listing->starting_price = $request->starting_price;
		$listing->user()->associate($user);
		$listing->category()->associate($cat);
		echo $listing;
		$listing->save();
		return;
	}
	
	public function read(Request $request){
		$request->listing = DB::connection()->getPdo()->quote($request->listing);
		$query = DB::table("listings")->selectRaw("*")->whereRaw("id = " . $request->listing)->first();
		$query2 = DB::table("media")->selectRaw("*")->whereRaw("listing_id = " . $request->listing)->first();
		
		$query3 = DB::table("offers")->selectRaw("amount, user_id")->whereRaw("listing_id = " . $request->listing)->orderByRaw("amount desc")->first();

		echo json_encode( [$query, $query2, $query3] );
		return;
	}

	public function getfromcategory(Request $request){
		$query = DB::table("listings")->selectRaw("*")->whereRaw("category_id = '" . $request->category . "'")->get();
		$result = array();
		$new_obj = new stdClass();
		foreach($query as $AAAA){
			$new_obj->id = $AAAA->id;
			$new_obj->title = $AAAA->title;
			$new_obj->description = $AAAA->description;
			$result[] = $new_obj;
		}
		echo json_encode($result);
		return;
	}

}
