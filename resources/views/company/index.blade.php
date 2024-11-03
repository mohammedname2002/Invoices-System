@extends('layouts.master')
@section('title')

    الرئيسسية

@endsection
@section('css')



@endsection
@section('title_page')

    الرئيسية
@endsection
@section('title_page2')

    لوحة التحكم


@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Companies List</h4>
                    <livewire:company-search />
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script src="{{ asset('assets/js/sweetalert.js') }}"></script>

@endsection

