@extends('homepage.index')
@section('header')
    <title> - Tumbas.id - Jual Gadget dan Komputer</title>
@endsection
@section('slide')

@endsection
@section('contents')
<div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>{{ $products->name }}</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li><a href="shop-category.html">Ladies</a>
                            </li>
                            <li><a href="shop-category.html">Tops</a>
                            </li>
                            <li>White Blouse Armani</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
<div id="content">
            <div class="container">

                <div class="row">

                    <!-- *** LEFT COLUMN ***
			_________________________________________________________ -->

                    <div class="col-sm-9">

                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div>
                                    <img src="{{ url($products->photo) }}" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box">

                                    <form>
                                        
                                        <p class="price">Rp. {{ number_format($products->price) }}</p>
                                        <br>
                                        <div class="sizes">

                                            <select class="form-control">
                                            <?php
                                            for($i=1; $i <= $products->stock; $i++){
                                                echo '<option value="small">'.$i.'</option>';
                                            }
                                            ?>
                                            </select>
                                            <br>
                                        </div>
                                        <br><br>
                                        
                                        <p class="text-center">
                                        @if(Auth::user())
                                            <a href="{{ url('cart/'.$products->id) }}" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                            </button>
                                        @else
                                        <small>Login dahulu untuk melakukan transaksi</small>
                                        </p>
                                        @endif
                                    </form>
                                </div>

                                <div class="row" id="thumbs">
                                    <div class="col-xs-4">
                                        <a href="img/detailbig1.jpg" class="thumb">
                                            <img src="img/detailsquare.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="img/detailbig2.jpg" class="thumb">
                                            <img src="img/detailsquare2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="img/detailbig3.jpg" class="thumb">
                                            <img src="img/detailsquare3.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="box" id="details">
                          {!! $products->description !!}
                        </div>


                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			_________________________________________________________ -->

                    <div class="col-sm-3">

                        <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                            </div>

                            <div class="panel-body">
                            @foreach($category as $cat)
                                <ul class="nav nav-pills nav-stacked category-menu">
                                    <li class="active">
                                        <a href="{{ url('/category/'.$cat->slug) }}">{{ $cat->name }}<span class="badge pull-right">{{ count($cat->children) }}</span></a>
                                        <ul>
                                        @foreach($cat->children as $sub)
                                            <li><a href="{{ url('/category/'.$sub->slug) }}">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endforeach
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Brands</h3>
                                <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                            </div>

                            <div class="panel-body">

                                <form>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Armani (10)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Versace (12)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Carlo Bruni (15)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Jack Honey (14)
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                                </form>

                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title clearfix">Colours</h3>
                                <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                            </div>

                            <div class="panel-body">

                                <form>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour white"></span> White (14)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour green"></span> Green (20)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour red"></span> Red (10)
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                                </form>

                            </div>
                        </div>

                        <!-- *** MENUS AND FILTERS END *** -->

                        <div class="banner">
                            <a href="shop-category.html">
                                <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                            </a>
                        </div>
                        <!-- /.banner -->

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** RIGHT COLUMN END *** -->

                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection

@section('footer')
@endsection
@show