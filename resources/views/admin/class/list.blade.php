@extends('admin.layout')
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Academic Year</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Classes List</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                        @include('message')
                          <h3 class="card-title">Classes</h3>
                      </div>

                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th class="text-center">ID</th>
                                      <th class="text-center">Name</th>
                                      <th class="text-center">Created Time</th>
                                      <th class="text-center" colspan="2">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @if ($data->isNotEmpty())
                                    @foreach ($data as $item)
                                        

                                  <tr>
                                      <td class="text-center">{{ $item->id }}</td>
                                      <td class="text-center">{{ $item->name }}</td>
                                      <td class="text-center">{{ Carbon\Carbon::parse($item->created_at)->format('d M,Y') }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{ route('class.edit',$item->id) }}">Edit</a> |
                                        
                                        <form action="{{ route('class.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete?');">
                                            @csrf
                                            @method('DELETE') 
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> 
                                    </td>

                                    </tr>

                                    @endforeach
                                    @endif
                              </tbody>
                          </table>
                      </div>

                  </div>

              </div>

          </div>

      </div>

  </section>

</div>

@endsection

@section('customJs')
<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>

{{-- <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script> --}}
@endsection