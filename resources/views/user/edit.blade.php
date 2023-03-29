<x-app-layout>


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ ucfirst(__('edit'))." ".$user->name }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $user->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $user->updated_at}}</strong></div>
        </div>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

            <form method="POST" action="{{ route('user.update',$user->id) }}">
                @method("PATCH")
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <!-- Insurance Carrier -->
                    <div>
                        <x-input-label for="name" :value="ucfirst(__('user name'))" />
                        <input name="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $user->name }}">
                        @error('name')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>	
                    
                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="ucfirst(__('email'))" />
                        <input name="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $user->email }}">
                        @error('email')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>	                    

                    <!-- role -->
                    <div>
                        <x-input-label for="role" :value="ucfirst(__('role'))" />
                        <select name="role" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{ $user->role_id == $role->id ? "selected" : "" }} class=""> {{$role->name}}</option>
                            @endforeach
                        </select>@error('role')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="flex items-center justify-start mt-4">
                    <a href="{{ route('user.index')}}" class="mx-5 px-6 py-3 text-white-800 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        {{ucfirst(__('cancel'))}}
                    </a>
                    <button type="submit" class="mx-5 px-6 py-3 text-white-800 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        {{ucfirst(__('save'))}}
                    </button>
                </div>

            </form>
        </div>
        
    </div>

</x-app-layout>