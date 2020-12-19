@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-file"></i> Employee Details</li>
    </ol>
</nav>
<hr>

<ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item">
          <a class="nav-link active" id="NAS-tab" data-toggle="tab" href="#NAS" role="tab" aria-controls="home" aria-selected="true">Non Academic Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#NF" role="tab" aria-controls="profile" aria-selected="false">Faculty</a>
        </li>
      </ul>
<!-----------------------------------------------------------------NON FACULTY-------------------------------------->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="NAS" role="tabpanel" aria-labelledby="NAS-tab">
                <h3 class="pt-2 text-secondary text-center">
                        <i class="fas fa-users text-primary"></i> Non Academic Staff
                    </h3>
                    <hr>
                
                <div class="container-fluid">
                    <div class="table-responsive">
                
                
                        
                
                        <table class="table table-sm table-hover table-bordered text-center" id="NFMasterFile" class="display">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Daily Rate</th>
                                        <th>per Hour</th>
                                        <th>Mins</th>
                                        <th>Absence</th>
                                        <th>Salary</th>
                                        <th>Basic</th>
                                        <th>Emolument</th>
                                        <th>Total Basic Salary</th>
                                        <th>Less: Absence/Lates</th>
                                        <th>Date Updated</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                            @foreach ($reports as $reportView)
                                            <tr>
                                        <td>{{$reportView->emp_id}}</td>
                                        <td>{{$reportView->emp_firstname}} {{$reportView->emp_lastname}}</td>
                                        <td>{{$reportView->daily_rate}}</td>
                                        <td>{{$reportView->rate_per_hour}}</td>
                                        <td>{{$reportView->mins}}</td>
                                        <td>{{$reportView->absence}}</td>
                                        <td>{{$reportView->salary}}</td>
                                        <td>{{$reportView->basic}}</td>
                                        <td>{{$reportView->emolument}}</td>
                                        <td>{{$reportView->total_basic_salary}}</td>
                                        <td>{{$reportView->total_absence}}</td>
                                        <td>{{$reportView->updated_at}}</td>
                                    </tr>
                                            @endforeach
                                  
                                    </tbody>
                
                                    <tfoot>
                                            <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="bg-success text-white">{{$salary}}</th>
                                            <th class="bg-success text-white">{{$basic}}</th>
                                            <th class="bg-success text-white">{{$emolument}}</th>
                                            <th class="bg-success text-white">{{$total_basic_salary}}</th>
                                            <th class="bg-success text-white">{{$total_absence}}</th>
                                            <th></th>
                                            </tr>
                                            </tfoot>
                        </table>
                    </div>
                </div>
                
        </div>

        <!-----------------------------------------------------------------FACULTY-------------------------------------->
        <div class="tab-pane fade" id="NF" role="tabpanel" aria-labelledby="NF-tab"><h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-users text-primary"></i> Faculty
            </h3>
            <hr>
        
        <div class="container-fluid mb-5">
            <div class="table-responsive">
        
        
                
        
                <table class="table table-sm table-hover table-bordered text-center" id="FMasterFile" class="display">
                        <thead class="thead-dark">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Load Units</th>
                                <th>Laboratory Units</th>
                                <th>Laboratory Hours</th>
                                <th>Total Hours</th>
                                <th>Rate Per Hour</th>
                                <th>Rate Per Hour<small> (old)</small></th>
                                <th>mins</th>
                                <th>Daily Rate</th>
                                <th>Absence</th>
                                <th>Salary</th>
                                <th>Basic</th>
                                <th>Emolument</th>
                                <th>Overload</th>
                                <th>Total Basic Salary</th>
                                <th>Less: Absence/Lates</th>
                                <th>Date Updated</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($faculty as $facultyView)
                                    <tr>
                                    <td>{{$facultyView->emp_id}}</td>
                                    <td>{{$facultyView->emp_firstname}} {{$facultyView->emp_lastname}}</td>
                                    <td>{{$facultyView->load_units}}</td>
                                    <td>{{$facultyView->laboratory_units}}</td>
                                    <td>{{$facultyView->laboratory_hours}}</td>
                                    <td>{{$facultyView->total_hours}}</td>
                                    <td>{{$facultyView->rate_per_hour}}</td>
                                    <td>{{$facultyView->rate_per_hour_old}}</td>
                                    <td>{{$facultyView->mins}}</td>
                                    <td>{{$facultyView->daily_rate}}</td>
                                    <td>{{$facultyView->absence}}</td>
                                    <td>{{$facultyView->salary}}</td>
                                    <td>{{$facultyView->basic}}</td>
                                    <td>{{$facultyView->emolument}}</td>
                                    <td>{{$facultyView->overload}}</td>
                                    <td>{{$facultyView->total_basic_salary}}</td>
                                    <td>{{$facultyView->total_absence}}</td>
                                    <td>{{$facultyView->updated_at}}</td>
                                    </tr>
                                @endforeach
                     
                          
                            </tbody>
        
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                <th class="bg-success text-white">{{$Faculty_salary}}</th>
                                <th class="bg-success text-white">{{$Faculty_basic}}</th>
                                <th class="bg-success text-white">{{$Faculty_emolument}}</th>
                                <th class="bg-success text-white">{{$Faculty_overload}}</th>
                                <th class="bg-success text-white">{{$Faculty_total_basic_salary}}</th>
                                <th class="bg-success text-white">{{$Faculty_total_absence}}</th>
                                    <th></th>
                                </tr>
                                    </tfoot>
                </table>
            </div>
        </div></div>
      </div>





@endsection
