<x-layouts.app>
    <x-breadcrumbs :links="[['href' => route('users.index'), 'title' => 'Пользователи'],['href' => route('users.create'), 'title' => __('app.users.create')],]"/>
    <x-alerts />
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <x-card title="Список пользователей">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('app.users.create') }}</h1>
                    </div>
                    <div class="flex flex-row gap-2 mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a
                            href="{{ redirect()->back()->getTargetUrl() }}"
                            class="border border-gray-300 block rounded-md bg-white px-3 py-2 text-center text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        >
                            {{ __('app.users.cancel') }}
                        </a>
                        <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ __('app.users.save') }}
                        </button>
                    </div>
                </div>
                <div class="-mx-4 mt-8 sm:-mx-0">
                    <table class="min-w-full divide-y divide-gray-300">

                        <tbody class="divide-y divide-gray-200 bg-white">

                            <tr>
                                <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                    <label for="name">{{ __('app.users.name') }}</label>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500">
                                    <input
                                        required
                                        type="text"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') }}"
                                        class="rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="{{ __('app.users.name') }}"
                                    />
                                </td>
                            </tr>

                            <tr>
                                <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                    <label for="email">{{ __('app.users.email') }}</label>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500">
                                    <input
                                        required
                                        type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email') }}"
                                        class="rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="you@example.com"
                                    />
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </x-card>
    </form>

    <x-delete-modal />

</x-layouts.app>
