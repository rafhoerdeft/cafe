<?php

namespace App\Http\Livewire\Landing\Cart;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class ListCart extends Component
{
    private $cookie_cart_name = 'list-cart';
    private $order_id = 1;
    public $selected_key = 0;
    public $list_cart = [];
    public $total = 0;

    public function mount()
    {
        $cookie_name = $this->cookie_cart_name;
        if (Cookie::has($cookie_name)) {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            $this->list_cart = $cookies;

            $this->getTotalListCart();
        }
    }

    public function getTotalListCart()
    {
        $this->total = collect($this->list_cart)->sum(function ($cart) {
            return $cart['price'] * $cart['amount'];
        });
    }

    public function updateAmount($action, $key)
    {
        if ($action == 'plus') {
            $this->list_cart[$key]['amount']++;
        } else {
            if ($this->list_cart[$key]['amount'] > 1) {
                $this->list_cart[$key]['amount']--;
            } else {
                $this->list_cart[$key]['amount'] = 1;
            }
        }

        $this->getTotalListCart();
        $this->emit('setListCart', $this->list_cart[$key]['id'], $this->list_cart[$key]['amount'], false);
    }

    public function showDeleteDialog($key)
    {
        $this->selected_key = $key;
        $this->dispatchBrowserEvent('show-delete-dialog', [
            'name' => $this->list_cart[$key]['name'] . ' - ' . $this->list_cart[$key]['option_name'],
        ]);
    }

    public function removeList()
    {
        unset($this->list_cart[$this->selected_key]); // Is available remove from array
        $this->getTotalListCart();
        $this->emit('removeListCart', $this->selected_key);
        $this->dispatchBrowserEvent('close-delete-dialog');
    }

    public function showOrderDialog()
    {
        $this->dispatchBrowserEvent('show-order-dialog');
    }

    public function orderProcees()
    {
        foreach ($this->list_cart as $key => $item) {
            # code...
        }
    }

    public function render()
    {
        return view('landing.cart.list-cart');
    }
}
