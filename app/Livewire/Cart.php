<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{

    public array $cart = [];
    public int $cartCount = 0;

    public string $error = '';

    protected $listeners = ['addToCart'=> 'add'];


    public function mount(){

        $this->cart = session()->get('cart', []);
        $this->cartCount = $this->getCartCount();
    }


            public function add($item)
        {
            // Decode if needed
            if (is_string($item)) {
                $item = json_decode($item, true);
            }
           

            $id = $item['id'] ?? null;

            if (!$id) {
                $this->error = 'Unable to add this item to the cart';
                return;
            }

            if (isset($this->cart[$id])) {
                $this->cart[$id]['quantity']++;
            } else {
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

        session()->put('cart', $this->cart);
        $this->cartCount = $this->getCartCount();
        $this->dispatch('cartUpdated');

    }

    public function getCartSummary()
    {
        $subtotal = array_reduce($this->cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
        $tax = $subtotal * 0.0635;
        $total = $subtotal + $tax;
    
        return [
            'subtotal' => round($subtotal, 2),
            'tax' => round($tax, 2),
            'total' => round($total, 2),
        ];
    }
    
    

    public function getCartCount(){

        return array_sum(array_column($this->cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
