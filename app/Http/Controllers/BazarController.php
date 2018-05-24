<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bazar;
use App\Member;
use Validator;
use Session;

class BazarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.view_bazar');
    }

    // view bazar 

    public function Viewbazar(Request $request){
                 $validator = Validator::make($request->all(),[
               
               'start_date'=>'required',
               'end_date'=>'required'
            ]);

   if($validator->fails()){

        Session::flash('warning','Start date and End date are required');  
          return redirect()->back()->withErrors($validator);

     }

     $start_date = date("Y-m-d", strtotime($request->start_date));
     $end_date = date("Y-m-d", strtotime($request->end_date));




        $bazar = Bazar::whereBetween('date',[$start_date,$end_date])
        ->orderBy('created_at','desc')
        ->get();

         return view('admin.show_bazar',[
          
          'start_date'=>$start_date,
          'end_date'=>$end_date,
          'bazar'=>$bazar

        ]);


    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $bazar = Bazar::orderBy('id','desc')->take(15)->get(); 
        return view('admin.insert_bazar',['bazar'=>$bazar]);
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
        
        
        'date'=>'required',
        
        'amount'=>'required|numeric'
    ]);

   if($Validator->fails()){
          
          return redirect()->back()->withErrors($Validator);

   }

$date = date("Y-m-d", strtotime($request->date)); 

   $bazar = new  Bazar;

   $bazar->member_name = $request->name;
   $bazar->bazar_amount = $request->amount;
   $bazar->date = $date;
   $bazar->save();

   Session::flash('success','Insert Success');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = Bazar::find($id);
        $data->delete();
        
        Session::flash('success','Delete Success');
        return redirect()->back();

    }
}
