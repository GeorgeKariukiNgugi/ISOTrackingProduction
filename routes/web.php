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

Route::post('submitScores','userControllers\UserController@submittingKPIScores');

//! submitting the nonconformities values. 
Route::post('submitNonConformities','userControllers\UserController@submittingNonConformities');

//! this is the function that is used to store the new kpis that have been generated.
Route::post('submittingKPI','userControllers\UserController@submittingNewKPIs');


//!this is the route that is used to generate the dashboard graphs amoung others. 

Route::get('dashBoard/{id}','userControllers\UserController@DashboardConroller');

//! this is the route that will handle the viewing of all the nonconformities that have been identified from the particular program.
Route::get('/nonconformities/{program}/{closed}','userControllers\UserController@nonConformities');

//! this route will be used to hande the submission of the closing of the noncongormities that have been identified.

Route::post('/closingNonConformity','userControllers\UserController@closingNonConformity');

//! this route will handle all the sample export of the ecell file.

Route::get('/sampleExcelDownload/{programId}/{status}', 'userControllers\spreadheetExports@export');

//! this is the link that has the sample download pdf. 

Route::get('/samplePDF/{progId}','userControllers\PDFController@downloadPFD');

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

//!this route will be used to get the viewing ofnonConformities@viewingNonConformities the assesors.
Route::get('/viewingAssesors','adminController\programsAssesors@displayingProgramsAssesors');

//!this route will be used to delete the assesor that has been selected.
Route::post('/deletingAssesor','adminController\programsAssesors@deletingAssesor');

//! this route will be used to ost the results of editing the users.
Route::post('/editingUser','adminController\programsAssesors@editingAnAssesor');

//! this route will be used to post the addition of a new user to the system.
Route::post('/addingAssesor','adminController\programsAssesors@addingAssesor');

//! this route will be used to handle the viewing of all the types of nonconformities that are targeted towards the admin.
Route::get('/nonConformitiesAdmin/{type}/{program}','adminController\AdminnonConformities@viewingNonConformities');

//! this method wil be used to post the data that will be used to search for the perticular non-conformities of a program.
Route::post('/searchingNonConformities/{type}/{program}','adminController\AdminnonConformities@viewingNonConformities');

//!this route will be handling the the expertation of the spreadsheet that has the non conformities.
Route::get('/adminNonConformitiesExcelDownload/{type}', 'adminController\spreadsheetExport@exportingData');

//! this route is used to get the program details of each program.
Route::get('/programDetails/{id}','adminController\programDetails@viewingTheProgramDetails');

//! this roue will be used to delete the programs.
Route::post('/deletingProgram','adminController\programDetails@deleteProgram');

//! this route will be used to post the resulta that are from editing the program.
Route::post('/eitingTheProgram','adminController\programDetails@editProgram');

//! this route is used to get the scores of the program that has been selected.
Route::get('/scores/{id}','adminController\scoresConroller@viewScores');

//! this route is used to get the various dashboards of the programs.
Route::get('/programDashboard/{id}','adminController\Programdashboard@programDashboard');

//! this route will be used to get the proram matrices of all the prorams that are in a particular program.
Route::get('/programMatrices/{id}','adminController\programMatrices@proramMatrices');

//! this route will be used to submit the adding of a new strategic objective.
Route::post('/addingNewStrstegicObjective/{id}', 'adminController\programMatrices@addStrategicObjective');

//! this route will be used to post the editing of each KPI.
Route::post('/editingKPIs/{id}','adminController\programMatrices@EditingKpis');

//! this route is used to post the deletion of a particular KPI.
Route::post('/deletingKPI/{id}','adminController\programMatrices@deleteKPI');

//! this route is used to delete a particulae strategic Objective. 
Route::post('/deleteStrObjective/{id}','adminController\programMatrices@deleteStrategicObjective');

//! this route is used to edit the name of a particular strategicObjective.
Route::post('editingStrObjective/{id}', 'adminController\programMatrices@editStrategicObjective');

//! this route will be used to display the video tutorial.
Route::get('/usersTutorial/{id}', 'userControllers\UserController@video');

//! this route will be usedto get the reports view. 
Route::get('/reports/{id}','userControllers\reports@viewReports');

Route::get('/adminReports', 'userControllers\reports@adminReports');


