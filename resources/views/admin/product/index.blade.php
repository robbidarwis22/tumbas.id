@extends('admin.layout.master')
	@section('header')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <style type="text/css">
    .table_list {
      list-style: none;
      padding: 3px;
      margin-left: -30px
    }
  </style>
	@endsection
	@section('body')
    <div class="row">
    <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Product</th>
                    <th>Stock</th>
                    <th>User</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                      @foreach($product as $item)
                      <tr>
                          <td>{{ $no ++ }}</td>
                          <td><img src="{{ url($item->photo) }}" width="50px"></td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->stock }}</td>
                          <td>{{ $item->user->name }}</td>
                          <td>
                              <form action="{{ route('product.destroy',$item->id) }}" method="POST">
                            <a href="{{ url('admin/product/'.$item->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            
                              {{ csrf_field() }}
                              {{ method_field("DELETE") }}
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              
                            </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
    </div>
      
	@endsection
	@section('footer')
	<!-- DataTables -->
  <script src="{{ asset('static/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('static/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('static/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('static/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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
</script>
	@endsection
@show