@extends('layouts.master')
@section('title')

@endsection
@section('css')

@endsection
@section('title_page')
    تعديل الفاتورة
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
                        <li class="breadcrumb-item active">Edit Invoice</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Invoice</h4>
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
                    <h4 class="header-title">Edit Invoice</h4>
                    <p class="text-muted font-13">Edit the details of the invoice below.</p>

                    <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="example-text-input" class="form-label">Company Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="type" name="company_id">
                                        <option value="">Select The Company</option>

                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $invoice->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                        @endforeach

                                        @if ($errors->has('company_id'))
                                        <div class="text-danger">
                                            {{$errors->first('company_id')}}
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
                            <input class="form-control" type="date" id="from" name="from" value="{{ old('from', date('Y-m-d', strtotime($invoice->from))) }}" >
                            @error('from')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="to" class="form-label">To Date</label>
                                    <input class="form-control" type="date" id="date" name="to" value="{{ old('to', date('Y-m-d', strtotime($invoice->to))) }}" >
                            @error('to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="example-text-input" class="form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="type" name="status">
                                    <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>

@endsection
@section('scripts')

@endsection
