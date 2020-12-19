<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use DB;
use App\Payslip;
use Illuminate\Support\Facades\Crypt;

class nfGeneratePayslipController extends Controller
{
    public function print($id){
        
        $type = [
            'Non-Faculty','Faculty'
        ];

        $payslip = Payslip::where('date','=',Crypt::decrypt($id))
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->get();


        //dd($payslip);

        $dompdf = new DOMPDF();
        $dompdf->load_html('...');
        $dompdf->render();
        $dompdf->set_base_path("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('printables.nfPayslip',compact('payslip','id'));
        return $pdf->stream('printables.nfPayslip');
    }

}
