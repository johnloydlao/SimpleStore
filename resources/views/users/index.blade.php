<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table
                            class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Name') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Email') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($users as $user)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-6 py-3">{{ $user->name }}</td>
                                        <td class="px-6 py-3">{{ $user->email }}</td>
                                        <td class="px-6 py-3">
                                            <a href="" class="text-blue-500 hover:text-blue-700">
                                                View
                                            </a>
                                            <x-edit-button>
                                                {{ __('Edit') }}
                                            </x-edit-button>
                                            <a href="" class="text-blue-500 hover:text-blue-700">
                                                Edit
                                            </a>
                                            <a href="" class="text-blue-500 hover:text-blue-700">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
