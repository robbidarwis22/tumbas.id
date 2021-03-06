@extends('homepage.index')
@section('header')
    <title>Tumbas.id - Jual Gadget dan Komputer</title>
@endsection
@section('slide')

@endsection
@section('contents')
<div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>All Product</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li>Product</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
<div id="content">
        <div class="container">
            <table class="table table-bordered">
                <tr><th width="200px">Username</th><td>{{ $user->username }}</td></tr>
                <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                <tr><th>Address</th><td>{{ $user->address }}</td></tr>
                <tr><th>Photo</th><td><img src="{{ url($user->photo) }}" width="70px"></td></tr>
                <tr><th>Tanggal Bergabung</th><td>{{ date('d/m/y',strtotime($user->created_at)) }}</td></tr>
            </table>
        </div>
            <div class="container">
                <p class="text-muted lead text-center">Jual Gadget dan Komputer</p>

                <div class="row products">
                    @foreach($products as $product)
                    <div class="col-md-3 col-sm-4">
                        <div class="product">
                            <div class="image">
                                <a href="shop-detail.html">
                                    <img src="{{ url($product->photo) }}" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <!-- /.image -->
                            <div class="text">
                                <h3><a href="shop-detail.html">{{ $product->name }}</a></h3>
                                <p class="price">Rp. {{ number_format($product->price) }}</p>
                                <p class="buttons">
                                    <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                    <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    @endforeach
                    <!-- /.col-md-4 -->
                </div>
                <!-- /.products -->

                <!-- /.col-sm-12 -->

            </div>
            <!-- /.container -->
        
</div>

@endsection

@section('footer')
@endsection
@show