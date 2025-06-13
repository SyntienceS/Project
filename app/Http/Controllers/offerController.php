<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\listings;
use App\Models\offers;
use App\Models\users;

class offerController extends Controller
{
    public function create(Request $request){
		$status = false;
		
		$token = $request->cookie("session_token");
		$query = DB::table("session_tokens")->selectRaw("user_id")->whereRaw("token = '" . $token . "'")->first();

		$user_id = $query->user_id;

		$listingId = $request->listing;
		$bid = $request->bid_amount;

		$offer = new offers();
		$offer->final = false;
		$offer->successful = false;
		$offer->amount = $bid;
		$offer->offer_time = date("Y-m-d H:i:s", time());

		$listing = new listings();
		$listing->id = $request->listing;
		$user = new users();
		$user->id = $user_id;

		$offer->user()->associate($user);
		$offer->listing()->associate($listing);

		$offer->save();

		$status = true;
		echo $status;
		return;
	}
}
