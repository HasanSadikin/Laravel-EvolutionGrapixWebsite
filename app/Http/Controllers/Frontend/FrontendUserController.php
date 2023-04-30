<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendUserController extends Controller
{
    public function index()
    {   
        return view('frontend.users.index');
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required'],
            'pin_code' => ['required'],
            'address' => ['required','string','max:499'],
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'name' => $request->username,
        ]);

        $user->userDetails()->updateOrCreate([
            'user_id' => $user->id
        ],[
            'phone' => $request->phone,
            'address' => $request->address,
            'pin_code' => $request->pin_code, 
        ]);

        return redirect()->back()->with('message', 'User Profile Updated');
    }
}
