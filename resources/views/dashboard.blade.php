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

                            <input type="date" name="date" value="{{ $actual_date }}" max="{{ $actual_date }}" class="text-xs sm:text-sm md:text-md border-gray-300 rounded px-4 py-2">
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
                        {{ session('searched_currency') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
