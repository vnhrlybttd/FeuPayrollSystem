<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\ThirteenMonthPay;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class MonthPayController extends Controller
{
    public function index (Request $request){
        
        $type = ['Faculty','Non-Faculty'];

        $employeePayslip = DB::Table('users')
        ->whereIn('type',$type)
        ->get();

        $monthTable = DB::Table('thirteenmonthpay')
        ->join('users','thirteenmonthpay.employee_id','=','users.emp_id')
        ->get();

        

        //dd($employeePayslip);

        return view("thirteenmonthpay.index",compact('employeePayslip','monthTable'));
    }
    public function filter(Request $request){
        
        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
            'emp_id' => 'required',
        ]);

        $date_from = $request->get('date_from');
        $date_to = $request->get('date_to');
        $emp_id = $request->get('emp_id');
        
        $type = ['Faculty','Non-Faculty'];

        $netbasic = DB::Table('payslip')
        ->where('employee_id','=',$emp_id)
        ->whereDate('date', '>=', $date_from)
        ->whereDate('date', '<=', $date_to)
        ->sum('p_net_basic');

        $teenmonth = DB::Table('payslip')
        ->where('employee_id','=',$emp_id)
        ->sum('p_thirteen_month_pay');
        
        $emp_type = DB::Table('users')
        ->where('emp_id','=',$emp_id)
        ->select('type')
        ->first()
        ->type;

        //dd($date_from);
        

        ThirteenMonthPay::create(['type'=>$emp_type,'employee_id'=>$emp_id,'net_basic'=>$netbasic,'thirteenmonthpay'=>$teenmonth,'start_date'=>$date_from,'end_date'=>$date_to]);
        
        /*
        $type = ['Faculty','Non-Faculty'];

        $queryTable = DB::Table('payslip')
        ->selectRaw('sum(p_thirteen_month_pay) as sum')

       
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->whereDate('date', '>=', $date_from)
        ->whereDate('date', '<=', $date_to)
        ->get();
 
        */

       

        

        
        Alert::success('Success', 'Generate Successfully!');
        return redirect()->back();


       

        //return redirect()->back('thirteenmonthpay.show',compact('queryTable'));
        
    }

    public function destroy($id){

        ThirteenMonthPay::where('thirteenmonthpay_id','=',$id)->delete();

        Alert::success('Deleted', 'Deleted Successfully!');
        
        return redirect()->back();

    }

    public function generate(Request $request){

        
        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
            'type' => 'required|exists:thirteenmonthpay',
        ]);

        $date_from = $request->get('date_from');
        $date_to = $request->get('date_to');
        $types = $request->get('type');
        
        
        $emp_type = DB::Table('thirteenmonthpay')
        //->where('type','=',$types)
        ->whereDate('start_date', '>=', $date_from)
        ->whereDate('end_date', '<=', $date_to)
        ->first()
        ->type;
        
        
    
        
    

        $generateTable = DB::Table('thirteenmonthpay')
        ->join('hr_employee','thirteenmonthpay.employee_id','=','hr_employee.emp_pin')
        ->where('type','=',$types)
        ->whereDate('start_date', '>=', $date_from)
        ->whereDate('end_date', '<=', $date_to)
        ->get();

      



        //dd($name);

        //Net Basic
        $net_basic = DB::Table('thirteenmonthpay')
        ->where('type','=',$types)
        ->whereDate('start_date', '>=', $date_from)
        ->whereDate('end_date', '<=', $date_to)
        ->sum('net_basic');

        //Thirteen Month Pay
        $thirteenmonthpay = DB::Table('thirteenmonthpay')
        ->where('type','=',$types)
        ->whereDate('start_date', '>=', $date_from)
        ->whereDate('end_date', '<=', $date_to)
        ->sum('thirteenmonthpay');

        //dd($emp_type);

        $pdf = PDF::loadView('thirteenmonthpay.pdf', compact('date_from','date_to','generateTable','net_basic','thirteenmonthpay','emp_type'));
        return $pdf->stream('thirteenmonthpay.pdf');

    }

    
}
