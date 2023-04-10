<x-webapp-layout>
    <x-slot name="header">
        {{ __('Cars') }} / {{ $car->name }}
    </x-slot>

    <x-panel>
        <h1>Panel 1</h1>
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
    </x-panel>

    <x-panel span="2">

        <div class="md:basis-1/2 sm:basis-1 text-gray-400 ">ID: <strong>{{ $car->id}}</strong></div>
        <div class="md:basis-1/2 sm:basis-1 text-gray-400">{{__('Modified at')}}: <strong>{{ $car->updated_at}}</strong></div>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('name')) }}: </strong>{{ $car->name }}</div>
            <div class="md:basis-1/2 sm:basis-1 px-4 py-5"><strong>{{ ucfirst(__('car license')) }}:</strong> {{ $car->car_license }}</div>
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
    </x-panel>



</x-webapp-layout>