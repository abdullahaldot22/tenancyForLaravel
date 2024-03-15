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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex align-middle justify-between">
                    <div class="">
                        {{ __("something !!") }}
                    </div>
                    @role('admin')
                        <div class="">
                            <a href="{{ route('user.create') }}" class="bg-gray-800 px-4 py-2 rounded text-white font-bold">Register User</a>
                        </div>
                    @endrole
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <table class="w-full rounded-lg">
                        <thead class="bg-gray-900 text-white text-left">
                            <tr class="leading-[50px]">
                                <th class="pl-3">ID</th>
                                <th class="pl-3">Name</th>
                                <th class="pl-3">Email</th>
                                <th class="pl-3">Role</th>
                                <th class="pl-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr class="leading-10 text-gray-400 font-bold border-b border-slate-100">
                                    <td class="pl-2 border-r">{{ $key+1 }}</td>
                                    <td class="pl-2 border-r">{{ $user->name }}</td>
                                    <td class="pl-2 border-r">{{ $user->email }}</td>
                                    <td class="pl-2 border-r">
                                        @foreach($user->roles as $role)
                                            {{ $role->name }} {{ $loop->last ? ' ' : ',' }}
                                        @endforeach
                                    </td>
                                    <td class="pl-2">
                                        @if((!(Auth::id() == $user->id || $user->id == 1)) || Auth::id() == 1)
                                            @hasanyrole('admin|editor|subeditor')
                                                <a href="{{ route('admin.edit.user', $user->id) }}" class="bg-gray-800 px-4 py-1 rounded-full text-white font-extrabold">...</a>
                                            @endhasanyrole
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app-layout>
