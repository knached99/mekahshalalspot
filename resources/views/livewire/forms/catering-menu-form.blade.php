<div class="max-w-2xl w-full mx-auto p-6 sm:p-8 bg-white dark:bg-slate-900 shadow-xl rounded-2xl">

    <form wire:submit.prevent="createOrUpdateCateringMenu" enctype="multipart/form-data" class="space-y-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Upload or replace the catering menu</h1>

        <div class="space-y-3">
            @if ($catering && $catering->catering_menu_image)
                <div class="w-full overflow-auto max-h-[600px]">
                    <img src="{{ asset('storage/' . $catering->catering_menu_image) }}" alt="Current Catering Menu"
                        class="w-100 h-100 object-contain rounded-lg border border-gray-300 dark:border-slate-700" />
                </div>
            @endif

            <div>
                <label for="catering_menu_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Catering Image
                </label>
                <input type="file" id="catering_menu_image" name="catering_menu_image"
                    wire:model="catering_menu_image" accept="image/*"
                    class="mt-2 block w-full px-3 py-2 text-sm border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-600 focus:ring focus:ring-blue-300 focus:outline-none @error('catering_menu_image') border-red-500 @enderror" />
                @error('catering_menu_image')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 bg-slate-950 hover:bg-slate-800 text-white text-sm font-medium rounded-md transition duration-200">
                Save
            </button>
        </div>

        @if ($error)
            <div class="bg-red-500/90 p-3 rounded-md text-white text-sm">
                {{ $error }}
            </div>
        @elseif ($success)
            <div class="bg-emerald-500/90 p-3 rounded-md text-white text-sm">
                {{ $success }}
            </div>
        @endif
    </form>
</div>
