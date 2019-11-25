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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home','HomeController@programRedirect');
Route::get('/forbidden', function () {
    
    return view('forbidden');
});

//! submission of kpi scores 

Route::post('submitScores','UserControllers\userController@submittingKPIScores');

//! submitting the nonconformities values. 
Route::post('submitNonConformities','UserControllers\userController@submittingNonConformities');

//! this is the function that is used to store the new kpis that have been generated.
Route::post('submittingKPI','UserControllers\userController@submittingNewKPIs');


//!this is the route that is used to generate the dashboard graphs amoung others. 

Route::get('dashBoard/{id}','UserControllers\userController@DashboardConroller');

//! this is the route that will handle the viewing of all the nonconformities that have been identified from the particular program.
Route::get('/nonconformities/{program}/{closed}','UserControllers\userController@nonConformities');

//! this route will be used to hande the submission of the closing of the noncongormities that have been identified.

Route::post('/closingNonConformity','UserControllers\userController@closingNonConformity');

//! this route will handle all the sample export of the ecell file.

Route::get('/sampleExcelDownload/{programId}/{status}', 'UserControllers\spreadheetExports@export');