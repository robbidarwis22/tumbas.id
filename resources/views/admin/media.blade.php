@extends('admin.layout.master')
	@section('header')
	
	@endsection
	@section('body')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
                <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;">
                  
                </iframe>
       </div>
      </div>
    </div>
      
	@endsection
	@section('footer')
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script>
   var route_prefix = "/filemanager";
  </script>

  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
  </script>
  <script>
    $(document).ready(function(){

      // Define function to open filemanager window
      var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        window.open(route_prefix + '?type=' + options.type || 'image', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
      };

    });
  </script>
	@endsection
@show