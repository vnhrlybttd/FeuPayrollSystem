<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Rules\StrongPassword;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class PwdExpirationController extends Controller
{
    public function showPasswordExpirationForm(Request $request){
        $password_expired_id = $request->session()->get('password_expired_id');
        if(!isset($password_expired_id)){
            return redirect('/login');
        }

        //dd($password_expired_id);
        return view('auth.passwordExpiration');
    }

    public function postPasswordExpiration(Request $request){
        $password_expired_id = $request->session()->get('password_expired_id');
        if(!isset($password_expired_id)){
            return redirect('/login');
        }

        $user = User::find($password_expired_id);

        $request->validate([
            'current_password' => ['required'],
            'password' => [
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
            'new_confirm_password' => ['same:password'],
        ]);
        
 
        
        //Change Password
        $user->password = bcrypt($request->get('password'));
       
        $user->save();
        //dd($user);
        //Update password updation timestamp
        $user->passwordSecurity->password_updated_at = Carbon::now();
        $user->passwordSecurity->save();

        return redirect('/login')->with("status","Password changed successfully, You can now login !");
    }
}
