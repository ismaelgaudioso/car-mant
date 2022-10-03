<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Cars') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">
        
        <div class="mb-4">
            <h1 class="text-3xl font-bold">Create Car</h1>
        </div>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="{{ route('car.store') }}">
                @csrf
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="title">
                        {{ ucfirst(__('name')) }}
                    </label>

                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" placeholder="180" value="{{old('title')}}">
                    @error('name')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <!-- Description -->
                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="title">
                        {{ ucfirst(__('description')) }}
                    </label>

                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="desc" placeholder="180" value="{{old('title')}}">
                    @error('desc')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <!-- Car license -->
                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="title">
                        {{ ucfirst(__('car license')) }}
                    </label>

                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="car_license" placeholder="180" value="{{old('title')}}">
                    @error('car_license')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <!-- First purchase date -->
                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="title">
                        {{ ucfirst(__('first purchase date')) }}
                    </label>

                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="first_purchase_date" placeholder="180" value="{{old('title')}}">
                     @error('firs_purchase_date')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <!-- Purchase date -->
                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="title">
                        {{ ucfirst(__('Purchase date')) }}
                    </label>
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="purchase_date" placeholder="180" value="{{old('title')}}">
                    @error('purchase_date')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                


                <div class="flex items-center justify-start mt-4">
                    <button type="submit" class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>