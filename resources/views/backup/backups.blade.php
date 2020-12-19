@extends('layouts.sidemenu')

@section('content')
    <div class="container">
       

        
<h2 style="color:#008349;"> Database</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-database"></i> Backup</li>
    </ol>
</nav>
<hr>

            <div class="row ml-0">
            <a href="{{ url('backup/create') }}" class="btn btn-primary text-white">
                <i class="fas fa-plus" aria-hidden="true"></i> Create Backup
            </a>

            <div class="row ml-5">
                <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{route('Backup.restore')}}">
                @csrf
                <input type="file" name="fileToUpload" id="fileToUpload" required>
                <button type="submit" class="btn btn-success">Restore</button>
            </form>
        </div>
        </div>
            
        </div>

            <div class="mt-2">
            @include('backup.backups-table')
            </div>
        
    </div>

    
@endsection