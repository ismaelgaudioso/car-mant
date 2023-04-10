<x-webapp-layout>


    <x-slot name="header">
        {{ ucfirst(__('edit'))." ".$user->name }}
    </x-slot>

    @if (session()->has('message'))
    <x-panel span="3">
        <div class="p-3 rounded bg-green-500 text-green-100 my-2">
            {{ session('message') }}
        </div>
    </x-panel>
    @endif

    @if($errors->any())
    <x-panel span="3">
        <div class="p-3 rounded bg-red-500 text-red-100 my-2">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </x-panel>
    @endif

    <x-panel span="3">

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $user->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $user->updated_at}}</strong></div>
        </div>

       
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
    </x-panel>

</x-webapp-layout>