<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Meal;
use App\Bazar;
use App\Member;

class GenerelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function home(){
        
        $asset = Asset::selectRaw('sum(asset_amount) as member_amount,member_id')
         ->groupBy(['member_id'])
         ->where('status','=',1)
         ->orderBy('member_amount','desc')
         ->get();

        return view('admin.index',['asset'=>$asset]);
    }


    public function index()
    {
        
        return view('admin.meal_chart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $start_date = date("Y-m-d", strtotime($request->start_date));   
         $end_date = date("Y-m-d", strtotime($request->end_date));

         $meal = Meal::whereBetween('date',[$start_date,$end_date])->sum('meal_amount');   

         $bazar = Bazar::whereBetween('date',[$start_date,$end_date])->sum('bazar_amount');  
          

         if($meal!=0 && $bazar!=0){
         $meal_rate = $bazar/$meal; 
            
          }
          else{
            $meal_rate = 0;    
          }  
        $asset = Asset::selectRaw('sum(asset_amount) as member_amount,member_id')
         ->groupBy(['member_id'])
         ->whereBetween('asset_date',[$start_date,$end_date])
         ->orderBy('member_amount','desc')
         ->get();

         return view('admin.view_meal_chart',[
            'meal_rate'=>$meal_rate,
             'asset'=>$asset,
             'start_date'=>$start_date,
             'end_date'=>$end_date,
             'total_cost'=>$bazar,
             'total_meal'=>$meal
            ]);
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
        //
    }
}
