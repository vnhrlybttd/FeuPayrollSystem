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

class ForcePasswordController extends Controller
{
    public function form(Request $request){
        //$user = User::find()->where('id','=',Auth::user('id'));
//dd($user);
$user = $request->session()->get('id');
        return view('auth.forcepassword');
    }

    public function postform(Request $request){
       

        //dd($request);
        

        $user = $request->session()->get('id');
        $user = User::find($user);

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
        
        $password = $request->get('password');
            
        //dd($password);

        //Change Password
        $user->password = bcrypt($request->get('password'));
        $user->force_password = '1';
      
        $user->save();
        //dd($user);
        //$user->save();
        //dd($user);
        //Update password updation timestamp
        //$user->passwordSecurity->password_updated_at = Carbon::now();
        //$user->passwordSecurity->save();

        return redirect('/login')->with("status","Password changed successfully, You can now login !");
    }
}
