<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto mb-4">
                        <table
                            class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Name') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Description') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Quantity') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Price') }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($cartItems as $product)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-6 py-3">{{ $product->name }}</td>
                                        <td class="px-6 py-3">{{ $product->description }}</td>
                                        <td class="px-6 py-3">{{ $product->pivot->quantity }}</td>
                                        <td class="px-6 py-3">
                                            ${{ number_format($product->pivot->quantity * $product->price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="mt-4 flex justify-between items-center px-6 py-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            <span>{{ __('Total Price:') }}</span>
                            <span>${{ number_format($cart->getTotalPrice(), 2) }}</span>
                        </div>


                    </div>
                    @if (session('success'))
                        <div class="alert bg-green-100 text-green-700 border border-green-400 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
