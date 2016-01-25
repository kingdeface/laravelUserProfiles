<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Repositories\ProfilesRepository;

class ProfilesController extends Controller
{
    protected $profiles;

    public function __construct(ProfilesRepository $profiles)
    {
        $this->middleware('auth', ['only'=> ['edit','update']]);
        $this->middleware('admin', ['only'=> ['index']]);
        $this->middleware('authUser', ['only'=> ['show']]);

        $this->profiles = $profiles;
    }

    /**
    * Show the profile for the given user.
    *
    * @param  int $id
    * @return Response
    */
    public function index()
    {

        $user_profiles = $this->profiles->getAll();

        return view('profiles.index')->with('user_profiles', $user_profiles);
    }

    /**
    * Show the profile for the given user.
    *
    * @param  int $id
    * @return Response
    */
    public function show($id)
    {
        $user = $this->profiles->getUserWithProfileByUserID($id);
        return view('profiles.show')->withUser($user);
    }

    /**
    * /profiles/id/edit
    *
    * @param $id
    * @return mixed
    */
    public function edit(Request $request)
    {
        $user = $this->profiles->getUserWithProfileByUserID($request->user()['id']);
        return view('profiles.edit')->withUser($user);
    }

    /**
    * Update a user's profile
    *
    * @param $request
    * @return mixed
    * @throws Laracasts\Validation\FormValidationException
    */
    public function update(Request $request)
    {
        $this->validate($request, [
            'twitter_username' => 'max:15',
            'github_username' => 'min:4 | max:30',
            'bio' => 'max:500',
            'profile_image' => 'image | mimes:jpeg,jpg,png | max:1000'
        ]);

        $this->profiles->saveProfile($request);

        return redirect()->back()->with('flash_message', 'Profile Updated!');
    }

    /**
    * Searches user's profile by name
    *
    * @param $request
    * @return mixed
    */

    public function search(Request $request)
    {

        // Gets the query string from our form submission
        $query = $request->input('search');

        $user_profiles = $this->profiles->searchAll($query);

        return view('profiles.index')->with('user_profiles', $user_profiles);

    }
}
