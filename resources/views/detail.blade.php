@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Belanja</h1>
    </div>

    <div class="row">
        <div class="col-12">
          <div class="card">
           {{--  <div class="card-header">
              <h3 class="card-title">List of Billings: <b>{{ date('F Y', strtotime($current_month)) }}</b></h3>
            </div> --}}
           
            <!-- /.card-header -->
            <div class="card-body">
             
              <div class="row">
                  <div class="col-sm-6">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                @if(session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif

                    <!--alert success -->
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('status') }}</strong>
                    </div> 
                    @endif
                    <!--alert success -->
                    <!--validasi form-->
                      @if (count($errors)>0)
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                <li><strong>Data Process Failed !</strong></li>
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                      @endif
                    <!--end validasi form-->
                  </div> 
              </div>
            
              
              <div class="row mb-3">
                
              </div>
              
              <table id="tableBilling" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Asal</th>
                    <th>Action</th>
                    {{-- <th>Last Update</th> --}}
                  </tr>
                </thead>
                <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->origin }}</td>
                        <td><a href="#" class="btn btn-success btn-xs" title="View Detail">Buy Product</a></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

</div>
<!-- For Datatables -->
<script>
    $(document).ready(function() {
      var table = $("#tableBilling").DataTable({
        "responsive": true, 
        "lengthChange": true, 
        "autoWidth": true,
        //"dom": '<"top"fli>rt<"bottom"p><"clear">',
        //"pagingType": "first_last_numbers",
        "order": [[ 0, "asc" ],[ 1, "asc" ]],
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });
    });
  
    $("#datepicker").datepicker( {
      format: "yyyy-mm",
      startView: "months", 
      minViewMode: "months"
  });
  </script>
@endsection

