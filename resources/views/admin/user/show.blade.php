<x-webapp-layout>
	<x-slot name="header">
		{{ __('User') }}
	</x-slot>

	@if (session()->has('message'))
	<x-panel span="3">
		<div class="p-3 rounded bg-green-500 text-green-100 my-2">
			{{ session('message') }}
		</div>
	</x-panel>
	@endif

	<x-panel span="3">

		<strong>{{ ucfirst(__('user')) }}: {{$user->name}} ({{$user->email}})</strong>



		<div class="flex flex-row">
			<div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $user->id}}</strong></div>
			<div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $user->updated_at}}</strong></div>
		</div>

		<div class="grid grid-cols-2 gap-4">

			<!-- Insurance Carrier -->
			<div>
				<x-input-label for="name" :value="ucfirst(__('user name'))" />
				<input disabled name="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $user->name }}">
			</div>

			<!-- Email -->
			<div>
				<x-input-label for="email" :value="ucfirst(__('email'))" />
				<input disabled name="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $user->email }}">
			</div>

			<!-- email_verified_at -->
			<div>
				<x-input-label for="email_verified_at" :value="ucfirst(__('email verified'))" />
				<input disabled name="email_verified_at" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $user->email_verified_at }}">
			</div>

			<!-- email_verified_at -->
			<div>
				<x-input-label for="email_verified_at" :value="ucfirst(__('email verified'))" />
				<input disabled name="email_verified_at" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $user->email_verified_at }}">
			</div>

			<!-- role -->
			<div>
				<x-input-label for="role" :value="ucfirst(__('role'))" />
				<input disabled name="role" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $role->name }}">
			</div>

		</div>

		<div class="flex flex-row">
			<!-- Actions -->
			<div class="px-4 py-5">
				<a href="{{ route('user.edit',$user) }}" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('edit')) }}</a>
				<a href="{{ route('password.update') }}" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('reset password')) }}</a>
				<form class="inline" action="{{ route('user.destroy',$user) }}" method="post">
					@method("DELETE")
					@csrf
					<button type="submit" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('delete')) }}</button>
				</form>
			</div>
		</div>

	</x-panel>

</x-webapp-layout>