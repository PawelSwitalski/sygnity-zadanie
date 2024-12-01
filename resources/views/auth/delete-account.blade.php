<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">
            {{ __('auth.Delete Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl leading-tight">
                        {{ __('auth.Delete Account. All user data will be deleted.') }}
                    </h2>
                    <form method="POST" action="{{ route('delete.account') }}">
                    @csrf
                        <div class="text-center py-4">
                            <x-danger-button class="m-3">
                                {{ __('auth.Delete') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
