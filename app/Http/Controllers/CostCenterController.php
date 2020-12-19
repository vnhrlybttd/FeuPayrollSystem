<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\costcenter;
use RealRashid\SweetAlert\Facades\Alert;


class CostCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }


        $table = DB::Table('costcenter')->get();

        return view('costcenter.index',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('costcenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cc_name' => 'required',
            'description' => 'required',
        ]);
        costcenter::create($request->all());
        
        return redirect()->route('CC.index')
        ->withSuccessMessage('Update Cost Center Successfully!');
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
        $costcenter = costcenter::find($id);
        //dd($costcenter);
        return view ('costcenter.edit',compact('costcenter'));
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
            'cc_name' => 'required',
            'description' => 'required',
        ]);

        $finds = costcenter::find($id);
        $finds->update($request->all());

    

        return redirect()->route('CC.index')
        ->withSuccessMessage('Update Cost Center Successfully!');
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
