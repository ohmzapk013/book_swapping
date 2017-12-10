<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.detail_profile', ['user' => $user]);
    }

    public function edit()
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        return view('profile.edit_profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required',
                'change_avatar' => 'image|mimes:jpeg,jpg,png,gif',
                'change_cover' => 'image|mimes:jpeg,jpg,png,gif'
            ],
            [
                'name.required' => 'Please fill the Name',
            ]
        );
        if ($validate->fails()) {
            return redirect()->route('update_profile')
                             ->withErrors($validate)
                             ->withInput();
        } else {
            $user                   = User::findOrFail(Auth::id());
            $user->name             = $request->name;
            $user->phone            = $request->phone;
            $user->gender           = $request->gender;
            $user->date_of_birth    = $request->date_of_birth;
            $position = json_decode($request->position);
            if ($position != null) {
                $user->lat              = $position->lat;
                $user->lng              = $position->lng;
            }
            //check avatar
            if ($request->hasFile('change_avatar')) {
                $file = $request->change_avatar;
                $avatarName = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/avatars', $avatarName);
                $user->avatar = '/images/avatars/' . $avatarName;
            }
            if ($request->hasFile('change_cover')) {
                $file = $request->change_cover;
                $coverName = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/covers', $coverName);
                $user->cover = '/images/covers/' . $coverName;
            }
            $user->save();
            return redirect()->route('update_profile');
        }
    }  
}
