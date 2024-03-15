<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="pb-5">
                        <h2 class="text-xl font-bold mb-5 mt-3">Create Tanent</h2>
                        <form class="" method="POST" action="{{ route('tenant.store') }}">
                            @csrf
                            <div class="mt-3">
                                <x-input-label for="name" :value="__('Name')">Name</x-input-label>
                                <x-text-input class="w-96 mt-2" id="name" type="text" name="name" :value="old('name')" autofocus autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-0.5"/>
                            </div>

                            <div class="mt-5">
                                <x-primary-button>Register</x-primary-button>
                            </div>
                        </form>
                    </div>
                    <div class="pb-5">

                        <table class="w-full rounded-lg">
                            <thead class="bg-gray-900 text-white text-left">
                                <tr class="leading-[50px]">
                                    <th class="pl-3">No</th>
                                    <th class="pl-3">Name</th>
                                    <th class="pl-3">Domain</th>
                                    <th class="pl-3">ID</th>
                                    <th class="pl-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenants as $key => $tenant)
                                    <tr class="leading-10 text-gray-400 font-bold border-b border-slate-100">
                                        <td class="pl-2 border-r">{{ $key+1 }}</td>
                                        <td class="pl-2 border-r">{{ $tenant->name }}</td>
                                        <td class="pl-2 border-r">
                                            <a target="_blank" href="{{ 'http://'.$tenant->domains->first()->domain.':8000' }}">{{ $tenant->domains->first()->domain }}</a>
                                        </td>
                                        <td class="pl-2 border-r">{{ $tenant->id }}</td>
                                        <td class="pl-2 text-center">
                                            <a href="{{ route('tenant.delete', $tenant->id) }}" class="inline-flex items-center px-4 py-2 bg-red-700 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mb-1.5">Delete</a>
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
