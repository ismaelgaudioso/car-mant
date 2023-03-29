<x-app-layout>

	<x-slot name="scriptjs">
		<script>
			function clickOnRow(id) {
				window.location.href = "{{ route('user.index') }}/" + id;
			}

		</script>
	</x-slot>

	<x-slot name="header">
		<div class="lg:flex lg:items-center lg:justify-between">
			<div class="min-w-0 flex-1">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					{{ __('Users') }}
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
				<a href="{{ route('user.create')}}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">Add User</a>
			</div>

			<div class="flex flex-col m-2">
				<div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
					<div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

					</div>
				</div>
			</div>
		</div>
	</div>




</x-app-layout>