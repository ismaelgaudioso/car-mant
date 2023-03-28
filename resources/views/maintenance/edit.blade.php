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
                        data.append("type", "maintenance");
                        data.append("id", "{{ $maintenance->id}}");

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
                    {{ ucfirst(__('edit'))." ".$maintenance->name }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">
        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $maintenance->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $maintenance->updated_at}}</strong></div>
        </div>
        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="{{ route('maintenance.update',$maintenance->id) }}">
                @method("PATCH")
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <!-- Details -->
                    <div>
                        <x-input-label for="details" :value="ucfirst(__('details'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="details" placeholder="180" value="{{$maintenance->details}}">
                        @error('details')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Cars -->
                    <div>
                        <x-input-label for="car_id" :value="ucfirst(__('car'))" />
                        <select name="car_id" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($cars as $car)
                            <option value="{{$car->id}}" {{ $maintenance->car_id == $car->id ? "selected" : "" }} class=""> {{$car->name}}</option>
                            @endforeach
                        </select>@error('car_id')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Maintenance type -->
                    <div>
                        <x-input-label for="maintenance_type" :value="ucfirst(__('maintenance type'))" />
                        <select name="maintenance_type" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="periodic" {{ $maintenance->maintenance_type == "periodic" ? "selected" : "" }}>{{ucfirst(__("periodic"))}}</option>
                            <option value="extraordinary" {{ $maintenance->maintenance_type == "extraordinary" ? "selected" : "" }}>{{ucfirst(__("extraordinary"))}}</option>
                        </select>
                        @error('maintenance_type')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <x-input-label for="price" :value="ucfirst(__('price'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="price" placeholder="180" value="{{$maintenance->price}}">
                        @error('maintenance_type')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="kilometers" :value="ucfirst(__('kilometers'))" />
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="kilometers" placeholder="{{ucfirst(__('kilometers'))}}" value="{{$maintenance->kilometers}}">
                        @error('kilometers')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="maintenance_date" :value="ucfirst(__('maintenance date'))" />
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy/mm/dd" data-date="{{ date('Y/m/d', strtotime($maintenance->maintenance_date )) }}" value="{{ date('Y/m/d', strtotime($maintenance->maintenance_date )) }}" name="maintenance_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                        @error('maintenance_date')
                        <span class="text-red-600 text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>


                <div class="flex items-center justify-start mt-4">
                    <button type="submit" class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        Save
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
                    @if(count($documents) > 0)
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