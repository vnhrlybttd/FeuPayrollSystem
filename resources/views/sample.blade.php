<!--?php use Carbon\Carbon;?-->
<html>

<head></head>

<body>
    @extends('layouts.admin') @section('content')
    <style>
        .paginate {
            margin: 0 auto;
            width: 100px;
        }

        #scroll {
            overflow-x: scroll;
        }

        br {
            display: block;
            /* makes it have a width */
            content: "";
            /* clears default height */
            margin-top: 0;
        }

        table {
            width: 250px;
            table-layout: fixed;
        }

        table tr {
            height: 1em;
        }

        td {
            overflow: hidden;
            white-space: nowrap;
        }

    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-size:36px;">Audit Trail</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Audit Trail</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div> @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div> @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="usertable">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Login</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-sm-12">
            <div class="paginate">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered" id="usertable">
                <thead class="thead-dark">
                    <tr>
                        <th>Event</th>
                        <th>User Type</th>
                        <th>User Name</th>
                        <th>New Value</th>
                        <th>Old Value</th>
                        <th>Log Date</th>
                    </tr>
                </thead> @foreach($audits as $aud)
                <tbody>
                    <tr>
                        <td>{{$aud-&gt;event}}</td>
                        <td id="scroll">
                            <li> @foreach(json_decode($aud-&gt;new_values) as $colName =&gt; $value)
                                @endforeach </li>
                        </td> @if($aud-&gt;old_values=='[]')
                        <td id="scroll">No Changes</td> @else
                        <td id="scroll">
                            <li> @foreach(json_decode($aud-&gt;old_values) as $colName =&gt; $value)
                                @endforeach </li>
                        </td> @endif

                    </tr> @endforeach
                </tbody>
            </table>
        </div> @endsection
    </div>
</body>

</html>
