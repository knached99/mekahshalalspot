<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{

    public array $cart = [];


    protected $listeners = ['addToCart'=> 'add'];


    public function mount(){

        $this->cart = session()->get('cart', []);
    }


    public function add($item){

        $id = $item['id'];

        if(isset($this->cart[$id])){
            $this->cart[$id]['quantity']++;
        }        

        else{

            $this->cart[$id] = [
            'name' => $item['name'],
            'price' => $item['price'],
            'image' => $item['image'] ?? null,
            'description' => $item['description'] ?? null,
            'quantity' => 1,
            ];
        }

        $this->updateSession();
    }


    public function increaseQuantity($id){
        if(isset($this->cart[$id])){

            $this->cart[$id]['quantity']++;
            $this->updateSession();
        }
    }

    public function decreaseQuantity($id)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['quantity']--;
            if ($this->cart[$id]['quantity'] <= 0) {
                unset($this->cart[$id]);
            }
            $this->updateSession();
        }
    }


    public function removeItem($id){
        unset($this->cart[$id]);
        $this->updateSession();
    }


    public function updateSession(){

        session(['cart'=>$this->cart]);
        session()->put('cart_expires_at', now()->addHour());
        $this->emit('cartUpdated', $this->getCartCount());
    }


    public function getTotal(){

        return array_reduce($this->cart, fn($carry, $item)=> $carry + ($item['price'] * $item['quantity']), 0);
    }


    public function getCartCount(){

        return array_sum(array_column($this->cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
