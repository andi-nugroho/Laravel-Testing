<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{


    public $search;

    protected $updateQueryString = ['search'];


    public function updatingSearch()
    {
        $this->reset();
    }

    public function render()
    {

        if ($this->search) {
            $products = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(16);
        } else {
            $products = Product::paginate(16);
        }


        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'List Semua Jersey'
        ])->layout('livewire.layouts.app');
    }
}
