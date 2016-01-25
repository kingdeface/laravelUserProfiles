<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Repositories\ProfilesRepository;

class DashboardController extends Controller
{
    protected $profiles;
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(ProfilesRepository $profiles)
    {
        $this->middleware('auth');
        $this->profiles = $profiles;
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $user = $this->profiles->getUserWithProfileByUserID($request->user()['id']);
        return view('dashboard')->withUser($user);
    }
}
