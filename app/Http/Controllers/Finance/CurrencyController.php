<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Services\CurrencyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencyController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $userCurrencies = auth()->user()->favoriteCurrencies()->get();

        // Extract the currency codes to exclude from other currencies
        $excludedCurrencyCodes = $userCurrencies->pluck('code')->toArray();

        // Retrieve all other currencies not in the user's favorites
        $otherCurrencies = Currency::whereNotIn('code', $excludedCurrencyCodes)->get();


        $favoritesWithDetails = $userCurrencies->map(function ($currency) {
            $apiData = $this->currencyService->getCurrencyData($currency->code);

            return Currency::fromApiData($apiData, [
                'name' => $currency->name,
                'code' => $currency->code,
            ]);
        });


        return view('finance.favorite-currencies', [
            'favoriteCurrencies' => $favoritesWithDetails,
            'otherCurrencies' => $otherCurrencies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
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
     * @return Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
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
