<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use DB;
use App\Payslip;
use Illuminate\Support\Facades\Crypt;

class PayslipPDFController extends Controller
{

    
    public function downloadPDF($id) {

        $id = Crypt::decrypt($id);
        

        $endUser = auth()->user()->emp_id;

        //$endUser = Crypt::decrypt($endUser);

        $payslip = Payslip::where('payslip','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->where('emp_id','=',$endUser)
        ->where('admin_approval','=','Approved')
        ->get();


        //dd($payslip);

        $dompdf = new DOMPDF();
        $dompdf->load_html('...');
        $dompdf->render();
        $dompdf->set_base_path("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('printables.mypayslip',compact('payslip','id'));
        return $pdf->stream('printables.mypayslip');


       
}
}
