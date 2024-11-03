@extends('layouts.master')
@section('title')

@endsection
@section('css')



@endsection
@section('title_page')

    الرئيسية
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Store Product </li>
                    </ol>
                </div>
                <h4 class="page-title">Store Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    @if (session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="mdi mdi-bullseye-arrow me-2"></i>
          {{session()->get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Form row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create Invoice </h4>
                    <p class="text-muted font-13">.</p>

                    <form action="{{ route('invoice.store') }}" method="POST" >
                        @csrf


                        <div class="row">
                        <div class="col-lg-6">
                            <label for="example-text-input" class="form-label" >Company Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="type" name="company_id">
                                    <option value=" ">Select The Company</option>

                                    @foreach ( $companies as $company)

                                    <option value=" {{ $company->id }} ">{{ $company->name }}</option>
                                    @endforeach

                                    @if ($errors->has('company->id'))
                                    <div class="company->id">
                                        {{$errors->first("company->id")}}
                                    </div>
                                    @endif
                                </select>
                                @error('company_id')
                               <span class="text-danger">{{ $message }}</span>
                                 @enderror

                                </div>
                        </div>


                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="from" class="form-label">From Date</label>
                            <input type="date" name="from" class="form-control" id="from" required>
                            @error('from')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="to" class="form-label">To Date</label>
                            <input type="date" name="to" class="form-control" id="to" required>
                            @error('to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="example-text-input" class="form-label" >Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="type" name="status">

                                    <option value="paid">Paid</option>
                                    <option value="unpaid">UnPaid</option>
                                </select>
                                @error('status')
                               <span class="text-danger">{{ $message }}</span>
                                 @enderror

                                </div>
                        </div>


                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    <!-- RADIOS -->



</div>

@endsection
@section('scripts')

    لوحة التحكم


@endsection

