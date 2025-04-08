<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

use function Illuminate\Log\log;

class ProductCrud extends Component
{
    public $products;
    public $name = "";
    public $price;
    public $productId = null;
    public $showEditModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ];

    public function render()
    {
        $this->products = Product::latest()->get();
        return view('livewire.product-crud');
    }

    public function close(){
        $this->showEditModal = false;
    }

    public function resetInput()
    {
        $this->name = '';
        $this->price = '';
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();
        // Product::create(['name' => $this->name, 'price' => $this->price]);
        // $this->resetInput();
        $prouct = new Product();
        $prouct->name = $this->name;
        $prouct->price = $this->price;
        $prouct->save();
        $this->name = '';
        $this->price = '';
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate();
        Product::find($this->productId)?->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);
        $this->close();
    }

    public function delete($id)
    {
        Product::find($id)?->delete();
    }}
