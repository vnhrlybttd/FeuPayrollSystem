<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Rules\MatchOldPassword;
use App\Rules\StrongPassword;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;
use Auth;

class EndUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endUser = auth()->user()->emp_id;

        $userAccount = DB::table('users')
        ->where('emp_id','=',$endUser)
        ->get();

        $profile = DB::table('hr_employee')
        ->where('emp_pin','=',$endUser)
        ->get();
        
        
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }


        //dd($userAccount);
        return view('profile.index',compact('profile','userAccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }


        $finds = User::find($id);

        //dd($finds);
        return view('profile.edit',compact('finds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

       
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->back()
        ->withSuccessMessage('Change Password Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
