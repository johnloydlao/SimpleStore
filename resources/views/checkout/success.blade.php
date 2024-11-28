<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout Success') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div
                            class="alert bg-green-100 text-green-700 border border-green-400 px-6 py-4 rounded-lg flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <strong>{{ __('Success:') }}</strong> {{ session('success') }}
                            </div>
                        </div>
                    @else
                        <div
                            class="alert bg-green-100 text-green-700 border border-green-400 px-6 py-4 rounded-lg flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                {{ __('Your payment has been successfully completed. Thank you for your purchase!') }}
                            </div>
                        </div>
                    @endif

                    <div class="mt-8 text-center">
                        <a href="{{ route('products.index') }}"
                            class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                            {{ __('Return to Products') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
