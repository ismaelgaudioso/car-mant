<x-webapp-layout>

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
                        data.append("type", "insurance");
                        data.append("id", "{{ $insurance->id}}");

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
        {{ ucfirst(__('edit')) }} {{ $insurance->carrier_name }} - {{$car->name}} ({{$car->car_license}})
    </x-slot>

    @if (session()->has('message'))
    <x-panel span="3">
        <div class="p-3 rounded bg-green-500 text-green-100 my-2">
            {{ session('message') }}
        </div>
    </x-panel>
    @endif

    @if($errors->any())
    <x-panel span="3">
        <div class="p-3 rounded bg-red-500 text-red-100 my-2">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </x-panel>
    @endif

    <x-panel span="2">

        <div class="flex flex-row">
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $insurance->id}}</strong></div>
            <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $insurance->updated_at}}</strong></div>
        </div>

        <form method="POST" action="{{ route('insurance.update',$insurance->id) }}">
            @method("PATCH")
            @csrf

                 <!-- insurance_carrier -->
                <div>
                    <x-input-label for="insurance_carrier" :value="ucfirst(__('insurance carrier'))" />
                    <input name="insurance_carrier" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $insurance->insurance_carrier }}">
                    @error('insurance_carrier')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Insurance number -->
                <div>
                    <x-input-label for="insurance_number" :value="ucfirst(__('Insurance number'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="insurance_number" value="{{$insurance->insurance_number}}">
                    @error('insurance_number')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Phone number -->
                <div>
                    <x-input-label for="phone" :value="ucfirst(__('phone'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="phone" value="{{$insurance->phone}}">
                    @error('phone')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <x-input-label for="price" :value="ucfirst(__('price'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="price" value="{{$insurance->price}}">
                    @error('price')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Cars -->
                <div>
                    <x-input-label for="car_id" :value="ucfirst(__('car'))" />
                    <select name="car_id" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($cars as $c)
                        <option value="{{$c->id}}" {{ $insurance->car_id == $c->id ? "selected" : "" }} class=""> {{$c->name}}</option>
                        @endforeach
                    </select>@error('car_id')
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
                        <input datepicker datepicker-format="yyyy/mm/dd" name="due_date" value="{{ date('Y/m/d', strtotime($insurance->due_date )) }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Select date')}}" />
                    </div>
                    @error('firs_purchase_date')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Coverage -->
                <div class="col-span-2">
                    <x-input-label for=" coverage" :value="ucfirst(__('coverage'))" />
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="coverage" value="{{$insurance->coverage}}">
                    @error('coverage')
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

    </x-panel>

    <x-panel>
        <h2> {{ ucfirst(__('documents')) }} </h2>

        <ul>
            @if(count($documents) > 0)
            @foreach($documents as $document)
            <li x-data="manageFiles">
                @if($document->mime_type == "application/pdf")
                <i class="fa-regular fa-file-pdf text-black"></i> 
                @elseif(($document->mime_type == "image/png")||$document->mime_type == "image/jpg")
                <i class="fa-regular fa-file-image text-black"></i>
                @else
                <i class="fa-regular fa-file text-black"></i>
                @endif

                <span> {{ Str::limit($document->file_name,15,'...') }} </span>
                <button @click="deleteFile({{$document->id}})"><i class="fas fa-light fa-trash text-red-500"></i></button>
                          
            </li>
            @endforeach
            @else
            <li>{{ ucfirst(__('no documents')) }}</li>
            @endif
        </ul>
    </x-panel>

    <x-panel span="3">
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
    </x-panel>



</x-webapp-layout>