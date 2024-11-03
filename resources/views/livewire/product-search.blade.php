<div>
    <input type="text" wire:model="searchTerm" placeholder="Search Products or Companies..." class="form-control mb-3">

    <div class="table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>VAT</th>
                    <th>Price with VAT</th>
                    <th>Price with VAT and Discount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                        <td>{{ $product->company->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->vat }} %</td>
                        <td>{{ $product->getPriceWithVat() }} </td>
                        <td>{{ $product->getPriceWithVatAndDiscount() }} $</td>
                        <td style="display: inline-block">
                            <div class="button-list" style="display: flex;">
                                <a href="{{ route('product.edit', $product->id) }}" title="Edit" class="btn btn-blue waves-effect waves-light">
                                    <div class="icon-item">
                                        <svg  style="color: white"   xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-dual"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        <span>edit</span>
                                    </div>                                  </a>
                                <form action="{{ route('product.delete', $product->id) }}" method="POST" id="deleteform{{ $product->id }}">
                                    @csrf
                                    <button type="button" onclick="JSconfirm(event, {{ $product->id }})" class="btn btn-danger waves-effect waves-light">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
