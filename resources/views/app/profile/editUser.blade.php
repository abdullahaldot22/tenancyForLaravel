<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex align-middle justify-start w-full">
                    @if(!(Auth::id() == $id))
                        <div class="pb-5 w-1/2 p-6">
                            <h2 class="text-xl font-bold mb-5 mt-3">Edit User</h2>
                            <form class="" method="POST" action="{{ route('admin.user.edit') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="mt-3">
                                    <x-input-label for="name" :value="__('Name')">Name</x-input-label>
                                    <x-text-input class="w-96 mt-2 w-full" id="name" type="text" name="name" value="{{ $user->name }}" autofocus autocomplete="name"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-0.5"/>
                                </div>
                                
                                <div class="mt-3">
                                    <x-input-label for="email" :value="__('Email')">Email</x-input-label>
                                    <x-text-input class="w-96 mt-2 w-full" id="email" type="email" name="email" value="{{ $user->email }}" autofocus autocomplete="email"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-0.5"/>
                                </div>

                                <div class="mt-5">
                                    <x-primary-button>Register</x-primary-button>
                                </div>
                            </form>
                        </div>
                    @endif

                    <div class="pb-5 w-1/2 p-6">
                        <h2 class="text-xl font-bold mb-5 mt-3">Edit User Role</h2>
                        <form class="" method="POST" action="{{ route('admin.edit.user.role') }}">
                            @csrf
                            
                            <input type="hidden" name="user" value="{{ $id }}">
                            <ul class="p-4 pb-0">
                                @foreach($roles as $role)
                                    <li class="mb-2 {{ ($id == 1 && $role->id == 1) ? 'hidden' : '' }}">
                                        <input 
                                            class="outline-transparent outline-offset-0"
                                            type="checkbox" 
                                            name="role[]" 
                                            value="{{ $role->id }}" 
                                            id="{{ $role->name }}" 
                                            @if( in_array($role->id, $user->roles->pluck('id')->toArray()) )
                                                checked
                                            @endif
                                            />
                                        <label for="{{ $role->name }}" class="pl-2">{{ ucfirst($role->name) }}</label>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-6 ml-4">
                                <x-primary-button>Update Role</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex align-middle justify-around w-full">
                    <div class="pb-5 w-1/2 p-6">
                        <h2 class="text-xl font-bold mb-5 mt-3">Reset User Password</h2>
                        <a href="{{ route('admin.reset.user', $id) }}" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Reset</a>
                    </div>
                    <div class="pb-5 w-1/2 p-6">
                        @if($id != 1)
                            <h2 class="text-xl font-bold mb-5 mt-3">Delete User</h2>
                            <a href="{{ route('admin.delete.user', $id) }}" class="inline-flex items-center px-4 py-2 bg-red-700 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Delete</a>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app-layout>