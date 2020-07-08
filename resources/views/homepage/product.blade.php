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
                <p class="text-muted lead text-center">Jual Gadget dan Komputer</p>

                <div class="row products">
                    @foreach($products as $product)
                    <div class="col-md-3 col-sm-4">
                        <div class="product">
                            <div class="image">
                                <a href="{{ url('product/detail/'.$product->slug) }}">
                                    <img src="{{ url($product->photo) }}" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <!-- /.image -->
                            <div class="text">
                                <h3><a href="shop-detail.html">{{ $product->name }}</a></h3>
                                <p class="price">Rp. {{ number_format($product->price) }}</p>
                                
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    @endforeach
                    <!-- /.col-md-4 -->
                </div>
                <!-- /.products -->

                    <div class="pages">
                        <div class="col-md-12">
                            <div style="text-align: center;">
                            {{ $products->links() }}
                            </div>
                        </div>
                    </div>

                <!-- /.col-sm-12 -->

            </div>
            <!-- /.container -->
        
</div>

@endsection

@section('footer')
@endsection
@show