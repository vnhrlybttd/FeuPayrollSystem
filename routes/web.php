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
        return view('auth.login');
    });

 

    
//Auth::routes();
Auth::routes(['register' => false,'verify' => false,'reset' => false]);

/*
//ROLES AND PERMISSION ROUTES
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController'); //
    Route::resource('users','UserController'); //

    //Payslip Non Academic
route::resource('payslip','EmployeePayslipController'); //

//Payslip Non Faculty
route::resource('payslipFaculty','payslipFacultyController'); //

//Non Academic Faculty
route::resource('NonFaculty','PayrollUserController'); //

//Non Academic Faculty
route::resource('Faculty','FacultyController'); //

//SSS_Table
route::resource('sss_table','SSSController'); //

    //Employee ITS
    route::resource('employee','EmployeeController'); //

    
    //MasterFile Admin
    route::resource('masterfile','MasterFileReportsController'); //

        //NAS Payslip Admin 
        route::resource('NASPayslip','AdminPayslipNASController'); //

         //NAS Payslip Admin 
         route::resource('FSPayslip','AdminPayslipFSController'); //

    

    Route::get('/downloadPDF/{id}','PayslipPDFController@downloadPDF'); //


    Route::get('backup', 'BackupController@index'); //
    Route::get('backup/create', 'BackupController@create');//
    Route::get('backup/download/{file_name}', 'BackupController@download');//
    Route::get('backup/delete/{file_name}', 'BackupController@delete');//

    Route::resource('audit','auditController'); //

    Route::resource('profile','EndUsersController'); //
    
    Route::resource('mypayslip','EndUsersPayslipsController'); //

    Route::resource('mylogs','TimeLogsController'); //
    
    Route::resource('calculateAbsence','FilterController'); //

    Route::resource('calculateAbsences','FilterNonFacultyController'); //

    Route::get('thirteenmonthpay','MonthPayController@index'); //
    Route::post('thirteenmonthpay','MonthPayController@filter'); //
    Route::post('thirteenmonthpay/generate','MonthPayController@generate'); //
    Route::delete('/thirteenmonthpay/delete/{id}','MonthPayController@destroy'); //
    

    Route::resource('PayrollNonFaculty','NonFacultyPayrollController'); //

    Route::resource('PayrollFaculty','FacultyPayrollController'); //



    //Route::post('datefilter','DateFilterController@datefilter');

});
*/



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/downloadPDF/{id}','PayslipPDFController@downloadPDF');



//------------------------------------DEVELOPERS ONLY -------------------------------------------------//

Route::group(['middleware' => 'App\Http\Middleware\DeveloperMiddleware'],function(){

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    
    Route::get('ResetPassword/{id}','ResetController@reset');

});

//------------------------------------SUPERADMIN ONLY -------------------------------------------------//


Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'],function(){

 //Employee
 route::resource('employee','EmployeeController');

  Route::get('backup', 'BackupController@index');
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download');
    Route::get('backup/delete/{file_name}', 'BackupController@delete');
    Route::post('backup/restore','BackupController@restore')->name('Backup.restore');
    

    Route::resource('audit','auditController');

    Route::get('Reset/{id}','ResetPasswordController@reset');

    Route::get('Deactivate/{id}','DeactivateController@deactivate');
    Route::get('Activate/{id}','DeactivateController@activate');

});

//------------------------------------CO ADMIN ONLY -------------------------------------------------//

