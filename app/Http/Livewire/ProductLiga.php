<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Component;

class ProductLiga extends Component
{


    public $search, $liga;

    protected $updateQueryString = ['search'];


    public function updatingSearch()
    {
        $this->reset();
    }


    public function mount($ligaId)
    {
        $ligaDetail = Liga::find($ligaId);

        if($ligaDetail)
        {
            $this -> liga = $ligaDetail;
        }
    }
    

    public function render()
    {

        if ($this->search) {
            $products = Product::where('liga_id', $this -> liga -> id)->where('nama', 'like', '%' . $this->search . '%')->paginate(16);
        } else {
            $products = Product::where('liga_id', $this -> liga -> id)->paginate(16);
        }


        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Jersey Liga ' . $this -> liga -> nama
        ])->layout('livewire.layouts.app');
    }
}
