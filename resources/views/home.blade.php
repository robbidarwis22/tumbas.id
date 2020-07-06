<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Silahkan Klik <a href="{{ url('verifikasi/register/'.$remember_token) }}">Klik</a></p>
                </div>
            </div>
        </div>
    </div>
</div>    
</body>
</html>