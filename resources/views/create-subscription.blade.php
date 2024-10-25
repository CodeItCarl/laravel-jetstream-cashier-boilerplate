<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Not Subscribed!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl p-8 sm:rounded-lg">
                <h2 class="mb-4">Hang on, you need to be subscribed to view that!</h2>
                <div class="flex items-center space-x-4">
                    <a
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        href="{{ $checkoutMonthly->__get('url') }}"
                    >
                        Subscribe Monthly for €{{ number_format($checkoutMonthly->__get('amount_total') / 100, 2) }}
                    </a>

                    <a
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        href="{{ $checkoutYearly->__get('url') }}"
                    >
                        Subscribe Yearly for €{{ number_format($checkoutYearly->__get('amount_total') / 100, 2) }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
