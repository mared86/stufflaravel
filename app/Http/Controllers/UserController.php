<?php
/**
 * Created by PhpStorm.
 * User: mared
 * Date: 10/2/2016
 * Time: 12:37 AM
 */

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile()
    {
        return view("profile", ["user" => Auth::user()]);
    }

    public function update_avatar(Request $request)
    {
//        handel the user upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename=time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path("/uploads/avatars/".$filename));
            $user=Auth::user();
            $user->avatar=$filename;
            $user->save();

        }
        return view("profile", ["user" => Auth::user()]);
    }

}