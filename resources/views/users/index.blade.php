<x-layouts.app>
    <x-breadcrumbs :links="[['href' => route('users.index'), 'title' => __('app.users.list')],]"/>
    <x-alerts />
    <x-card title="Список пользователей">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('app.users.list') }}</h1>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a
                        href="{{ route('users.create') }}"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        {{ __('app.users.create') }}
                    </a>
                </div>
            </div>
            <div class="-mx-4 mt-8 sm:-mx-0">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">{{ __('app.users.name') }}</th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                                {{ __('app.users.email') }}</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($users as $user)
                            <tr>
                                <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
                                    <a class="hover:underline" href="{{ route('users.show', ['user' => $user]) }}">{{ $user->name }}</a>
                                    <dl class="font-normal lg:hidden">
                                        <dd class="mt-1 truncate text-gray-500 sm:hidden">{{ $user->email }}</dd>
                                    </dl>
                                </td>
                                <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{ $user->email }}</td>
                                <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <span class="isolate inline-flex rounded-md shadow-sm">
                                      <a
                                          href="{{ route('users.edit', ['user' => $user]) }}"
                                          type="button"
                                          class="border border-grey-300 focus:outline-none text-gray-900 bg-white hover:bg-gray-100 rounded-l-md text-xs px-3 py-2"
                                      >
                                          {{ __('app.users.edit') }}
                                      </a>
                                      <button
                                          data-link="/users/{{ $user->id }}/delete"
                                          type="button"
                                          class="delete-confirmation border border-red-600 focus:outline-none text-white bg-red-600 hover:bg-red-500 rounded-r-md text-xs px-3 py-2"
                                      >
                                          {{ __('app.users.delete') }}
                                      </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-pagination :data="$users"/>
    </x-card>

    <x-delete-modal />

</x-layouts.app>
