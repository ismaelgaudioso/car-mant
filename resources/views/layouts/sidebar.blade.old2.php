<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-3 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href="#" title="home">
                <img src="{{asset('images/logo.png')}}" class="w-32 ml-10" alt="mygaragehq logo">
            </a>
        </div>

        <x-sidebar-link :href="route('garage')" :active="request()->routeIs('garage')" class="text-sm">
            <i class="fa-solid fa-gauge w-5"></i>
            {{ __('Dashboard') }}     
        </x-sidebar-link>

        <div class="mt-4 text-sm">
            <div class="px-4 py-3 text-gray-400">
                {{ __('Vehicles') }}
            </div>

            <x-sidebar-link :href="route('garage.car',['car'=>1])" :active="(url()->current() == route('garage.car', ['car'=> 1]))?true:false" class="text-sm">
                <i class="fa-solid fa-car w-5"></i> <span class="">Opel Zafira</span> <span class="text-xs">(1990HNR)</span>
            </x-sidebar-link>

            <x-sidebar-link :href="route('garage.car',['car'=>2])" :active="(url()->current() == route('garage.car', ['car'=> 2]))?true:false" class="text-sm">
                <i class="fa-solid fa-car car w-5"></i> <span class="">Toyota Aygo</span> <span class="text-xs">(4204GFC)</span>
            </x-sidebar-link>

            <x-sidebar-link :href="route('garage')" :active="request()->routeIs('dashboard')" class="text-sm">
                <i class="fa-solid fa-chart-simple w-5"></i> <span class="">{{ __('Global Reports') }} </span>
            </x-sidebar-link>            
        </div>

        <div class="mt-4 text-sm">
            <div class="px-4 py-3 text-gray-400">
                {{ __('Settings') }}
            </div>

            <x-sidebar-link :href="route('car.index')" :active="request()->routeIs('garage.car')" class="text-sm">
                <i class="fa-solid fa-car w-5"></i> <span class="">{{ __('Vehicles') }}</span>
            </x-sidebar-link> 

            <x-sidebar-link :href="route('user.index')" :active="request()->routeIs('user.*')" class="text-sm">
                <i class="fa-solid fa-users w-5"></i> <span class="">{{ __('Users')}} </span>
            </x-sidebar-link> 

            <x-sidebar-link :href="route('garage')" :active="request()->routeIs('dashboard')" class="text-sm">
                <i class="fa-solid fa-screwdriver-wrench w-5"></i> <span class="">{{ __('Config')}}</span>
            </x-sidebar-link> 
        </div>

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