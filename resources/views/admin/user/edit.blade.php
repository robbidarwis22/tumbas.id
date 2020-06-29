@extends('admin.layout.master')
	@section('header')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link href="{{ asset('css/apps.css') }}" rel="stylesheet">
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
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
        
                    <form class="form-horizontal" method="POST" action="{{ url('admin/user/update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <!-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> -->
                                <textarea class="form-control" name="address" required autofocus>{{ $user->address }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <!-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> -->
                                <select name="gender" class="form-control">
                                @if($user->gender == "L")
                                    <option value="L" selected="selected">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                @else
                                    <option value="L">Laki-Laki</option>
                                    <option value="P" selected="selected">Perempuan</option>
                                @endif
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">Birthday</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $user->birthday }}" required autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <!-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> -->
                                <select name="role" class="form-control">
                                @if($user->role == "admin")
                                    <option value="admin" selected="selected">Admin</option>
                                    <option value="member">Member</option>
                                    <option value="supplier">Supplier</option>
                                @elseif($user->role == "supplier")
                                    <option value="admin">Admin</option>
                                    <option value="member">Member</option>
                                    <option value="supplier" selected="selected">Supplier</option>
                                @else
                                    <option value="admin">Admin</option>
                                    <option value="member" selected="selected">Member</option>
                                    <option value="supplier">Supplier</option>
                                @endif
                                    
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
    </div>

      
	@endsection
	@section('footer')
	<!-- DataTables -->
  <script src="{{ asset('static/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('static/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('static/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('static/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- page script -->
	@endsection
@show