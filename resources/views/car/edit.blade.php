<x-app-layout>
    <x-slot name="scriptjs">
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('uploadfile', () => ({
                    files: null,
                    submitButton() {
                        //console.log(this.files);                 
                        //alert(JSON.stringify(this.files.name));
                        let url = " {{ route('upload') }}";

                        const data = new FormData();
                        data.append("file", this.files);
                        data.append("type", "car");
                        data.append("id", "{{ $car->id}}");

                        console.log(this.files);

                        fetch(url, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: data
                            })
                            .then((res) => {
                                location.reload();
                            })
                            .catch((error) => {
                                console.log(error);
                            })

                        return false;
                    },

                }))
            });

            document.addEventListener('alpine:init', () => {
                Alpine.data('manageFiles', () => ({
                    files: null,
                    deleteFile(id) {

                        if (confirm("{{__('Do you really want to remove this document?')}}") == true) {
                            let url = " {{ route('document.destroy', ':id') }}";
                            url = url.replace(":id", id);

                            fetch(url, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                            }).then((res) => {
                                location.reload();
                            }).catch((error) => {
                                console.log(error);
                            });
                        }

                    }
                }))
            });
        </script>
    </x-slot>

    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ ucfirst(__('edit'))." ".$car->name }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $car->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $car->updated_at}}</strong></div>
        </div>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

            <form method="POST" action="{{ route('car.update',$car->id) }}">
                @method("PATCH")
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="ucfirst(__('name'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" placeholder="180" value="{{ $car->name}}">
                        @error('name')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Car license -->
                    <div>
                        <x-input-label for="car_license" :value="ucfirst(__('car license'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="car_license" placeholder="180" value="{{ $car->car_license }}">
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
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="desc" placeholder="180" value="{{ $car->desc }}">
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
                                <input datepicker datepicker-format="yyyy/mm/dd" data-date="{{ date('Y/m/d', strtotime($car->first_purchase_date )) }}" name="first_purchase_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ ucfirst(__('select date')) }}" value="{{ date('Y/m/d', strtotime($car->first_purchase_date )) }}" />
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
                                <input datepicker datepicker-format="yyyy/mm/dd" data-date="{{ date('Y/m/d', strtotime($car->purchase_date )) }}" name="purchase_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ ucfirst(__('select date')) }}" value="{{ date('Y/m/d', strtotime($car->purchase_date )) }}" />
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
                    <a href="{{ route('car.index')}}" class="mx-5 px-6 py-3 text-white-800 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        {{ucfirst(__('cancel'))}}
                    </a>
                    <button type="submit" class="mx-5 px-6 py-3 text-white-800 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        {{ucfirst(__('save'))}}
                    </button>
                </div>

            </form>
        </div>
        <div class="w-full mt-4 px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

            <div class="mt-8">
                <div class="p-4">
                    <h2> {{ ucfirst(__('documents')) }} </h2>
                </div>
                <div class="p-4 grid grid-cols-3 gap-2">
                    @if (count($documents) > 0)
                        @foreach($documents as $document)
                        <div class="p-4 rounded shadow-md ring-1 ring-gray-300 text-gray-500" x-data="manageFiles">
                            @if($document->mime_type == "application/pdf")
                            <i class="fa-regular fa-file-pdf text-black"></i> {{ ucfirst(__('PDF document')) }}
                            @elseif(($document->mime_type == "image/png")||$document->mime_type == "image/jpg")
                            <i class="fa-regular fa-file-image text-black"></i> {{ ucfirst(__('image')) }}
                            @else
                            <i class="fa-regular fa-file text-black"></i> {{ ucfirst(__('file')) }}
                            @endif
                            <button @click="deleteFile({{$document->id}})" class="rounded-full bg-red-200 px-2 text-red-800 hover:bg-red-800 hover:text-red-200">
                                X
                            </button>
                            <div class="text-black">
                                {{ Str::limit($document->file_name,15,'...') }}
                            </div>
                        </div>
                        @endforeach
                    @else
                        {{ ucfirst(__('no documents')) }}
                    @endif
                </div>
            </div>

            <!-- Upload files -->
            <div class="flex mt-10 mb-4" x-data="uploadfile">
                <div class="flex-auto">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">{{ __('Upload file') }}</label>
                    <input x-on:change="files = $event.target.files[0]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                </div>
                <div class="mt-5 flex-auto">
                    <button @click="submitButton()" class="mx-5 px-6 py-3 text-white-800 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        <i class="fa-solid fa-upload"></i> {{ ucfirst(__('upload')) }}
                    </button>
                </div>

            </div>



        </div>
    </div>

</x-app-layout>