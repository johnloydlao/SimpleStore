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
                                            <a href="{{ route('users.show', $user) }}"
                                                class="text-blue-500 hover:text-blue-700">
                                                {{ __('View') }}
                                            </a>

                                            <a href="{{ route('users.edit', $user) }}"
                                                class="ml-4 text-blue-500 hover:text-blue-700">
                                                {{ __('Edit') }}
                                            </a>

                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="ml-4 text-red-500 hover:text-red-700">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>

                                            <form action="{{ route('users.promote', $user) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                <button type="submit" class="ml-4 text-green-500 hover:text-green-700">
                                                    {{ __('Promote to Admin') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
