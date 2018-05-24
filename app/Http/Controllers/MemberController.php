<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Validator;
use Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::paginate(10);
        return view('admin.create_member',[
               'member'=>$member
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
   $Validator = Validator::make($request->all(),[
        
        'name'=>'required'
    ]);

   if($Validator->fails()){
          
          return redirect()->back()->withErrors($Validator);

   }

   $member = new Member;
   $member->name = $request->name;
   $member->status = 1;

   $member->save();
   
   Session::flash('success','Memeber Added');

   return redirect()->back();

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    
    $Validator = Validator::make($request->all(),[
        
        'name'=>'required'
    ]);

   if($Validator->fails()){
          
          return redirect()->back();

   }

   $member = Member::find($id);

   $member->name = $request->name;
   $member->status = $request->status;
   $member->save();
   
   Session::flash('success','Update success');
   return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
