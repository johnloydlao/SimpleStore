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
                    @can('create-product')
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('products.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-700 text-white dark:text-gray-100 text-sm font-medium rounded-md shadow-sm hover:bg-green-600 dark:hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                {{ __('Add Product') }}
                            </a>
                        </div>
                    @endcan
                    <div class="overflow-x-auto mb-4">
                        <table
                            class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Name') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Description') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Price') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($products as $product)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-6 py-3">{{ $product->name }}</td>
                                        <td class="px-6 py-3">{{ $product->description }}</td>
                                        <td class="px-6 py-3">${{ number_format($product->price, 2) }}</td>
                                        <td class="px-6 py-3">
                                            @can('add-to-cart')
                                                <form action="{{ route('cart.add') }}" method="POST"
                                                    class="flex items-center space-x-3">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                    <input type="number" name="quantity" value="1" min="1"
                                                        required
                                                        class="w-16 px-3 py-2 text-sm text-gray-800 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 bg-white">

                                                    <button type="submit"
                                                        class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 3h2l1 9h10l1-9h2M5 13h14l1 8H4l1-8z" />
                                                        </svg>
                                                        <span>{{ __('Add to Cart') }}</span>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


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
