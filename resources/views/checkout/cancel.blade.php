<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout Cancelled') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    @if (session('error'))
                        <div
                            class="alert bg-red-100 text-red-700 border border-red-400 px-6 py-4 rounded-lg flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M19 12c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7z" />
                            </svg>
                            <div>
                                <strong>{{ __('Error:') }}</strong> {{ session('error') }}
                            </div>
                        </div>
                    @else
                        <div
                            class="alert bg-yellow-100 text-yellow-700 border border-yellow-400 px-6 py-4 rounded-lg flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8z" />
                            </svg>
                            <div>
                                {{ __('Your payment has been cancelled. Please try again or contact support if you need assistance.') }}
                            </div>
                        </div>
                    @endif

                    <div class="mt-8 text-center">
                        <a href="{{ route('cart.view') }}"
                            class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                            {{ __('Return to Cart') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
