<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Member;
use Validator;
use Session;

class MealController extends Controller
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
           
         $member = Member::orderBy('name','ASC')->where('status','=',1)->get();
          
          $meal = Meal::orderBy('id','desc')->take(15)->get(); 
        return view('admin.insert_meal',['member'=>$member,'meal'=>$meal]);
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
        
        'meal'=>'required|regex:/^\d*(\.\d{2})?$/',
        'date'=>'required',
    ]);

   if($Validator->fails()){
          
          return redirect()->back()->withErrors($Validator);

   }

    
    $count = count($request->member);

    if($count<=0){
       
       Session::flash('error','You Have To Select Atleast One Member');
       return redirect()->back();
 
    }


        
   $date = date("Y-m-d", strtotime($request->date)); 

   $check = Meal::where('date','=',$date)->whereIn('member_id',$request->member)->count();

   if($check>0){
     
     Session::flash('error','Some One In The List Already Has Meal In this Day');
     return redirect()->back();

   }
    
   foreach ($request->member  as  $member) {

   $meal = new  Meal;
   $meal->meal_amount = $request->meal;
   $meal->member_id = $member;
   $meal->date =  $date;
   $meal->save();
    
    } 
  

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
        
        $data = Meal::find($id);
        $data->delete();
        
        Session::flash('success','Delete Success');
        return redirect()->back();

    }

    // individual meal

    public function personalMeal(){
        $member = Member::orderBy('name','ASC')->get();
        return view('admin.personal_meal',[
             'member'=>$member
            ]);

    }

    public function individualMeal(Request $request){

         
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


        $meal = Meal::where('member_id','=',$member)
        ->whereBetween('date',[$start_date,$end_date])
        ->orderBy('created_at','desc')
        ->get();


     }
     else{

      $meal = Meal::whereBetween('date',[$start_date,$end_date])
         ->orderBy('created_at','desc')
        ->get();

     }

     return view('admin.personal_meal_view',[
          
          'start_date'=>$start_date,
          'end_date'=>$end_date,
          'meal'=>$meal

        ]);


    }


}
