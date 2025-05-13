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
                    <!-- Restaurant Menu Component -->
                    <h1 class="text-xl" style="font-weight: 900;">Welcome back, {{ \Auth::user()->name }}!</h1>
                </div>
            </div>

            <!-- Deals Component -->
            <livewire:forms.deals-section-form />
            <!-- / Deals Component -->

            <!-- About Section -->
            <livewire:forms.about-section-form />
            <!-- / About Section -->

            <!-- Catering Menu -->
            <livewire:forms.catering-menu-form />
            <!-- / Catering Menu -->


        </div>
    </div>
</x-app-layout>
