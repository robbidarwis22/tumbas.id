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
    <div class="col-md-5">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/category') }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Category" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" placeholder="Enter Slug" name="slug">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control" placeholder="Enter Icon Font Awesome" name="icon">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Parent Category</label>
                    <select class="form-control" name="parent_id">
                      <option value="">Select</option>
                      @foreach($categorys as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    </div>
    <div class="col-md-7">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th width="250px">Category</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach($categorys as $category)
                    <tr>
                      <td width="40px">{{ $no++ }}</td>
                      <td>{{ $category->name }}
                        <ul>
                        @foreach($category->children as $subcategory)
                          <li class="table_list"> - {{ $subcategory->name }} </li>
                        @endforeach
                        </ul>
                      </td>
                      <td>
                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                        <a href="{{url('admin/category/'.$category->id.'/edit') }}" class="btn btn-primary btn-xs">Edit</a>
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <input type="submit" name="" value="Delete" class="btn btn-danger btn-xs">
                        </form>
                        <ul>
                        @foreach($category->children as $subcategory)
                        <form action="{{ route('category.destroy',$subcategory->id) }}" method="POST">
                          <li class="table_list" style="margin-left: -43px"> <a href="{{url('admin/category/'.$subcategory->id.'/edit') }}" class="btn btn-primary btn-xs">Edit</a> 
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }} 
                              <input type="submit" name="" value="Delete" class="btn btn-danger btn-xs">
                            </form>
                          </li>
                        @endforeach
                        </ul>
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