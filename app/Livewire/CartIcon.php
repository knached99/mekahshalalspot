<?php

namespace App\Livewire;

use Livewire\Component;


class CartIcon extends Component
{

    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount(){

        $this->updateCount();
    }


    public function updateCount(){

        $cart = session()->get('cart', []);
        $this->cartCount = array_sum(array_column($cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
