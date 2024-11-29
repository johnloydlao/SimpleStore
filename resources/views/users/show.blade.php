<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View User') }}
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
                                        {{ __('Phone') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Address Line 1') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('City') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('State') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Postal Code') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __('Country') }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <td class="px-6 py-3">{{ $user->name }}</td>
                                <td class="px-6 py-3">{{ $user->email }}</td>
                                <td class="px-6 py-3">{{ $user->profile?->phone }}</td>
                                <td class="px-6 py-3">{{ $user->profile?->address_line1 }}</td>
                                <td class="px-6 py-3">{{ $user->profile?->city }}</td>
                                <td class="px-6 py-3">{{ $user->profile?->state }}</td>
                                <td class="px-6 py-3">{{ $user->profile?->postal_code }}</td>
                                <td class="px-6 py-3">{{ $user->profile?->country }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