Route::group(['middleware' => 'App\Http\Middleware\CoAdminMiddleware'],function(){

//Payslip Non Academic
route::resource('payslip','EmployeePayslipController');

//Payslip Non Faculty
route::resource('payslipFaculty','payslipFacultyController');

//Non Academic Faculty
route::resource('NonFaculty','PayrollUserController');

//Non Faculty
route::resource('Faculty','FacultyController');

//SSS_Table
route::resource('sss_table','SSSController');


//Payroll Non Faculty
Route::resource('PayrollNonFaculty','NonFacultyPayrollController');

//Payroll Faculty
Route::resource('PayrollFaculty','FacultyPayrollController');

//Calculate Absences
Route::resource('calculateAbsence','FilterController');
Route::resource('calculateAbsences','FilterNonFacultyController');


//FINAL SALARY DETAILS FOR NON FACULTY AND NON FACULTY
//Route::resource('emnf','ANonFacultySDController');

//NON FACULTY STEPS
Route::get('NonFacultySD','ANFSDstepsController@index'); 
Route::get('NonFacultySD/Create','ANFSDstepsController@create'); 
Route::post('NonFacultySD/Create/Step2','ANFSDstepsController@stepTwo'); 
Route::post('NonFacultySD/Create/Step3','ANFSDstepsController@stepThree');
Route::post('NonFacultySD/Create/Step4','ANFSDstepsController@stepFour');
Route::post('NonFacultySD/Final','ANFSDstepsController@stepFive');
Route::post('NonFacultySD/postNF','ANFSDstepsController@postNF');


//FACULTY STEPS
Route::get('FacultySD','AFSDstepsController@index'); 


//Payroll
Route::resource('NonFacultyPayroll','ANFPayrollController');

//Payslip
Route::resource('NonFacultyPayslip','ANFPayslipController');



//NON FACULTY ADD EMPLOYEES
Route::get('AddEmployeeNF','AddEmployeeNFController@index'); 
Route::get('AddEmployeeNF/Step1','AddEmployeeNFController@stepOne'); 
Route::post('AddEmployeeNF/Step2','AddEmployeeNFController@stepTwo'); 
Route::post('AddEmployeeNF/Step3','AddEmployeeNFController@stepThree');
Route::post('AddEmployeeNF/Step4','AddEmployeeNFController@stepFour');
Route::post('AddEmployeeNF/addEmployee','AddEmployeeNFController@addEmployee'); 

//Salary Details
Route::get('AddEmployeeNF/editNF/{id}','AddEmployeeNFController@editNF');
Route::patch('AddEmployeeNF/update/{id}','AddEmployeeNFController@updateNF')->name('AddEmployeeNF.update');

Route::get('AddEmployeeF/editF/{id}','AddEmployeeNFController@editF');
Route::patch('AddEmployeeF/update/{id}','AddEmployeeNFController@updateF')->name('AddEmployeeF.update');


//Payslip
Route::get('PayrollComputation','AddPayslipNFController@index');
Route::get('PayrollComputation/Step1','AddPayslipNFController@stepOne');
Route::post('PayrollComputation/Step2','AddPayslipNFController@stepTwo');
Route::post('PayrollComputation/Step3','AddPayslipNFController@stepThree');
Route::post('PayrollComputation/Step4','AddPayslipNFController@stepFour');
Route::post('AddPayslip/Post','AddPayslipNFController@post');

//Edit Payslip

Route::get('PayrollComputation/edit/{id}','AddPayslipNFController@editPayslipNF');
Route::patch('PayrollComputation/edit/{id}/fin','AddPayslipNFController@postPayslipNF')->name('AddPayslipNF.update');

Route::get('AddPayslipF/edit/reject/{id}','AddPayslipNFController@editPayslipF');
Route::patch('AddPayslipF/edit/{id}/fin','AddPayslipNFController@postPayslipF')->name('AddPayslipF.update');



//PDF Payroll
Route::get('nfGeneratePayroll/{id}','nfPDFController@pdf')->name('nfGeneratePayroll.generate'); //not yet done
//PDF Payslip
Route::get('nfGeneratePayslip/{id}','nfGeneratePayslipController@print')->name('nfGeneratePayslip.generate');
//PDF 13th Month Pay
Route::get('nfGenerateMonthPay/{id}','nfGenerateMonthPayController@print')->name('nfGenerateMonthPay.generate');
//PDF Wittholding Tax
Route::get('nfGenerateWTax/{id}','nfGenerateWTaxController@print')->name('nfGenerateWTax.generate');
//PDF Payroll Entry
Route::get('nfGeneratePayrollEntry/{id}','nfGeneratePayrollEntryController@print')->name('nfGeneratePayrollEntry.generate');


//FACULTY ADD EMPLOYEES
Route::get('AddEmployeeF','AddEmployeeFController@index'); 
Route::get('AddEmployeeF/Step1','AddEmployeeFController@stepOne'); 
Route::post('AddEmployeeF/Step2','AddEmployeeFController@stepTwo'); 
Route::post('AddEmployeeF/Step3','AddEmployeeFController@stepThree');
Route::post('AddEmployeeF/Step4','AddEmployeeFController@stepFour');
Route::post('AddEmployeeF/addEmployee','AddEmployeeFController@addEmployee'); 

//Reports
Route::get('Reports','ReportsController@index');
//Monthly Reports
Route::get('Reports/Monthly/Step1','ReportsController@monthly')->name('Reports.monthly');
Route::post('Reports/Monthly/Step2','ReportsController@monthlyStep1');
Route::post('Reports/Monthly','ReportsController@monthlyStep2');
Route::get('Reports/Monthly/Show/{id}','ReportsController@monthlyShow');
//Payroll Entry
Route::get('Reports/PayrollEntry/Step1','ReportsController@payrollentry')->name('Reports.payrollentry');
Route::post('Reports/PayrollEntry/Step2','ReportsController@PayrollEntryStep1');
Route::post('Reports/PayrollEntry','ReportsController@PayrollEntryStep2');
Route::get('Reports/PayrollEntry/Show/{id}','ReportsController@payrollentryShow');
//WithhholdingTax
Route::get('Reports/WittholdingTax/Step1','ReportsController@wittholdingtax')->name('Reports.wittholdingtax');
Route::post('Reports/WittholdingTax/Step2','ReportsController@wittholdingtaxStep1');
Route::post('Reports/WittholdingTax','ReportsController@wittholdingtaxStep2');
Route::get('Reports/WittholdingTax/Show/{id}','ReportsController@wittholdingtaxShow');

//EXCEL

//MR
Route::get('ExportReportswt/{id}','ExportReportsController@wt')->name('ExportReports.wt');
//PE
Route::get('ExportReportspe/{id}','ExportReportsController@pe')->name('ExportReports.pe');
//WT
Route::get('ExportReportspayroll/{id}','ExportReportsController@payroll')->name('ExportReports.payroll');

});


