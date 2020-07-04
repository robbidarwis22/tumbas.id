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
                        <h1>Our team</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li>Our team</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <section>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h2>Supplier</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    @foreach($user as $users)
                        <div class="col-md-2 col-sm-3">
                            <div class="team-member" data-animate="fadeInDown">
                                <div class="image">
                                    <a href="{{ url ('penjual/'.$users->id) }}">
                                        <img src="{{ url($users->photo) }}" alt="" class="img-responsive img-circle">
                                    </a>
                                </div>
                                <h3><a href="team-member.html">{{ $users->name }}</a></h3>
                                <p class="role">{{ date('d/m/y',strtotime($users->created_at)) }}</p>
                            </div>
                            <!-- /.team-member -->
                        </div>
                        @endforeach
                    </div>
                    <!-- /.row -->

                </section>

            </div>
            <!-- /.container -->

        </div>

@endsection

@section('footer')
@endsection
@show