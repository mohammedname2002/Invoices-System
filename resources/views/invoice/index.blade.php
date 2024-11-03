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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @livewire('invoice-search') <!-- Include the Livewire component -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div>

@endsection

@section('scripts')

    لوحة التحكم


@endsection

