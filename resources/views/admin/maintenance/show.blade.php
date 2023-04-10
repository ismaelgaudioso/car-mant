<x-webapp-layout>
    <x-slot name="header">
        {{ucfirst(__('maintenance'))}}
    </x-slot>

    <x-panel span="2">

        <div>
            <strong>{{ucfirst($car->name)}}:</strong> {{ ucfirst(__('maintenance')) }} {{$maintenance->kilometers}} kms. ({{date("d/m/Y", strtotime($maintenance->maintenance_date )) }})
        </div>

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $maintenance->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $maintenance->updated_at}}</strong></div>
        </div>

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 p-2">
                <strong> {{ ucfirst(__('details')) }}:</strong>
                {{ $maintenance->details }}
            </div>
        </div>

        <div>
            <div class="md:basis-1/2 sm:basis-1 p-2">
                <strong> {{ ucfirst(__('car')) }}:</strong>
                {{ $car->name }}
            </div>
            <div class="md:basis-1/2 sm:basis-1 p-2">
                <strong> {{ ucfirst(__('maintenance date')) }}:</strong>
                {{date("d/m/Y", strtotime($maintenance->maintenance_date )) }}
            </div>
            <div class="md:basis-1/2 sm:basis-1 p-2">
                <strong> {{ ucfirst(__('price')) }}:</strong>
                {{ $maintenance->price }}€
            </div>
            <div class="md:basis-1/2 sm:basis-1 p-2">
                <strong> {{ ucfirst(__('kilometers')) }}:</strong>
                {{ $maintenance->kilometers }} Kms.
            </div>
        </div>

        <div class="flex flex-row">
            <!-- Actions -->
            <div class="px-4 py-5">
                <a href="{{ route('admin/maintenance.edit',$maintenance) }}" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('edit')) }}</a>
                <form class="inline" action="{{ route('admin/maintenance.destroy',$maintenance) }}" method="post">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('delete')) }}</button>
                </form>
            </div>
        </div>


    </x-panel>

    <x-panel>
        <div class="p-4">
            <h2> {{ ucfirst(__('documents')) }} </h2>
        </div>
        <ul>
            @if (count($documents) > 0)
            @foreach($documents as $document)
            <li>
                <a class="hover:text-gray-500" href="{{ asset('storage/documents/maintenance/'. $document->name) }}" target="_blank">

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
            {{ ucfirst(__('no documents')) }}
            @endif
        </ul>
    </x-panel>

</x-webapp-layout>