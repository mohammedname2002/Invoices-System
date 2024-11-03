@extends('layouts.master')
@section('title')

    الرئيسسية

@endsection
@section('css')



@endsection
@section('title_page')

@endsection
@section('title_page2')



@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Product List</h4>
                <livewire:product-search /> <!-- Include the ProductSearch component -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert.js') }}"></script>
<script>
function JSconfirm(event, productId) {
    event.preventDefault(); // Prevent immediate form submission

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: ["Cancel", "Yes, delete it!"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            // Submit the form if confirmed
            document.getElementById('deleteform' + productId).submit();
        }
    });
}

</script>
@endsection

