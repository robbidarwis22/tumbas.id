@extends('admin.layout.master')
	@section('header')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
                <h3 class="card-title">Detail Transaction</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> Detail Transaksi
                    <small class="float-right">Code: {{ $transaction->code }}</small>
                </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-md-6">
                <div class="col-sm-3 invoice-col">
                <b>Penerima</b>
                </div>
                <div class="col-sm-9 invoice-col">
                {{ $transaction->name }}(<strong>{{ $transaction->user->name }})</strong><br>
                {{ $transaction->address }} 
                </div>
                <div class="col-sm-3 invoice-col">
                <b>Pengirim</b>
                </div>
                <div class="col-sm-9 invoice-col">
                {{ $transaction->product->user->name }} <br>
                {{ $transaction->product->user->address }} <br>
                </div>
                </div>
                <div class="col-md-6">
                <div class="col-sm-3 invoice-col">
                <b>Ekspedisi</b>
                </div>
                <div class="col-sm-9 invoice-col">
                    Code - {{ $transaction->ekspedisi['code'] }} <br>
                    Name - {{ $transaction->ekspedisi['name'] }} <br>
                    Time - {{ $transaction->ekspedisi['etd'] }} day <br>
                </div>
                <div class="col-sm-3 invoice-col">
                <b>Status</b>
                </div>
                <div class="col-sm-9 invoice-col">
                    @if($transaction->status == 0)
                        Belum Lunas
                    @else
                        Lunas
                    @endif
                </div>
                </div>
            </div>
            <br>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $gt = 1;
                    @endphp
                    @foreach($transactiondetail as $td)
                    <tr>
                        <td>{{ $td->qty }}</td>
                        <td>{{ $td->product->name }}</td>
                        <td>{{ number_format($td->product->price,2,",",".") }}</td>
                        <td>{{ number_format($td->subtotal,2,",",".") }}</td>
                    </tr>
                    <?php $gt = $gt + $td->subtotal; ?>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                <p class="lead">Rekening Bank:</p>
                <!-- <img src="{{ asset('static/dist/img/credit/visa.png') }}" alt="Visa">
                <img src="{{ asset('static/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                <img src="{{ asset('static/dist/img/credit/american-express.png') }}" alt="American Express">
                <img src="{{ asset('static/dist/img/credit/paypal2.png') }}" alt="Paypal"> -->

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Halaman ini merupakan halaman transaksi, pengiriman pembayaran di lakukan melalui rekening Bank.
                </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ number_format($gt,2,",",".") }}</td>
                    </tr>
                    <tr>
                        <th>Ongkir</th>
                        <td>{{ number_format($transaction->ekspedisi['value'],2,",",".") }}</td>
                    </tr>
                    <tr>
                        <th>Grand Total:</th>
                        <td><?php echo number_format($gt + $transaction->ekspedisi['value'],2,",","."); ?></td>
                    </tr>
                    </table>
                </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                </button>
                <a class="btn btn-primary float-right" style="margin-right: 5px;" href="{{ url('admin/transaction/'.$transaction->code.'/detail/data/cetak') }}">  <i class="fas fa-download"></i> Generate PDF </a>
                </div>
            </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
 


      
	@endsection
	@section('footer')
	<!-- DataTables -->
 
	@endsection
@show