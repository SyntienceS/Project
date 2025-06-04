<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\users;
use App\Models\session_tokens;

class userController extends Controller
{
	public function register(Request $request){
		$user = new users();
		$user->username = $request->username;
		$user->display_name = $request->display_name;
		$user->password = password_hash( $request->password, PASSWORD_BCRYPT );
		$user->email = $request->email;
		$user->privilege = 1;

		$query = DB::table('users')->selectRaw("id, username, email")->whereRaw("username = '" . $user->username . "' OR email = '" . $user->email . "'")->get();

		if(count($query)){
			echo "Name or email already taken!";
			return;
		}

		$token = new session_tokens();
		$token->token = bin2hex(random_bytes(32));
		$user->save();
		$token->user()->associate($user);
		$token->save();
		
		setcookie("session_token", $token->token, time()+3600*24, "/");
    	
		return;
    }
    public function login(Request $request){
		$query = DB::table('users')->selectRaw("id, password")->whereRaw("username = '" . $request->username . "' OR email = '" . $request->username . "'")->get();
		foreach( $query as $user){
			$id = $user->id;
			$password = $user->password;
		}

		if(!password_verify($request->password, $password)){
			echo "Wrong password!";
			return;
		}


		$query = DB::table('session_tokens')->selectRaw("token")->whereRaw("user_id = '" . $id . "'")->get();

		foreach($query as $AAAA){
			setcookie("session_token", $AAAA->token, time()+3600*24, "/");
		}
    	return;
    }

}
