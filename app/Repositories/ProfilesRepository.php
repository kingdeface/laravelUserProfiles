<?php

namespace App\Repositories;

use App\User;
use App\Profile;

class ProfilesRepository
{
    protected $allowable_inputs = array('location', 'bio', 'twitter_username', 'github_username');


    public function saveProfile($request)
    {
        $user_id = $request->user()['id'];
        $profile = $request->user()['profile'];
        //If we have a null profile make sure we create it first
        if (is_null($profile)) {
            $this->createEmpty($user_id);
        }

        $user = $this->getUserWithProfileByUserID($user_id);
        $input = $request->only($this->allowable_inputs);
        if ($request->hasFile('profile_image')) {
            $file =  $request->file('profile_image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $filename);
            $input['profile_image'] = $filename;
        }

        $user->profile->fill($input)->save();
    }

    public function createEmpty($user_id)
    {
        $user = $this->getUserWithProfileByUserID($user_id);
        $user->profile()->save(new Profile());
        return $user->profile();
    }

    public function getUserWithProfileByUserID($id)
    {
        return User::with('profile')->findOrFail($id);
    }

    public function getAll()
    {
        return User::with('profile')->paginate(9);
    }

    public function searchAll($query)
    {
        $users =  User::where('name', 'LIKE', "%$query%")->with('profile')->paginate(9);
        return $users;
    }
}
