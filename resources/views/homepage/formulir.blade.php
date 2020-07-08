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
                    <div class="col-md-6">
                        <h1>Shopping cart</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li>Shopping cart</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted lead">You currently have {{ Cart::count() }} item(s) in your cart.</p>
                    </div>

                    <div class="col-md-9 clearfix" id="basket">

                        <div class="box">

                        <div class="content">
                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">Name(Member)</label>
                                            <input type="text" class="form-control" id="street" name="portal_code" value="{{ Auth::user()->name }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Email(Member)</label>
                                            <input type="text" class="form-control" id="street" name="portal_code" value="{{ Auth::user()->email }}" readonly="">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstname">Nama</label>
                                                <input type="text" name="name" class="form-control" id="firstname" placeholder="Masukkan Nama Penerima">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname">City</label>
                                                <select class="form-control" onchange="check()">
                                                    @php
                                                        $city = city();
                                                        $city = json_decode($city,true);
                                                    @endphp
                                                    @foreach($city['rajaongkir']['results'] as $citys)
                                                        <option value="{{ $citys['city_id'] }}">{{ $citys['city_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="company">Kota/Alamat</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                            <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="city">Ekspedisi</label>
                                                <select class="form-control">
                                                    <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                                                    <option value="pos">POS Indonesia (POS)</option>
                                                    <option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="zip">Kode POS</label>
                                                <input type="number" class="form-control" id="street" name="portal_code">
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <!-- /.row -->
                                    
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Order subtotal</td>
                                            <th><?php echo Cart::total(); ?></th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th><?php echo Cart::total(); ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->


@endsection

@section('footer')
<script type="text/javascript">
    function check(){
        alert('hai');
    }
</script>
@endsection
@show