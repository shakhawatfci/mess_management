<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'auth'],function(){


Route::get('/','GenerelController@home');

Route::resource('member','MemberController');
Route::resource('meal','MealController');

Route::get('Meal/Delete/{id}',['as'=>'meal.delete','uses'=>'MealController@destroy']);

Route::resource('bazar','BazarController');

Route::get('View/Bazar',['as'=>'view.bazar','uses'=>'BazarController@Viewbazar']);

Route::get('Bazar/Delete/{id}',['as'=>'bazar.delete','uses'=>'BazarController@destroy']);

Route::resource('asset','AssetController');

Route::get('Asset/personal',['as'=>'personal.asset','uses'=>'AssetController@PersonalAsset']);

Route::get('Asset/Delete/{id}',['as'=>'asset.delete','uses'=>'AssetController@destroy']);


Route::get('MealChart',['as'=>'meal.chart','uses'=>'GenerelController@index']);

Route::post('MealChartView',['as'=>'mealChart.view','uses'=>'GenerelController@store']);

// individual meal 

Route::get('ViewPersonalMeal',['as'=>'personal.meal','uses'=>'MealController@personalMeal']);

Route::get('ViewIndividulalMeal',['as'=>'individual.meal','uses'=>'MealController@individualMeal']);

Route::get('logout','HomeController@logout');

// Route::get('sendmail',function(){
      
//     $bazar=App\Bazar::take(10)->get();  
//     $email = '94shakha.18@gmail.com';
// 	\Mail::send('test', array('bazar'=>$bazar), 
// 				function ($message) use ($email){
// 					$message->from('noreply@hacker.com','unknow');
// 					$message->to($email)->subject('About Chesra Job Circular In BDJOBs');
// 				});

// });

});
Auth::routes();

Route::get('/home', 'HomeController@index');
