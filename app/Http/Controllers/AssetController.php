<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Member;
use Validator;
use Session;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $member = Member::orderBy('name','ASC')->get();

        return view('admin.view_asset',[
             'member'=>$member
            ]);
    }
       
   // asset view 

        public function PersonalAsset(Request $request){

         
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

     $member = $request->member;

     if($member!=null){


        $asset = Asset::where('member_id','=',$member)
        ->whereBetween('asset_date',[$start_date,$end_date])
        ->orderBy('created_at','desc')
        ->get();


     }
     else{

      $asset = Asset::whereBetween('asset_date',[$start_date,$end_date])
         ->orderBy('created_at','desc')
        ->get();

     }

     return view('admin.show_asset',[
          
          'start_date'=>$start_date,
          'end_date'=>$end_date,
          'asset'=>$asset

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
           
         $member = Member::orderBy('name','ASC')->where('status','=',1)->get();
          
          $asset = Asset::orderBy('id','desc')->take(15)->get(); 
        return view('admin.insert_asset',['member'=>$member,'asset'=>$asset]);
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
        
        'amount'=>'required|numeric',
        'date'=>'required',
        'member'=>'required',
        'status'=>'required'
    ]);

   if($Validator->fails()){
          
          return redirect()->back()->withErrors($Validator);

   }


 $date = date("Y-m-d", strtotime($request->date)); 

   $asset = new  Asset;



   $asset->asset_amount = $request->amount;
   $asset->member_id = $request->member;
   $asset->status = $request->status;
   $asset->asset_date = $date;
   $asset->save();

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
       
        $data = Asset::find($id);
        $data->delete();
        
        Session::flash('success','Delete Success');
        return redirect()->back();
    }
}
