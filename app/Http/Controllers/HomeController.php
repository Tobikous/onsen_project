<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;
use App\Http\Requests\UserRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */


    public function index()
    {
        $user = \Auth::user();
        $reviews = Review::latestOrder()->paginate(3);
        // $reviews = Review::active()->latestOrder()->get();
        $myReviews = Review::where('user_id', $user['id'])->latestOrder()->paginate(3);
        return view('home', compact('user', 'reviews', 'myReviews'));
    }
}
