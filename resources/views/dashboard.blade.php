<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="white-container-div">
                <form id="currency-form" action="{{ route('currencies.search') }}" method="GET">
                    <div class="flex items-center justify-center space-x-4">
                        <!-- Dropdown for other currencies -->
                        <select name="code" class="text-xs sm:text-sm md:text-md border-gray-300 rounded px-4 py-2">
                            <option value="{{ session('searched_currency') ? session('searched_currency')['code'] : '' }}" disabled selected>
                                {{ session('searched_currency') ? session('searched_currency')['code'] : __('Select a currency') }}
                            </option>
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->code }}">{{ $currency->name }} ({{ $currency->code }})</option>
                            @endforeach

                        </select>

                        <input type="date" name="date" value="{{ session('selected_date') ? session('selected_date') : $actual_date }}" max="{{ $actual_date }}" class="text-xs sm:text-sm md:text-md border-gray-300 rounded px-4 py-2">
                    </div>
                    <div class="flex justify-center mt-2 md:mt-6 mb-4">
                        <!-- Add button -->
                        <x-button type="submit" class="text-xs sm:text-sm md:text-md px-4 py-2 ">
                            {{ __('currency.Find') }}
                        </x-button>
                    </div>
                </form>
            </div>
            @if(session('searched_currency'))
                <div class="white-container-div">
                    <table class="currency-table shadow-sm border w-full h-full table-auto">
                        <thead>
                        <tr class="currency-table-head-tr">
                            <th class="currency-table-th">{{ __('currency.Currency Name') }}</th>
                            <th class="currency-table-th">{{ __('currency.Currency Code') }}</th>
                            <th class="currency-table-th">{{ __('currency.Bid') }}</th>
                            <th class="currency-table-th">{{ __('currency.Ask') }}</th>
                        </tr>
                        </thead>
                        <tbody class="overflow-y-auto">
                            <tr class="text-xs sm:text-sm md:text-md">
                                <td class="currency-table-body-td">
                                    {{ __('currency.' . session('searched_currency')['name']) }}
                                </td>
                                <td class="currency-table-body-td">
                                    {{ session('searched_currency')['code'] }}
                                </td>
                                <td class="text-clip currency-table-body-td">
                                    {{ session('searched_currency')['bid'] }}
                                </td>
                                <td class="currency-table-body-td">
                                    {{ session('searched_currency')['ask'] }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
            @if(session('apiFail'))
                <div class="white-container-div">
                    <div class="p-2 xxs:p-0">
                        {{ __("currency.API error. Make sure the selected currency or date is correct. No data is saved for holidays, Saturdays and Sundays.") }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
