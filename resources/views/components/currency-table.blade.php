<table {{ $attributes->merge(['class' => 'currency-table shadow-sm border w-full']) }}>
    <thead>
    <tr class="border-b bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider text-xs sm:text-sm md:text-md">
        <th class="px-2 py-2 sm:px-4 border-r">Currency Name</th>
        <th class="px-2 py-2 sm:px-4 border-r">Currency Code</th>
        <th class="px-2 py-2 sm:px-4 border-r">Bid</th>
        <th class="px-2 py-2 sm:px-4 border-r">Ask</th>
        <th class="px-2 py-2 sm:px-4 border-r">Remove</th>
    </tr>
    </thead>
    <tbody>
    @foreach($favoriteCurrencies as $currency)
        <tr class="text-xs sm:text-sm md:text-md">
            <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                {{ $currency->name }}
            </td>
            <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                {{ $currency->code }}
            </td>
            <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                {{ $currency->bid }}
            </td>
            <td class="px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                {{ $currency->ask }}
            </td>
            <td class="text-center px-2 py-3 sm:px-4 border-b border-r border-gray-200 text-gray-900">
                <form action="{{ route('currencies.destroy') }}" method="POST" onsubmit="return confirm({{ __('Remove') }});">
                    @csrf
                    @method('DELETE')

                    <!-- Pass the currency ID or any other necessary parameter here -->
                    <input type="hidden" name="currency_id" value="{{ $currency->code }}">
                    <x-danger-button class="text-xs sm:text-sm px-2 py-1 sm:px-3 sm:py-2">
                        {{ __('Remove') }}
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
                        <option value="" disabled selected>{{ __('Select a currency') }}</option>
                        @foreach($otherCurrencies as $currency)
                            <option value="{{ $currency->code }}">{{ $currency->name }} ({{ $currency->code }})</option>
                        @endforeach
                    </select>

                    <!-- Add button -->
                    <x-button type="submit" class="text-xs sm:text-sm md:text-md px-4 py-2">
                        {{ __('Add') }}
                    </x-button>
                </div>
            </form>
        </td>
    </tr>
    </tfoot>
</table>
