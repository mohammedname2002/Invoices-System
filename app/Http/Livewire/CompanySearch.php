<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Livewire\WithPagination;

class CompanySearch extends Component
{
    use WithPagination;

    public $searchTerm = ''; // The search term for filtering companies

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }
    public function paginationView(){
        return 'livewire.pagination';
    }
    public function render()
    {
        $companies = Company::where('name', 'like', '%' . $this->searchTerm . '%')
                            ->paginate(10);

        return view('livewire.company-search', ['companies' => $companies ,
    ]);
    }
}