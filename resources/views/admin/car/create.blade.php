<x-webapp-layout>
    <x-slot name="header">
        {{ __('Add a car') }}
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
        <form method="POST" action="{{ route('car.store') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="ucfirst(__('name'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" placeholder="{{__('Car name')}}" value="{{old('name')}}">

                    @error('name')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Car license -->
                <div>
                    <x-input-label for="car_license" :value="ucfirst(__('car license'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="car_license" placeholder="{{__('Car license plate')}}" value="{{old('car_license')}}">
                    @error('car_license')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <!-- Description -->
            <div class="mt-2">
                <x-input-label for="desc" :value="ucfirst(__('desc'))" />
                <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="desc" placeholder="{{__('Car description')}}" value="{{old('desc')}}">
                @error('desc')
                <span class="text-red-600 text-sm">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mt-2">
                <div>
                    <!-- First purchase date -->
                    <div class="mt-2">
                        <x-input-label for="first_purchase_date" :value="ucfirst(__('first purchase date'))" />
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy/mm/dd" name="first_purchase_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Select date')}}" value="{{old('first_purchase_date')}}" />
                        </div>
                        @error('firs_purchase_date')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- Purchase date -->
                <div>
                    <div class="mt-2">
                        <x-input-label for="purchase_date" :value="ucfirst(__('purchase date'))" />
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy/mm/dd" name="purchase_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Select date')}}" value="{{old('purchase_date')}}" />
                        </div>
                        @error('purchase_date')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

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