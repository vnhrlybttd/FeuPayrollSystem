<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rules\MatchOldPassword;
use App\Rules\StrongPassword;
use Hash;
use Auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

class ChangePasswordController extends Controller
{
    public function form($id){
        
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        $finds = User::find(Crypt::decrypt($id));

    return view ('changepassword',compact('finds'));
    }

    public function complete(Request $request, $id){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => [
                'required',
                'string',
                'min:12',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                'different:current_password',
                new StrongPassword
            ],
            'new_confirm_password' => ['same:new_password'],
        ]);


        //dd($request);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->back()
        ->withSuccessMessage('Change Password Successfully!');

    }




}
