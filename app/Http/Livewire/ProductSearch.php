<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public $searchTerm = ''; // Holds the user-entered search term

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }
    public function paginationView(){
        return 'livewire.pagination';
    }
    public function render()
    {
        // Filter products based on search term
        $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
                            ->orWhereHas('company', function($query) {
                                $query->where('name', 'like', '%' . $this->searchTerm . '%');
                            })
                            ->paginate(10);

        return view('livewire.product-search', [
            'products' => $products
        ]);
    }
}