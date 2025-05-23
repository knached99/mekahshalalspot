<?php

namespace App\Livewire;

use Livewire\Component;

class MenuItemButton extends Component
{

    public $item;

    public function addToCart(){

        $this->dispatch('addToCart', $this->item);
    }


    public function render()
    {
        return view('livewire.menu-item-button');
    }
}
