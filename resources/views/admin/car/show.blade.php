<x-webapp-layout>
    <x-slot name="header">
        {{ __('Cars') }} / {{ $car->name }}
    </x-slot>

    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{route('dashboard')}}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{route('car.index')}}" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Garage</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{route('car.show',['car'=>$car->id])}}" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{$car->name}}</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ $car->name}}</h1>

                <div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" />

                    <h2> {{ ucfirst(__('documents')) }} </h2>


                    <ul>
                        @if (count($documents) > 0)

                        @foreach($documents as $document)
                        <li>
                            <a class="hover:text-gray-500" href="{{ asset('storage/documents/car/'. $document->name) }}" target="_blank">
                                @if($document->mime_type == "application/pdf")
                                <i class="fa-regular fa-file-pdf"></i>
                                @elseif(($document->mime_type == "image/png")||$document->mime_type == "image/jpg")
                                <i class="fa-regular fa-file-image"></i>
                                @else
                                <i class="fa-regular fa-file"></i>
                                @endif
                                {{ Str::limit($document->file_name,15,'...') }}
                            </a>
                        </li>
                        @endforeach
                        @else
                        <li>{{ ucfirst(__('no documents')) }}</li>
                        @endif
                    </ul>

                </div>

                <div>

                    <div class="md:basis-1/2 sm:basis-1 text-gray-400 ">ID: <strong>{{ $car->id}}</strong></div>
                    <div class="md:basis-1/2 sm:basis-1 text-gray-400">{{__('Modified at')}}: <strong>{{ $car->updated_at}}</strong></div>

                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                        <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('name')) }}: </strong>{{ $car->name }}</div>
                        <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('car license')) }}:</strong> {{ $car->car_license }}</div>
                        <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('Fuel type')) }}:</strong> {{ $car->fuel_type }}</div>
                        <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('First purchase date')) }}: </strong>{{ date("d/m/Y", strtotime($car->first_purchase_date )) }}</div>
                        <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('Purchase date')) }}:</strong> {{ date("d/m/Y", strtotime($car->purchase_date )) }}</div>
                        <div class="px-4 py-5"><strong>{{ ucfirst(__('Description')) }}: </strong>{{ $car->desc }}</div>
                    </div>

                    <div class="grid grid-cols-4 gap-2">
                        <!-- Actions -->

                        <a href="{{ route('car.edit',$car) }}" class="col-end-4 text-center mx-5 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('edit')) }}</a>


                        <form class="col-end-5" action="{{ route('car.destroy',$car) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('delete')) }}</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>



</x-webapp-layout>