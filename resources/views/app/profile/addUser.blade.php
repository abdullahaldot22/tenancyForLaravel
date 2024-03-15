<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="pb-5">
                        <h2 class="text-xl font-bold mb-5 mt-3">Register User</h2>
                        <form class="" method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="mt-3">
                                <x-input-label for="name" :value="__('Name')">Name</x-input-label>
                                <x-text-input class="w-96 mt-2" id="name" type="text" name="name" :value="old('name')" autofocus autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-0.5"/>
                            </div>

                            <div class="mt-3">
                                <x-input-label for="email" :value="__('Email')">Email</x-input-label>
                                <x-text-input class="w-96 mt-2" id="email" type="email" name="email" :value="old('email')" autofocus autocomplete="email"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-0.5"/>
                            </div>

                            <div class="mt-3">
                                <x-input-label for="password" :value="__('Password')">Password</x-input-label>
                                <x-text-input class="w-96 mt-2" id="password" type="password" name="password" :value="old('password')" autofocus autocomplete="password"/>
                                <x-input-error :messages="$errors->get('password')" class="mt-0.5"/>
                            </div>

                            <div class="mt-5">
                                <x-primary-button>Register</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-tenant-app-layout>