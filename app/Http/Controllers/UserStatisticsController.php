<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserStatisticsController extends Controller
{
    public function index()
    {
        $users = User::with('statistics')->get();

        return view('main', compact('users'));
    }
}
