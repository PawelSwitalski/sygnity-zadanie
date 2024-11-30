<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-0 py-2 sm:p-0 md:p-4 lg:p-6 bg-white border-b border-gray-200">

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
                                {{ __('Find') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            @if(session('searched_currency'))
                <div class="bg-white overflow-hidden shadow-sm my-0 sm:my-4 sm:rounded-lg">
                    <div class="px-0 py-2 sm:p-0 md:p-4 lg:p-6 bg-white border-b border-gray-200">
                        <table class="currency-table shadow-sm border w-full h-full table-auto">
                            <thead>
                            <tr class="border-b bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider text-xs sm:text-sm md:text-md">
                                <th class="px-2 py-2 sm:px-4 border-r">Currency Name</th>
                                <th class="px-2 py-2 sm:px-4 border-r">Currency Code</th>
                                <th class="px-2 py-2 sm:px-4 border-r">Bid</th>
                                <th class="px-2 py-2 sm:px-4 border-r">Ask</th>
                            </tr>
                            </thead>
                            <tbody class="overflow-y-auto">
                                <tr class="text-xs sm:text-sm md:text-md">
                                    <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                                        {{ session('searched_currency')['name'] }}
                                    </td>
                                    <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                                        {{ session('searched_currency')['code'] }}
                                    </td>
                                    <td class="px-2 py-3 sm:px-4 text-clip border-b border-r border-gray-200 text-gray-900">
                                        {{ session('searched_currency')['bid'] }}
                                    </td>
                                    <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                                        {{ session('searched_currency')['ask'] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if(session('apiFail'))
                <div class="bg-white overflow-hidden shadow-sm my-0 sm:my-4 sm:rounded-lg">
                    <div class="px-0 py-2 sm:p-0 md:p-4 lg:p-6 bg-white border-b border-gray-200">
                        <div class="p-2 xxs:p-0">
                            {{ __("API error. Make sure the selected currency or date is correct. No data is saved for holidays, Saturdays and Sundays.") }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