//------------------------------------ADMIN ONLY -------------------------------------------------//
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'],function(){

 Route::get('thirteenmonthpay','MonthPayController@index');
    Route::post('thirteenmonthpay','MonthPayController@filter');
    Route::post('thirteenmonthpay/generate','MonthPayController@generate');
    Route::delete('/thirteenmonthpay/delete/{id}','MonthPayController@destroy');


     //MasterFile Admin
    route::resource('masterfile','MasterFileReportsController');

        //NAS Payslip Admin 
        route::resource('NASPayslip','AdminPayslipNASController');

         //NAS Payslip Admin 
         route::resource('FSPayslip','AdminPayslipFSController');


    //Generate Payroll Reports

    Route::resource('PayrollReports','AdminPayrollReportsController');

//------------------------------------------
    //PAYSLIP APPROVAL
    Route::resource('PayslipApproval','PayslipApprovalController');
    Route::get('ApprovedPayslip/NFa/{id}','AdminApprovalsController@approvedNF');
    Route::get('ApprovedPayslip/NFp/{id}','AdminApprovalsController@pendingNF');
    Route::get('ApprovedPayslip/NFr/{id}','AdminApprovalsController@rejectedNF');

    //REPORTS APPROVAL
    Route::resource('ReportsApproval','ReportsApprovalController');
    Route::get('Reports/MonthlyApproval/Show/{id}','AdminApprovalsController@monthlyShow');
    Route::get('Reports/PayrollEntryApproval/Show/{id}','AdminApprovalsController@payrollentryShow');
    Route::get('Reports/WittholdingTaxApproval/Show/{id}','AdminApprovalsController@wittholdingtaxShow');

    Route::get('ApprovedPayroll/NFa/{id}','AdminApprovalsController@approvedReports');
    Route::get('ApprovedPayroll/NFp/{id}','AdminApprovalsController@pendingReports');
    Route::get('ApprovedPayroll/NFr/{id}','AdminApprovalsController@rejectedReports');

    //PAYROLL APPROVAL
    Route::resource('PayrollApproval','PayrollApprovalController');
    Route::get('a/NFa/{id}','AdminApprovalsController@approvedPayroll');
    Route::get('b/NFp/{id}','AdminApprovalsController@pendingPayroll');
    Route::get('c/NFr/{id}','AdminApprovalsController@rejectedPayroll');
    



});


//------------------------------------EMPLOYEES ONLY -------------------------------------------------//
Route::group(['middleware' => 'App\Http\Middleware\NonFacultyMiddlware'],function(){

Route::resource('profile','EndUsersController');
    
Route::resource('mypayslip','EndUsersPayslipsController');

Route::resource('mylogs','TimeLogsController');

});

Route::get('/passwordExpiration','Auth\PwdExpirationController@showPasswordExpirationForm');
Route::post('/passwordExpiration','Auth\PwdExpirationController@postPasswordExpiration')->name('passwordExpiration');

Route::get('/forcepassword','Auth\ForcePasswordController@form');
Route::post('/forcepassword','Auth\ForcePasswordController@postform')->name('forcepassword');

Route::get('/passwordresets','Auth\PasswordResetsController@form');
Route::post('/passwordresets','Auth\PasswordResetsController@postform')->name('passwordresets');

Route::get('ChangePassword/{id}','ChangePasswordController@form');
Route::patch('ChangePasswordComplete/{id}','ChangePasswordController@complete')->name('changepassword.user');


Route::get('HR/Employee','HRNFController@index');
Route::get('HR/Employee/Step1','HRNFController@step1');
Route::post('HR/Employee/Step2','HRNFController@step2');
Route::post('HR/Employee/Submit','HRNFController@submit');
Route::get('HR/Employee/Edit/{id}','HRNFController@edit');
Route::patch('HR/Employee/Update/{id}','HRNFController@update')->name('HRNF.update');

Route::resource('ES','EmployementStatusController');
Route::resource('CC','CostCenterController');














