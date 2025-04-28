<div>
    <input type="text" wire:model="search" placeholder="Search Invoices..." class="form-control mb-3" />

    <div class="table-responsive">
        <table class="table table-centered table-nowrap mb-0">
            <thead class="table-light">
                <tr>
                    <th> # </th>
                    <th>Invoice Number</th>
                    <th>Date of Invoice</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoices->firstItem() + $loop->index }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->date_of_create)->format('Y-m-d') }}</td>
                        <td>
                            <h5>
                                <span class="badge bg-soft-{{ $invoice->status == 'paid' ? 'success text-success' : 'danger text-danger' }}">
                                    <i class="mdi mdi-bitcoin"></i> {{  $invoice->status }}
                                </span>
                            </h5>
                        </td>
                        <td style="display: inline-block">
                            <div class="button-list" style="display: flex;">
                                <form action="{{ route('invoice.show', $invoice->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Preview <i class="mdi mdi-eye me-1" ></i></button>
                                </form>
                                <form action="{{ route('invoice.edit', $invoice->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-success waves-effect waves-light">edit <i class="mdi mdi-eye me-1" ></i></button>
                                </form>
                                <form action="{{ route('invoice.delete', $invoice->id) }}" id="deleteform{{ $invoice->id }}" method="POST">
                                    @csrf
                                    <button type="button" onclick="JSconfirm(event, {{ $invoice->id }})" class="btn btn-danger waves-effect waves-light">Delete <i class="mdi mdi-close"></i></button>
                                </form>
                                <form action="{{ route('download', $invoice->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Download <i class="mdi mdi-printer me-1" ></i></button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No invoices found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $invoices->links() }} <!-- Pagination links -->
    </div>
</div>
