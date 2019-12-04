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

// Route::get('/', function () {
//     return view('welcome');
// });

//! this route will sere as the landing page of the applictaion. It is basically the log in page of the app.

Route::get('/','LogInController@logIn');

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

//! this is the link that has the sample download pdf. 

Route::get('/samplePDF/{progId}','UserControllers\PDFController@downloadPFD');

//!this route will be used to handle the creation of a new program.

Route::get('/addingNewProramStep0','adminController\adminController@addingANewProgramstep0');
Route::get('/addingNewProramStep1','adminController\adminController@addingANewProgramstep1');

//! this route is a post route that is used to post the data that has been submiited from the step1 of the adding a new proram.

Route::post('/submittingProgramDetails','adminController\adminController@submittingProgramDetails');

//!the route that is going to be defined below is going to be used to used to post the perspectives table. 

Route::post('/submittingPerspectives','adminController\adminController@submittingPerspectives');

//! this route is going to be used to post the emails of the assesors. 
Route::post('/submittingEmailAddress','adminController\adminController@submittingEmailAddress');

//! this route is used to show the assesment calender view.

Route::get('/assesmentCalender','adminController\asesmentCalender@viewingAssesmentCalender');

//! this route will be used to post the calender details when changing the data.

Route::post('/submittingCalender','adminController\asesmentCalender@submittingNewCalender');

//!this route will be used to get the viewing of the assesors.
Route::get('/viewingAssesors','adminController\programsAssesors@displayingProgramsAssesors');

//!this route will be used to delete the assesor that has been selected.

Route::post('/deletingAssesor','adminController\programsAssesors@deletingAssesor');

//! this route will be used to ost the results of editing the users.

Route::post('/editingUser','adminController\programsAssesors@editingAnAssesor');

//! this route will be used to post the addition of a new user to the system.

Route::post('/addingAssesor','adminController\programsAssesors@addingAssesor');
