<table {{ $attributes->merge(['class' => 'currency-table shadow-sm border w-full h-full table-auto']) }}>
    <thead>
    <tr class="currency-table-head-tr">
        <th class="currency-table-th">{{ __("currency.Currency Name") }}</th>
        <th class="currency-table-th">{{ __("currency.Currency Code") }}</th>
        <th class="currency-table-th">{{ __("currency.Bid") }}</th>
        <th class="currency-table-th">{{ __('currency.Ask') }}</th>
        <th class="currency-table-th">{{ __('currency.Remove') }}</th>
    </tr>
    </thead>
    <tbody class="overflow-y-auto">
    @foreach($favoriteCurrencies as $currency)
        <tr class="text-xs sm:text-sm md:text-md">
            <td class="currency-table-body-td">
                {{ __("currency." . $currency->name) }}
            </td>
            <td class="currency-table-body-td">
                {{ $currency->code }}
            </td>
            <td class="text-clip currency-table-body-td">
                {{ $currency->bid }}
            </td>
            <td class="currency-table-body-td">
                {{ $currency->ask }}
            </td>
            <td class="text-center currency-table-body-td">
                <form action="{{ route('currencies.destroy') }}" method="POST" onsubmit="return confirm({{ __('Remove') }});">
                    @csrf
                    @method('DELETE')

                    <!-- Pass the currency ID or any other necessary parameter here -->
                    <input type="hidden" name="currency_id" value="{{ $currency->code }}">
                    <x-danger-button class="scale-75 sm:scale-100 text-xs sm:text-sm px-1 py-1 sm:px-3 sm:py-2">
                        <spane class="hidden sm:block">
                            {{ __('currency.Remove') }}
                        </spane>
                    </x-danger-button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td class="text-center py-3 sm:py-4 border-b border-gray-200" colspan="5">
            <form action="{{ route('currencies.store') }}" method="POST">
                @csrf
                <div class="flex items-center justify-center space-x-4">
                    <!-- Dropdown for other currencies -->
                    <select name="currency_code" class="text-xs sm:text-sm md:text-md border-gray-300 rounded px-4 py-2">
                        <option value="" disabled selected>{{ __('currency.Select a currency') }}</option>
                        @foreach($otherCurrencies as $currency)
                            <option value="{{ $currency->code }}">{{ $currency->name }} ({{ $currency->code }})</option>
                        @endforeach
                    </select>

                    <!-- Add button -->
                    <x-button type="submit" class="text-xs sm:text-sm md:text-md px-4 py-2">
                        {{ __('currency.Add') }}
                    </x-button>
                </div>
            </form>
        </td>
    </tr>
    </tfoot>
</table>
