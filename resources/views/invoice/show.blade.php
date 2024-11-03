@extends('layouts.master')
@section('title')


@endsection
@section('css')


  <style>
    .table-bordered>:not(caption)>*>* {
        border-width: 1px 1px !important;
    }

      .aaa:not(caption){
         background-color: #1f628e !important;
          color: white !important;
           font-weight: normal !important;
      }
</style>
@endsection
@section('title_page')

@endsection
@section('title_page2')



@endsection
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Extra Pages</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoice</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <div class="logo logo-dark" style="display: flex">
                                    <span class="logo-lg">
                                        <img src="{{ asset('assets/images/logo-light.jpg') }}" alt="" height="50">
                                    </span>
                                </div>

                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="{{ asset('assets/images/logo-light.jpg') }}"alt="" height="50">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <img  style="flex: end" src="{{ asset('assets/images/oge.png') }}" alt="" height="70">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, {{$invoiceName->company->name  }}</b></p>
                                <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                    promises to provide high quality products for you as well as outstanding
                                    customer service for every transaction. </p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p><strong>Order Date : </strong> <span class="float-end">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoiceName->date_of_create)->format('Y-m-d') }}</span></p>
                                @if($invoiceName->status == 'paid')
                                <p><strong>Order Status : </strong> <span class="float-end"><span class="badge bg-success">{{ $invoiceName->status }}</span></span></p>
                                @else
                                <p><strong>Order Status : </strong> <span class="float-end"><span class="badge bg-danger">{{ $invoiceName->status }}</span></span></p>
                                @endif
                                <p><strong>Order No. : </strong> <span class="float-end">{{ $invoiceName->invoice_number }} </span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">


                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-9">
                            <div class="table table-bordered border-black mb-0 ">
                                <table class="table table-bordered border-black mb-0">
                                    <thead class="table table-bordered border-black mb-0" >
                                    <tr><th style="">#</th>
                                        <th class="aaa">Item</th>
                                        <th class="aaa" >Price</th>
                                        <th  class="aaa">Price With Vat</th>
                                    </tr></thead>
                                    <tbody >

                                        @foreach ($products as $product )
                                    <tr>
                                        <td>{{ $loop->index +1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->getPriceWithVat() }}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Notes:</h6>

                                <small class="text-muted">

                                </small>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p><b>Total-With Vat:</b> <span class="float-end">{{ $totalWithVat }}</span></p>
                                <p><b>Discount ({{ $invoiceName->company->discount }}%):</b> <span class="float-end"> {{ $totalWithVatAndDiscount }} </span></p>
                                <p><b   style="font-size: 15px">Total:</b> <span class="float-end">{{ $totalWithVatAndDiscount }}</span></p>

                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                        </div>
                    </div>
                    <div class="text-end d-print-none">
                        <button onclick="downloadPDF()" class="btn btn-primary waves-effect waves-light">
                            <i class="mdi mdi-download me-1"></i> Download PDF
                        </button>
                    </div>

                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->


@endsection
@section('scripts')
@endsection

