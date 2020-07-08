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

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach(Cart::content() as $row) :?>
                                            <form action="{{ url('cart/update') }}" method="POST">
                                            {{ @csrf_field() }}
                                            <tr>
                                                <td><a href="#"><?php echo $row->name; ?></a>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="rowId" value="{{ $row->rowId }}">
                                                    <input type="number" value="<?php echo $row->qty; ?>" name="qty">
                                                </td>
                                                <td><?php echo $row->price; ?></td>
                                                <td><?php echo $row->total; ?></td>
                                                <td>
                                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-refresh"></i></button>
                                                <a href="{{ url('cart/delete/'.$row->rowId) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            
                                            </form>
                                            <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3">Total</th>
                                                <th colspan="2"><?php echo Cart::total(); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="shop-category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>

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
                                            <th>$446.00</th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                            <th>$10.00</th>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>$456.00</th>
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
@endsection
@show