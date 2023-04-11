<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href="#" title="home">
                <img src="{{asset('images/logo.png')}}" class="w-32 ml-10" alt="mygaragehq logo">
            </a>
        </div>

        <ul class="space-y-2 tracking-wide mt-8">
            <li>
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                        <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                        <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-sky-300"></path>
                    </svg>
                    <span class="group-hover:text-gray-700">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('maintenance.index')" :active="request()->routeIs('maintenance.*')">
                    <i class="fa-solid fa-screwdriver-wrench fill-current text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">{{ __('Maintenances') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('insurance.index')" :active="request()->routeIs('insurance.*')">
                    <i class="fa-solid fa-car-burst fill-current text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">{{ __('Insurances') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('insurance.index')" :active="request()->routeIs('report.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>
                    <span class="group-hover:text-gray-700">{{ __('Reports') }}</span>
                </x-sidebar-link>
            </li>
        </ul>

        @if(Auth::user()->isAdministrator())

        <ul class="mt-10 space-y-2 tracking-wide mt-8">
            <li>
                <div class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    {{ strtoupper(__('Admin tools')) }}
                </div>
            </li>
            <li>
                <x-sidebar-link :href="route('car.index')" :active="request()->routeIs('car.*')">
                    <i class="fa-solid fa-car fill-current text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">{{ __('Cars') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('admin/maintenance.index')" :active="request()->routeIs('admin/maintenance.*')">
                    <i class="fa-solid fa-screwdriver-wrench fill-current text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">{{ __('Maintenances') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('admin/insurance.index')" :active="request()->routeIs('admin/insurance.*')">
                    <i class="fa-solid fa-car-burst fill-current text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">{{ __('Insurances') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('user.index')" :active="request()->routeIs('user.*')">
                    <i class="fa-solid fa-users fill-current text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700">{{ __('Users') }}</span>
                </x-sidebar-link>
            </li>
        </ul>

        @endif

    </div>

    <div class="px-6 -mx-6 pt-4 justify-between items-center border-t">
        <div class="px-4 py-3 items-center rounded-md text-gray-600 group">
            <div> {{ Auth::user()->name }} </div>
            <div class="text-xs text-gray-500">(
                @if( Auth::user()->isAdministrator() )
                {{ ucfirst(__('administrator')) }}
                @else
                {{ ucfirst(__('user')) }}
                @endif
                )
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="group-hover:text-gray-700">{{ __('Log Out') }}</span>
            </button>
        </form>
    </div>
</aside>