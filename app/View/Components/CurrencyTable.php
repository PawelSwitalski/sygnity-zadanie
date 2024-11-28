<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CurrencyTable extends Component
{
    public $favoriteCurrencies;
    PUBLIC $otherCurrencies;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $favoriteCurrencies
     * @param  mixed  $otherCurrencies
     * @return void
     */
    public function __construct($favoriteCurrencies, $otherCurrencies)
    {
        $this->favoriteCurrencies = $favoriteCurrencies;
        $this->otherCurrencies = $otherCurrencies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.currency-table');
    }
}
