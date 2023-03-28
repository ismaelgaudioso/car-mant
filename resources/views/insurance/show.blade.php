<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <strong>{{ucfirst($insurance->insurance_carrier)}} - {{$car->name}} ({{$car->car_license}})</strong>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $insurance->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $insurance->updated_at}}</strong></div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

            <div class="grid grid-cols-2 gap-4">

                <!-- Insurance Carrier -->
                <div>
                    <x-input-label for="insurance_carrier" :value="ucfirst(__('insurance carrier'))" />
                    <input disabled name="insurance_carrier" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $insurance->insurance_carrier }}">
                </div>

                <!-- Insurance number -->
                <div>
                    <x-input-label for="insurance_number" :value="ucfirst(__('Insurance number'))" />
                    <input disabled name="insurance_number" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$insurance->insurance_number}}">
                </div>

                <!-- Phone number -->
                <div>
                    <x-input-label for="phone" :value="ucfirst(__('phone'))" />
                    <input disabled name="phone" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$insurance->phone}}">

                </div>

                <!-- Price -->
                <div>
                    <x-input-label for="price" :value="ucfirst(__('price'))" />
                    <input disabled name="price" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$insurance->price}}">
                </div>

                <!-- Cars -->
                <div>
                    <x-input-label for="car_id" :value="ucfirst(__('car'))" />
                    <input disabled name="car_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$car->name}} ({{$car->car_license}})">
                </div>  

                <!-- Due date -->
                <div>
                    <x-input-label for="due_date" :value="ucfirst(__('due date'))" />
                    <input disabled name="due_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ date('d/m/Y', strtotime($insurance->due_date)) }} ">               
                </div>

                 <!-- Coverage -->
                 <div class="col-span-2">
                    <x-input-label for="coverage" :value="ucfirst(__('coverage'))" />
                    <input disabled name="coverage" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $insurance->coverage }} ">                               
                </div>
            </div>


        

        <div class="flex flex-row">
            <!-- Actions -->
            <div class="px-4 py-5">
                <a href="{{ route('insurance.edit',$insurance) }}" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('edit')) }}</a>
                <form class="inline" action="{{ route('insurance.destroy',$insurance) }}" method="post">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('delete')) }}</button>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

        <div class="mt-8">
            <div class="p-4">
                <h2> {{ ucfirst(__('documents')) }} </h2>
            </div>
            <div class="p-4 grid grid-cols-3 gap-2">
                @if (count($documents) > 0)
                @foreach($documents as $document)
                <a href="{{ asset('storage/documents/insurance/'. $document->name) }}" target="_blank">
                    <div class="p-4 rounded shadow-md ring-1 ring-gray-300 text-gray-500">
                        @if($document->mime_type == "application/pdf")
                        <i class="fa-regular fa-file-pdf text-black"></i> {{ ucfirst(__('PDF document')) }}
                        @elseif(($document->mime_type == "image/png")||$document->mime_type == "image/jpg")
                        <i class="fa-regular fa-file-image text-black"></i> {{ ucfirst(__('image')) }}
                        @else
                        <i class="fa-regular fa-file text-black"></i>
                        <!-- ID:{{ $document->id }} - {{ $document->name }} --> {{ ucfirst(__('file')) }}
                        @endif
                        <div class="text-black">
                            {{ Str::limit($document->file_name,15,'...') }}
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                {{ ucfirst(__('no documents')) }}
                @endif
            </div>
        </div>

    </div>

</x-app-layout>