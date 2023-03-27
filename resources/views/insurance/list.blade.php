<x-app-layout>

    <x-slot name="scriptjs">
        <script>
            function clickOnRow(id) {
                window.location.href = "{{ route('insurance.index') }}/" + id;
            }
        </script>
    </x-slot>

    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Insurances') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container max-w-6xl mx-auto mt-2 mb-2">
            @if (session()->has('message'))
            <div class="p-3 rounded bg-green-500 text-green-100 my-2">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex justify-end m-2">
                <a href="{{ route('insurance.create')}}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">Add Insurance</a>
            </div>

            <div class="flex flex-col m-2">
                <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        ID</th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('car') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('car license') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('insurance_carrier') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('insurance_number') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('due_date') }}
                                    </th>
                                    
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('documents') }}
                                    </th>
                                    <th class="text-center px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" x-data="">
                                @foreach ($insurances as $insurance)
                                <tr x-data=" { insuranceId: {{$insurance->id}} } " class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">
                                    <td @click="clickOnRow(insuranceId)" class="py-4 px-6 cursor-pointer"> {{ $insurance->id }} </td>
                                    <td @click="clickOnRow(insuranceId)" class="py-4 px-6 cursor-pointer"> {{ $insurance->car_name }} </td>
                                    <td @click="clickOnRow(insuranceId)" class="py-4 px-6 cursor-pointer"> {{ $insurance->car_license}} </td>
                                    <td @click="clickOnRow(insuranceId)" class="py-4 px-6 cursor-pointer"> {{ $insurance->insurance_carrier }} </td>
                                    <td @click="clickOnRow(insuranceId)" class="py-4 px-6 cursor-pointer"> {{ $insurance->insurance_number }} </td>
                                    <td @click="clickOnRow(insuranceId)" class="py-4 px-6 cursor-pointer"> {{ date("d/m/Y", strtotime($insurance->due_date)) }} </td>                                    
                                    <td class="py-4 px-6">
                                        @if(count($insurance->documents) > 0)
                                        @foreach($insurance->documents as $document)
                                        <div class="text-xs text-gray-700">
                                            @if($document->mime_type == "application/pdf")
                                            <i class="fa-regular fa-file-pdf text-black">
                                            @elseif(($document->mime_type == "image/png")||$document->mime_type == "image/jpg")
                                            <i class="fa-regular fa-file-image text-black">
                                            @else
                                            <i class="fa-regular fa-file text-black">
                                            @endif
                                            </i>
                                            <a class="hover:text-red-600" href="{{ asset('storage/documents/insurance/'. $document->name) }}" target="_blank"> {{ Str::limit($document->file_name,20,'...')}} </a>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="text-xs text-gray-700">
                                            {{ ucfirst(__('no documents')) }}
                                        </div>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <form class="inline" action="{{ route('car.destroy',$insurance) }}" method="post" onsubmit="if(!confirm('Do you really want to delete this car?')){return false;}">
                                            @method("DELETE")
                                            @csrf
                                            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"> <i class="fas fa-light fa-trash text-red-500"></i> </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>