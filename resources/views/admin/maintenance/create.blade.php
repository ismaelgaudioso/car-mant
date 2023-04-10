<x-webapp-layout>
    <x-slot name="header">
        {{ __('Add a maintenance') }}
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

        <form method="POST" action="{{ route('admin/maintenance.store') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <!-- Details -->
                <div>
                    <x-input-label for="details" :value="ucfirst(__('details'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="details" placeholder="{{ucfirst(__('details'))}}" value="{{old('details')}}">
                    @error('details')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Cars -->
                <div>
                    <x-input-label for="car_id" :value="ucfirst(__('cars'))" />
                    <select name="car_id" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($cars as $car)
                        <option value="{{$car->id}}">{{$car->name}}</option>
                        @endforeach
                    </select>
                    @error('car_id')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Maintenance type -->
                <div>
                    <x-input-label for="maintenance_type" :value="ucfirst(__('maintenance type'))" />
                    <select name="maintenance_type" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="periodic">{{ucfirst(__("periodic"))}}</option>
                        <option value="extraordinary">{{ucfirst(__("extraordinary"))}}</option>
                    </select>
                    @error('maintenance_type')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <x-input-label for="price" :value="ucfirst(__('price'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="price" placeholder="0" value="{{old('price')}}">
                    @error('price')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div>
                    <x-input-label for="kilometers" :value="ucfirst(__('kilometers'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="kilometers" placeholder="{{ucfirst(__('kilometers'))}}" value="{{old('kilometers')}}">
                    @error('kilometers')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <x-input-label for="maintenance_date" :value="ucfirst(__('maintenance date'))" />
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy/mm/dd" type="text" name="maintenance_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div>
                    @error('maintenance_date')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

            </div>


            <div class="flex items-center justify-start mt-4">
                <button type="submit" class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                    {{ ucfirst(__('create')) }}
                </button>
            </div>

        </form>
    </x-panel>

</x-webapp-layout>