



@if (count($backups))


    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>File</th>
                <th>Size</th>
                <th>Date</th>
                <th>Actions</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach($backups as $backup)
                <tr>
        
                    <td>{{ $backup['file_name'] }}</td>
                    <td>{{ $backup['file_size'] }}</td>
                    <td>
                        {{ date('M. d, Y', strtotime($backup['last_modified'])) }}
                    </td>
                    
                    <td class="text-center">
                        <a class="btn btn-primary" href="{{ url('backup/download/'.$backup['file_name']) }}">
                            <i class="fas fa-download"></i> Download</a>
                            <!--
                        <a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ url('backup/delete/'.$backup['file_name']) }}" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash-alt"></i>
                            Delete
                        </a>

                    -->

                    </td>
                
                </tr>
            @endforeach
        </tbody>
    </table>




@else
    <div class="text-center py-5">
        <h1 class="text-muted">No existing backups</h1>
    </div>
@endif