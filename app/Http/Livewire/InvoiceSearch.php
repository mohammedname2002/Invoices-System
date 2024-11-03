<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoice;

class InvoiceSearch extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }
    public function paginationView(){
        return 'livewire.pagination';
    }

    
    public function render()
    {
        $invoices = Invoice::query()
            ->where('invoice_number', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orWhereDate('date_of_create', 'like', '%' . $this->search . '%')
            ->paginate(10); // Adjust the number of items per page

        return view('livewire.invoice-search', [
            'invoices' => $invoices,
        ]);
    }
}