<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $userCurrencies = auth()->user()->favoriteCurrencies()->get();

        // Extract the currency codes to exclude from other currencies
        $excludedCurrencyCodes = $userCurrencies->pluck('code')->toArray();

        // Retrieve all other currencies not in the user's favorites
        $otherCurrencies = Currency::whereNotIn('code', $excludedCurrencyCodes)->get();

        return view('finance.favorite-currencies', [
            'favoriteCurrencies' => $userCurrencies,
            'otherCurrencies' => $otherCurrencies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|exists:currencies,code',
        ]);

        $user = auth()->user();

        // Add the selected currency to the user's favorites
        $user->favoriteCurrencies()->attach($request->currency_code);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $currencyId = $request->input('currency_id'); // Get the currency ID

        $user = auth()->user();


        $user->favoriteCurrencies()->where('currency_code', $currencyId)->detach($currencyId);


        // Redirect back to the previous page
        return back();
    }
}
