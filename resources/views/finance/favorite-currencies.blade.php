<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favorite currencies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-0 py-2 sm:p-0 md:p-4 lg:p-6 bg-white border-b border-gray-200">
                    <x-currency-table :favoriteCurrencies="$favoriteCurrencies" :otherCurrencies="$otherCurrencies" class="my-custom-class" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>