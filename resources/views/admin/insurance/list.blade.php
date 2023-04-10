<x-webapp-layout>

    <x-slot name="scriptjs">
        <script>
            function clickOnRow(id) {
                window.location.href = "{{ route('admin/insurance.index') }}/" + id;
            }
        </script>
    </x-slot>

    <x-slot name="header">
        {{ __('Insurances') }}
    </x-slot>

    @if (session()->has('message'))
    <x-panel span="3">
        <div class="p-3 rounded bg-green-500 text-green-100 my-2">
            {{ session('message') }}
        </div>
    </x-panel>
    @endif

    <x-panel span="3">
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
                        {{ __('carrier') }}
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        {{ __('i.number') }}
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
                        <form class="inline" action="{{ route('insurance.destroy',$insurance) }}" method="post" onsubmit="if(!confirm('Do you really want to delete this insurance?')){return false;}">
                            @method("DELETE")
                            @csrf
                            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"> <i class="fas fa-light fa-trash text-red-500"></i> </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end m-2">
            <a href="{{ route('admin/insurance.create')}}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600"><i class="fa-solid fa-plus"></i> {{__('Add a insurance')}}</a>
        </div>
    </x-panel>




</x-webapp-layout>