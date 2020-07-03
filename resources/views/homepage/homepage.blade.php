@extends('homepage.index')
@section('header')
    <title>Tumbas.id - Jual Gadget dan Komputer</title>
@endsection
@section('slide')
    @include('homepage.layout.slider')
@endsection
@section('contents')

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

                <div class="col-sm-12">


                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
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