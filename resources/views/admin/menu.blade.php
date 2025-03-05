
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                 <div class="container mx-auto my-5 px-4">
                    <h1 class="text-center font-normal mb-4" style="font-size: 30px;">Restaurant Menu Manager</h1>

                    <!-- Add Menu -->
                    <div class="mb-4">
                   <a style="background-color: #7824ff; color: #eee; padding: 10px; border-radius: 5px; font-size: 18px;" 
                   href="{{ route('menu-create') }}" wire:navigate>
                    Create Menu
                    </a>

                    </div>
                    </div>
                    
                </div>
                
                <div style="margin-top: 30px;">
                @if(session('success'))
                <div style="background-color: #00d486; color: #fff; padding: 10px; margin: 10px;">
                {{session('success')}}
                </div>
                @elseif(session('error'))
                <div style="background-color: #ff6666; color: #fff; padding: 10px; margin: 10px;">
                {{session('error')}}
                </div>
                @endif
                <x-managercomponents.restaurantmenu :sections="$sections"/>
                </div>

            </div>

            

            
        </div>
    </div>
</x-app-layout>
