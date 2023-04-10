<x-webapp-layout>

    <x-slot name="scriptjs">
        <script>
            function clickOnRow(id) {
                window.location.href = "{{ route('user.index') }}/" + id;
            }
        </script>
    </x-slot>

    <x-slot name="header">
        {{ __('Users') }}
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
                        {{ __('name') }}
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        {{ __('email') }}
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        {{ __('roles') }}
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        {{ __('email_verified_at') }}
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        {{ __('updated_at') }}
                    </th>
                    <th class="text-center px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white" x-data="">
                @foreach ($users as $user)
                <tr x-data=" { userId: {{$user->id}} } " class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">
                    <td @click="clickOnRow(userId)" class="py-4 px-6 cursor-pointer"> {{ $user->id }} </td>
                    <td @click="clickOnRow(userId)" class="py-4 px-6 cursor-pointer"> {{ $user->name }} </td>
                    <td @click="clickOnRow(userId)" class="py-4 px-6 cursor-pointer"> {{ $user->email }} </td>
                    <td @click="clickOnRow(userId)" class="py-4 px-6 cursor-pointer"> {{ $user->role }} </td>
                    <td @click="clickOnRow(userId)" class="py-4 px-6 cursor-pointer"> {{ $user->email_verified_at }} </td>
                    <td @click="clickOnRow(userId)" class="py-4 px-6 cursor-pointer"> {{ $user->updated_at }} </td>
                    <td class="py-4 px-6 text-center">
                        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"> <i class="fas fa-light fa-trash text-blue-500"></i> </button>
                        <form class="inline" action="{{ route('user.destroy',$user) }}" method="post" onsubmit="if(!confirm('Do you really want to delete this user?')){return false;}">
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