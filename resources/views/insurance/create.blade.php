<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add a Insurances') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

        <div class="container max-w-6xl mx-auto mt-2 mb-2">
            @if (session()->has('message'))
            <div class="p-3 rounded bg-green-500 text-green-100 my-2">
                {{ session('message') }}
            </div>
            @endif

            @if($errors->any())
            <div class="p-3 rounded bg-red-500 text-red-100 my-2">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="{{ route('insurance.store') }}">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <!-- Insurance Carrier -->
                    <div>
                        <x-input-label for="insurance_carrier" :value="ucfirst(__('insurance carrier'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="insurance_carrier" placeholder="{{__('Insurance carrier name')}}" value="{{old('insurance_carrier')}}">

                        @error('insurance_carrier')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Insurance number -->
                    <div>
                        <x-input-label for="insurance_number" :value="ucfirst(__('Insurance number'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="insurance_number" placeholder="{{__('Insurance number')}}" value="{{old('insurance_number')}}">
                        @error('insurance_number')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Phone number -->
                    <div>
                        <x-input-label for="phone" :value="ucfirst(__('phone'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="phone" placeholder="{{__('phone')}}" value="{{old('phone')}}">
                        @error('phone')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                     <!-- Price -->
                    <div class="mt-2">
                        <x-input-label for="price" :value="ucfirst(__('price'))" />                    
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="price" placeholder="{{__('price')}}" value="{{old('price')}}">
                        @error('price')
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

                    <!-- Due date -->
                    <div>
                            <x-input-label for="due_date" :value="ucfirst(__('due date'))" />
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input datepicker datepicker-format="yyyy/mm/dd" name="due_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Select date')}}" value="{{old('due_date')}}" />
                            </div>
                            @error('firs_purchase_date')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>
                    
                </div>
                <!-- Coverage -->
                <div>
                    <x-input-label for="coverage" :value="ucfirst(__('coverage'))" />                    
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="coverage" placeholder="{{__('Coverage')}}" value="{{old('coverage')}}">
                    @error('coverage')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div> 

                <div class="flex items-center justify-start mt-4">
                    <button type="submit" class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        {{ ucfirst(__('create')) }}
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>