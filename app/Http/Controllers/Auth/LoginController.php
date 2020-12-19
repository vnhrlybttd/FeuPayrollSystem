<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Cookie;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Http\Controllers\Auth\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    //public function __construct()
    //{
   //     $this->middleware('guest')->except('logout');

       
   // }
    

   public function username(){
       return 'username'; 
   }

   protected $redirectTo = '/home';
   protected $redirectAfterLogout = '/auth/login';


    public function login(Request $request) {



        $this->validateLogin($request);



        alert('Login','Successfully Logged In!', 'success')->autoClose(3000);

        //toast('Successfully Logged In!','success')->autoClose(5000);
    
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
           return $this->sendLockoutResponse($request);
        }
    
        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
    
            // Make sure the user is active
            if ($user->status && $this->attemptLogin($request)) {
                // Send the normal successful login response
                return $this->sendLoginResponse($request);
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['active' => 'You must be active to login.'])
                    ->withErrors([$this->username() => 'You must be active to login.']);
            }

        }
    
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
   


        return redirect()->intended();

       
    
    }

    public function authenticated(Request $request, $user)
{

    if ($user->force_password === '0'){
        //$force_password = Auth::user($user->id === 2);
        //dd($force_password);
        $request->session()->put('id',$user->id);
        //auth()->logout();
        return redirect('/forcepassword')->with('message', "First Time Login! Kindly Change Your Password Immediately!");
    }
    
    if ($user->resets_password === '0'){

        $request->session()->put('id',$user->id);

        //dd($user);

        return redirect('/passwordresets')->with('message', "Your Password has been Reset by Super Admin!");
    }
    
    

    \Auth::logoutOtherDevices(request('password'));

    

    $request->session()->forget('password_expired_id');

    $password_updated_at = $user->passwordSecurity->password_updated_at;
    $password_expiry_days = $user->passwordSecurity->password_expiry_days;
    //$force_password = $user->passwordSecurity->force_password;
    $password_expiry_at = Carbon::parse($password_updated_at)->addDays($password_expiry_days);
    //dd($force_password);
    //$force_password_at = Carbon::parse($force_password)->addDays($password_expiry_days);
    if($password_expiry_at->lessThan(Carbon::now())){
        $request->session()->put('password_expired_id',$user->id);
        auth()->logout();
        return redirect('/passwordExpiration')->with('message', "Your Password is expired, You need to change your password.");
    }
    
  



    return redirect()->intended($this->redirectPath());

    return back();


}

   
public function logout(Request $request)
{
    $this->guard()->logout();

    $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect('/login');
}
    

    
}
