<x-layouts.app>
    <x-breadcrumbs :links="[['href' => route('users.index'), 'title' => 'Пользователи'],['href' => route('users.show', ['user' => $user]), 'title' => $user->name],]"/>
    <x-alerts />
    <x-card title="Список пользователей">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">{{ $user->name }}</h1>
                </div>
                <div class="flex flex-row gap-2 mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a
                        href="{{ route('users.edit', ['user' => $user]) }}"
                        class="block rounded-md border border-indigo-600 bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        {{ __('app.users.edit') }}
                    </a>
                    <button
                        data-link="/users/{{ $user->id }}/delete"
                        class="delete-confirmation block rounded-md border border-red-600 bg-red-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        {{ __('app.users.delete') }}
                    </button>
                </div>
            </div>
            <div class="-mx-4 mt-8 sm:-mx-0">
                <table class="min-w-full divide-y divide-gray-300">

                    <tbody class="divide-y divide-gray-200 bg-white">

                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                {{ __('Name') }}
                                <div class="font-normal lg:hidden mt-1 truncate text-gray-700">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                {{ __('Email') }}
                                <div class="font-normal lg:hidden mt-1 truncate text-gray-700">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                {{ __('Created') }}
                                <div class="font-normal lg:hidden mt-1 truncate text-gray-700">
                                    {{ \Carbon\Carbon::create($user->created_at)->format('d.m.Y H:i') }}
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ \Carbon\Carbon::create($user->created_at)->format('d.m.Y H:i') }}</td>
                        </tr>

                        <tr>
                            <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                {{ __('Updated') }}
                                <div class="font-normal lg:hidden mt-1 truncate text-gray-700">
                                    {{ \Carbon\Carbon::create($user->updated_at)->format('d.m.Y H:i') }}
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ \Carbon\Carbon::create($user->updated_at)->format('d.m.Y H:i') }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </x-card>

    <x-delete-modal />

</x-layouts.app>
